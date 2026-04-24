<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Lab 3 - ATM Simulation</title>
  <link rel="Stylesheet" href="style.css">
</head>
<body>
<nav class="navbar">
  <div class="logo">ITEC 65 Lab</div>
  <div class="nav-links">
    <a href="index.php">Home</a>
    <a href="lab1.php">Fruits</a>
    <a href="lab2.php">Temperature</a>
    <a href="lab3.php">ATM</a>
  </div>
</nav>
<div class="container">
  <h1>🏧 ATM Simulation</h1>
  <p>Manage your bank account</p>

  <?php
  if (!isset($_SESSION["balance"])) {
    $_SESSION["balance"] = 1000;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];
    $amount = floatval($_POST["amount"] ?? 0);

    if ($amount <= 0) {
      echo "<div class='error'>❌ Please enter a valid amount</div>";
    } elseif ($action == "withdraw") {
      if ($amount > $_SESSION["balance"]) {
        echo "<div class='error'>❌ Insufficient funds! Balance: \$" . $_SESSION["balance"] . "</div>";
      } else {
        $_SESSION["balance"] -= $amount;
        echo "<div class='success'>✓ Withdrawal successful! Amount: \$$amount</div>";
      }
    } elseif ($action == "deposit") {
      $_SESSION["balance"] += $amount;
      echo "<div class='success'>✓ Deposit successful! Amount: \$$amount</div>";
    }
  }
  ?>

  <form method="POST">
    <label for="amount">Enter Amount:</label>
    <input type="number" id="amount" name="amount" placeholder="Enter amount" step="0.01" required>

    <label for="action">Select Action:</label>
    <select id="action" name="action" required>
      <option value="">-- Choose --</option>
      <option value="deposit">Deposit Money</option>
      <option value="withdraw">Withdraw Money</option>
    </select>

    <input type="submit" value="Process Transaction">
  </form>

  <div class="result">
    <h3>💰 Account Balance</h3>
    <p style="font-size: 28px; color: #667eea; font-weight: bold;">
      $<?php echo number_format($_SESSION["balance"], 2); ?>
    </p>
  </div>
</div>
</body>
</html>