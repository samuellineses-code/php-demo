<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Labs</title>
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
            max-width: 680px;
            margin: 3rem auto;
            padding: 0 1.5rem;
        }

        h1 { font-size: 1.8rem; margin-bottom: 0.5rem; }

        .lead { color: #555; margin-bottom: 2rem; font-size: 0.95rem; }

        .lab-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .lab-item {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 1.25rem 1.5rem;
            text-decoration: none;
            color: inherit;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .lab-item:hover { border-color: #aaa; }

        .lab-item h2 { font-size: 1rem; margin-bottom: 0.2rem; }
        .lab-item p  { color: #888; font-size: 0.82rem; }

        .arrow { color: #bbb; }
    </style>
</head>
<body>

<nav>
    <a href="index.php" class="active">Home</a>
    <a href="lab1.php">Lab 1</a>
    <a href="lab2.php">Lab 2</a>
    <a href="lab3.php">Lab 3</a>
</nav>

<div class="container">
    <h1>PHP Labs</h1>
    <p class="lead">Three exercises covering PHP fundamentals.</p>

    <div class="lab-list">
        <a class="lab-item" href="lab1.php">
            <div>
                <h2>Lab 1 — My Favorite Fruits</h2>
            </div>
            <span class="arrow">→</span>
        </a>
        <a class="lab-item" href="lab2.php">
            <div>
                <h2>Lab 2 — Temperature Converter</h2>
            </div>
            <span class="arrow">→</span>
        </a>
        <a class="lab-item" href="lab3.php">
            <div>
                <h2>Lab 3 — ATM Machine</h2>
            </div>
            <span class="arrow">→</span>
        </a>
    </div>
</div>

</body>
</html>