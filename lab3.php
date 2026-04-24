<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 3 — ATM Machine</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: sans-serif;
            background: #f5f5f5;
            color: #222;
        }

        nav {
            background: #fff;
            border-bottom: 1px solid #ddd;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            height: 50px;
        }

        nav a {
            text-decoration: none;
            color: #555;
            font-size: 0.9rem;
        }

        nav a:hover { color: #000; }
        nav a.active { color: #000; font-weight: bold; }

        .container {
            max-width: 500px;
            margin: 3rem auto;
            padding: 0 1.5rem;
        }

        h1 { font-size: 1.5rem; margin-bottom: 1.5rem; }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 1.5rem;
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            font-size: 0.82rem;
            color: #666;
            margin-bottom: 0.3rem;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            outline: none;
            background: #fff;
        }

        input:focus, select:focus { border-color: #888; }

        #amount-group { display: none; }

        button {
            width: 100%;
            padding: 0.6rem;
            background: #222;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 0.9rem;
            cursor: pointer;
        }

        button:hover { background: #444; }

        .result h2 {
            font-size: 1rem;
            margin-bottom: 0.75rem;
        }

        .result p {
            font-size: 0.9rem;
            color: #444;
            line-height: 1.8;
        }

        .result strong { color: #222; }

        .msg-ok  { color: green; }
        .msg-err { color: red; }
    </style>
</head>
<body>

<?php
class ATM {
    private $accountName;
    private $balance;

    public function __construct($accountName, $initialBalance) {
        $this->accountName = $accountName;
        $this->balance     = floatval($initialBalance);
    }

    public function getAccountName() { return $this->accountName; }
    public function getBalance()     { return $this->balance; }

    public function deposit($amount) {
        if ($amount <= 0) return ['ok' => false, 'msg' => 'Amount must be greater than zero.'];
        $this->balance += $amount;
        return ['ok' => true, 'msg' => 'Deposited ₱' . number_format($amount, 2) . ' successfully.'];
    }

    public function withdraw($amount) {
        if ($amount <= 0) return ['ok' => false, 'msg' => 'Amount must be greater than zero.'];
        if ($amount > $this->balance) return ['ok' => false, 'msg' => 'Insufficient balance.'];
        $this->balance -= $amount;
        return ['ok' => true, 'msg' => 'Withdrew ₱' . number_format($amount, 2) . ' successfully.'];
    }
}

$atm = null;
$res = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $atm    = new ATM($_POST['account_name'], $_POST['initial_balance']);
    $action = $_POST['action'];
    $amount = floatval($_POST['amount'] ?? 0);

    if ($action === 'Deposit')  $res = $atm->deposit($amount);
    elseif ($action === 'Withdraw') $res = $atm->withdraw($amount);
}
?>

<nav>
    <a href="index.php">Home</a>
    <a href="lab1.php">Lab 1</a>
    <a href="lab2.php">Lab 2</a>
    <a href="lab3.php" class="active">Lab 3</a>
</nav>

<div class="container">
    <h1>Lab 3 — ATM Machine</h1>

    <div class="card">
        <form method="post" action="">
            <label>Account Name</label>
            <input type="text" name="account_name" placeholder="e.g. Juan dela Cruz" required
                value="<?= isset($_POST['account_name']) ? htmlspecialchars($_POST['account_name']) : '' ?>">

            <label>Initial Balance (₱)</label>
            <input type="number" name="initial_balance" step="0.01" min="0" placeholder="0.00" required
                value="<?= isset($_POST['initial_balance']) ? htmlspecialchars($_POST['initial_balance']) : '' ?>">

            <label>Action</label>
            <select name="action" id="action-select" onchange="toggleAmount(this.value)">
                <option value="Check Balance" <?= (isset($_POST['action']) && $_POST['action'] === 'Check Balance') ? 'selected' : '' ?>>Check Balance</option>
                <option value="Deposit"       <?= (isset($_POST['action']) && $_POST['action'] === 'Deposit')       ? 'selected' : '' ?>>Deposit</option>
                <option value="Withdraw"      <?= (isset($_POST['action']) && $_POST['action'] === 'Withdraw')      ? 'selected' : '' ?>>Withdraw</option>
            </select>

            <div id="amount-group" style="<?= (isset($_POST['action']) && $_POST['action'] !== 'Check Balance') ? 'display:block' : '' ?>">
                <label>Amount (₱)</label>
                <input type="number" name="amount" id="amount-input" step="0.01" min="0.01" placeholder="0.00"
                    value="<?= isset($_POST['amount']) ? htmlspecialchars($_POST['amount']) : '' ?>">
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>

    <?php if ($atm !== null): ?>
    <div class="card result">
        <h2>Result</h2>
        <p>Account: <strong><?= htmlspecialchars($atm->getAccountName()) ?></strong></p>
        <p>Action: <strong><?= htmlspecialchars($_POST['action']) ?></strong></p>
        <?php if ($res !== null): ?>
            <p class="<?= $res['ok'] ? 'msg-ok' : 'msg-err' ?>"><?= htmlspecialchars($res['msg']) ?></p>
        <?php endif; ?>
        <p>Current Balance: <strong>₱<?= number_format($atm->getBalance(), 2) ?></strong></p>
    </div>
    <?php endif; ?>
</div>

<script>
function toggleAmount(action) {
    const group = document.getElementById('amount-group');
    const input = document.getElementById('amount-input');
    if (action === 'Check Balance') {
        group.style.display = 'none';
        input.removeAttribute('required');
    } else {
        group.style.display = 'block';
        input.setAttribute('required', 'required');
    }
}
</script>

</body>
</html>