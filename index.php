<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Home pagina</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
  <header>
    <nav>
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="menu.php">MENU</a></li>
        <li><a href="about.php">ABOUT US</a></li>
        <li><a href="werkenbij.php">WORKING AT</a></li>
        <li><a href="login.php">LOGIN</a></li>
      </ul>
    </nav>
  </header>

  <main class="homepage">
    <div class="home-content">
      <h1>Welcome to Aesthetic Slices</h1>

      <div class="order-box">
        <h2>Bestel online</h2>
        <form action="process.php" method="POST">
          <label>
            <input type="radio" name="order_type" value="afhalen" required> Afhalen
          </label>
          <label>
            <input type="radio" name="order_type" value="bezorg" required> Bezorg
          </label>
          <input type="text" name="postcode" placeholder="Voer postcode in" required>
          <button type="submit">Verder</button>
        </form>
      </div>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 Aesthetic Slices. Alle rechten voorbehouden.</p>
  </footer>
</body>

</html>
