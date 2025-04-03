<?php
session_start();

// Conectare cu PDO în loc de mysqli
try {
    $conn = new PDO("mysql:host=mysql_db;dbname=mydatabase", "user", "password");


    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}

// Când se trimite formularul
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
