<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1 — My Favorite Fruits</title>
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

        input[type="text"] {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.9rem;
            margin-bottom: 0.9rem;
            outline: none;
        }

        input[type="text"]:focus { border-color: #888; }

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

        .favorite {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 1rem;
        }

        .favorite strong { color: #222; }

        ul {
            padding-left: 1.25rem;
            font-size: 0.9rem;
            line-height: 1.9;
        }
    </style>
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="lab1.php" class="active">Lab 1</a>
    <a href="lab2.php">Lab 2</a>
    <a href="lab3.php">Lab 3</a>
</nav>

<div class="container">
    <h1>Lab 1 — My Favorite Fruits</h1>

    <div class="card">
        <form method="post" action="">
            <label>Fruit 1</label>
            <input type="text" name="fruit1" placeholder="e.g. Mango" required value="<?= isset($_POST['fruit1']) ? htmlspecialchars($_POST['fruit1']) : '' ?>">

            <label>Fruit 2</label>
            <input type="text" name="fruit2" placeholder="e.g. Banana" required value="<?= isset($_POST['fruit2']) ? htmlspecialchars($_POST['fruit2']) : '' ?>">

            <label>Fruit 3</label>
            <input type="text" name="fruit3" placeholder="e.g. Strawberry" required value="<?= isset($_POST['fruit3']) ? htmlspecialchars($_POST['fruit3']) : '' ?>">

            <label>Fruit 4</label>
            <input type="text" name="fruit4" placeholder="e.g. Grape" required value="<?= isset($_POST['fruit4']) ? htmlspecialchars($_POST['fruit4']) : '' ?>">

            <label>Fruit 5</label>
            <input type="text" name="fruit5" placeholder="e.g. Watermelon" required value="<?= isset($_POST['fruit5']) ? htmlspecialchars($_POST['fruit5']) : '' ?>">

            <button type="submit">Submit</button>
        </form>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fruits = [
                $_POST['fruit1'],
                $_POST['fruit2'],
                $_POST['fruit3'],
                $_POST['fruit4'],
                $_POST['fruit5'],
            ];
    ?>
    <div class="card result">
        <h2>Results</h2>
        <p class="favorite">Your favorite fruit: <strong><?= htmlspecialchars($fruits[0]) ?></strong></p>
        <ul>
            <?php foreach ($fruits as $fruit): ?>
                <li><?= htmlspecialchars($fruit) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php } ?>
</div>

</body>
</html>