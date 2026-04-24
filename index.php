<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Labs — Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0a0c10;
            --surface: #111318;
            --border: #1e2330;
            --accent: #00e5a0;
            --accent2: #4f8cff;
            --accent3: #ff6b6b;
            --text: #e8eaf0;
            --muted: #6b7280;
            --mono: 'Space Mono', monospace;
            --display: 'Syne', sans-serif;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: var(--display);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Grid background */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(0,229,160,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,229,160,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: 0;
        }

        /* NAVBAR */
        nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(10,12,16,0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px;
        }

        .nav-logo {
            font-family: var(--mono);
            font-size: 0.85rem;
            color: var(--accent);
            letter-spacing: 0.05em;
            text-decoration: none;
        }

        .nav-logo span { color: var(--muted); }

        .nav-links {
            display: flex;
            gap: 0.25rem;
            list-style: none;
        }

        .nav-links a {
            font-family: var(--mono);
            font-size: 0.75rem;
            color: var(--muted);
            text-decoration: none;
            padding: 0.4rem 0.9rem;
            border-radius: 6px;
            border: 1px solid transparent;
            transition: all 0.2s;
            letter-spacing: 0.03em;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--accent);
            border-color: rgba(0,229,160,0.3);
            background: rgba(0,229,160,0.05);
        }

        /* HERO */
        .hero {
            position: relative;
            z-index: 1;
            padding: 6rem 2rem 4rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        .hero-tag {
            display: inline-block;
            font-family: var(--mono);
            font-size: 0.7rem;
            color: var(--accent);
            background: rgba(0,229,160,0.08);
            border: 1px solid rgba(0,229,160,0.2);
            padding: 0.3rem 0.8rem;
            border-radius: 100px;
            letter-spacing: 0.1em;
            margin-bottom: 1.5rem;
            animation: fadeUp 0.6s ease both;
        }

        .hero h1 {
            font-size: clamp(2.5rem, 6vw, 5rem);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -0.02em;
            margin-bottom: 1.5rem;
            animation: fadeUp 0.6s 0.1s ease both;
        }

        .hero h1 em {
            font-style: normal;
            color: var(--accent);
        }

        .hero p {
            font-size: 1.1rem;
            color: var(--muted);
            max-width: 520px;
            line-height: 1.7;
            font-weight: 400;
            animation: fadeUp 0.6s 0.2s ease both;
        }

        /* DIVIDER */
        .section-label {
            position: relative;
            z-index: 1;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 2rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .section-label span {
            font-family: var(--mono);
            font-size: 0.7rem;
            color: var(--muted);
            letter-spacing: 0.12em;
            white-space: nowrap;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        /* CARDS GRID */
        .cards {
            position: relative;
            z-index: 1;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 2rem 6rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.25rem;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 2rem;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            transition: all 0.3s;
            animation: fadeUp 0.6s ease both;
            position: relative;
            overflow: hidden;
        }

        .card:nth-child(1) { animation-delay: 0.1s; }
        .card:nth-child(2) { animation-delay: 0.2s; }
        .card:nth-child(3) { animation-delay: 0.3s; }

        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: var(--card-accent, var(--accent));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .card:hover { transform: translateY(-4px); border-color: #2a3045; }
        .card:hover::before { transform: scaleX(1); }

        .card-num {
            font-family: var(--mono);
            font-size: 0.7rem;
            color: var(--card-accent, var(--accent));
            letter-spacing: 0.1em;
        }

        .card-icon {
            font-size: 2rem;
        }

        .card h2 {
            font-size: 1.3rem;
            font-weight: 600;
            letter-spacing: -0.01em;
        }

        .card p {
            font-size: 0.9rem;
            color: var(--muted);
            line-height: 1.6;
            flex: 1;
        }

        .card-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .tag {
            font-family: var(--mono);
            font-size: 0.65rem;
            padding: 0.25rem 0.6rem;
            border-radius: 4px;
            background: rgba(255,255,255,0.04);
            color: var(--muted);
            border: 1px solid var(--border);
        }

        .card-arrow {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 0.5rem;
        }

        .card-arrow span {
            font-family: var(--mono);
            font-size: 0.72rem;
            color: var(--card-accent, var(--accent));
        }

        .arrow-icon {
            font-size: 1.1rem;
            color: var(--card-accent, var(--accent));
            transition: transform 0.2s;
        }

        .card:hover .arrow-icon { transform: translateX(4px); }

        /* Card color variants */
        .card:nth-child(1) { --card-accent: #00e5a0; }
        .card:nth-child(2) { --card-accent: #4f8cff; }
        .card:nth-child(3) { --card-accent: #ff6b6b; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<nav>
    <a href="index.php" class="nav-logo">&lt;<span>php</span>-labs /&gt;</a>
    <ul class="nav-links">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="lab1.php">Lab 1</a></li>
        <li><a href="lab2.php">Lab 2</a></li>
        <li><a href="lab3.php">Lab 3</a></li>
    </ul>
</nav>

<section class="hero">
    <div class="hero-tag">// BSIT-2A &mdash; PHP Laboratory</div>
    <h1>Learn PHP<br>by <em>doing.</em></h1>
    <p>Three hands-on exercises covering PHP fundamentals — arrays, functions, and object-oriented programming. Pick a lab and start coding.</p>
</section>

<div class="section-label">
    <span>EXERCISES</span>
</div>

<div class="cards">
    <a class="card" href="lab1.php">
        <div class="card-num">LAB 01</div>
        <div class="card-icon">🍎</div>
        <h2>My Favorite Fruits</h2>
        <p>Submit a list of your five favorite fruits using an HTML form. Learn how PHP handles POST data and loops through arrays with <code>foreach</code>.</p>
        <div class="card-tags">
            <span class="tag">Arrays</span>
            <span class="tag">foreach</span>
            <span class="tag">$_POST</span>
        </div>
        <div class="card-arrow">
            <span>Open Lab →</span>
        </div>
    </a>

    <a class="card" href="lab2.php">
        <div class="card-num">LAB 02</div>
        <div class="card-icon">🌡️</div>
        <h2>Temperature Converter</h2>
        <p>Build a Celsius to Fahrenheit converter. Practice writing PHP functions, calling them with form input, and displaying computed results.</p>
        <div class="card-tags">
            <span class="tag">Functions</span>
            <span class="tag">Math</span>
            <span class="tag">$_POST</span>
        </div>
        <div class="card-arrow">
            <span>Open Lab →</span>
        </div>
    </a>

    <a class="card" href="lab3.php">
        <div class="card-num">LAB 03</div>
        <div class="card-icon">🏧</div>
        <h2>ATM Machine</h2>
        <p>Simulate a basic ATM using PHP classes. Implement an <code>ATM</code> class with deposit, withdraw, and balance-check methods, with proper validation.</p>
        <div class="card-tags">
            <span class="tag">OOP</span>
            <span class="tag">Classes</span>
            <span class="tag">Methods</span>
        </div>
        <div class="card-arrow">
            <span>Open Lab →</span>
        </div>
    </a>
</div>

</body>
</html>