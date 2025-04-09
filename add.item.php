<?php
session_start();

$host = 'mysql_db';
$db   = 'mydatabase';
$user = 'root';
$pass = 'rootpassword';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naam = $_POST['naam'];
    $beschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];
    $categorie = $_POST['categorie'];
    $afbeelding = $_POST['afbeelding']; // numele fișierului ex: margherita.jpg

    $stmt = $pdo->prepare("INSERT INTO menu_items (naam, beschrijving, prijs, afbeelding, categorie) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$naam, $beschrijving, $prijs, $afbeelding, $categorie]);

    $message = "Gerecht toegevoegd!";
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuw gerecht toevoegen</title>
    <link rel="stylesheet" href="main.css">
</head>
<body class="login-page">

<div class="login-box">
    <h2>Voeg nieuw gerecht toe</h2>

    <?php if (!empty($message)) echo "<p style='color: green;'>$message</p>"; ?>

    <form method="POST">
        <input type="text" name="naam" placeholder="Naam" required>
        <input type="text" name="beschrijving" placeholder="Beschrijving" required>
        <input type="number" step="0.01" name="prijs" placeholder="Prijs (€)" required>
        <input type="text" name="afbeelding" placeholder="Afbeelding (ex: pizza.jpg)" required>
        <select name="categorie" required>
            <option value="">-- Kies categorie --</option>
            <option value="pizza">Pizza</option>
            <option value="drinks">Drinks</option>
            <option value="desserts">Desserts</option>
        </select>
        <button type="submit">Toevoegen</button>
    </form>
</div>

</body>
</html>
