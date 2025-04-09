<?php
session_start();


try {
    $conn = new PDO("mysql:host=mysql_db;dbname=mydatabase", "root", "rootpassword");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = SHA1(:password)");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Foute gebruikersnaam of wachtwoord!";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
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
        <?php if (isset($_SESSION["loggedin"])): ?>
            <li><a href="admin.php">ADMIN</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        <?php else: ?>
            <li><a href="login.php">LOGIN</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>
<main class="login-page">
    <div class="login-box">
        <h2>Inloggen</h2>

        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Gebruikersnaam" required>
            <input type="password" name="password" placeholder="Wachtwoord" required>
            <button type="submit">Inloggen</button>
        </form>
    </div>
</main>
</body>
</html>
