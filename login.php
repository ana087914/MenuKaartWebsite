<?php
session_start();
$conn = new mysqli("localhost", "root", "", "mydatabase");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = ? AND password = SHA1(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
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
    <title>Login - Aesthetic Slices</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <main class="login-page">
        <div class="login-box">
            <h2>Inloggen Admin</h2>

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
