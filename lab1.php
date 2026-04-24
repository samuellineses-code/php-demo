<!DOCTYPE html>
<html>
<head>
  <title>Lab 1 - Fruits Array</title>
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
  <h1>🍎 Fruits Array</h1>
  <p>Manage your fruit inventory</p>

  <?php
  $fruits = array("Apple", "Banana", "Orange", "Mango", "Strawberry");

  if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["fruit"])) {
    $newFruit = htmlspecialchars($_POST["fruit"]);
    array_push($fruits, $newFruit);
    echo "<div class='success'>✓ $newFruit added to the list!</div>";
  }
  ?>

  <form method="POST">
    <label for="fruit">Add a Fruit:</label>
    <input type="text" id="fruit" name="fruit" placeholder="Enter fruit name" required>
    <input type="submit" value="Add Fruit">
  </form>

  <div class="output">
    <h3>Fruit Inventory</h3>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Fruit Name</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($fruits as $index => $fruit) {
          echo "<tr><td>" . ($index + 1) . "</td><td>$fruit</td></tr>";
        }
        ?>
      </tbody>
    </table>
    <p><strong>Total Fruits:</strong> <?php echo count($fruits); ?></p>
  </div>
</div>
</body>
</html>