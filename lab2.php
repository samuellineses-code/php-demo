<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 2 — Temperature Converter</title>
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

        input[type="number"] {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            outline: none;
        }

        input[type="number"]:focus { border-color: #888; }

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

        .result p {
            font-size: 0.95rem;
            color: #444;
            line-height: 1.7;
        }

        .result strong { color: #222; font-size: 1.1rem; }
    </style>
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="lab1.php">Lab 1</a>
    <a href="lab2.php" class="active">Lab 2</a>
    <a href="lab3.php">Lab 3</a>
</nav>

<div class="container">
    <h1>Lab 2 — Temperature Converter</h1>

    <div class="card">
        <form method="post" action="">
            <label>Temperature in Celsius</label>
            <input type="number" name="celsius" step="any" placeholder="e.g. 37" required
                value="<?= isset($_POST['celsius']) ? htmlspecialchars($_POST['celsius']) : '' ?>">
            <button type="submit">Convert</button>
        </form>
    </div>

    <?php
        function celsiusToFahrenheit($celsius) {
            return ($celsius * 9 / 5) + 32;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $celsius    = floatval($_POST['celsius']);
            $fahrenheit = celsiusToFahrenheit($celsius);
    ?>
    <div class="card result">
        <p>
            <?= number_format($celsius, 2) ?>°C =   
            <strong><?= number_format($fahrenheit, 2) ?>°F</strong>
        </p>
    </div>
    <?php } ?>
</div>

</body>
</html>