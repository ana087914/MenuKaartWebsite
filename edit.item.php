<?php
$pdo = new PDO("mysql:host=mysql_db;dbname=mydatabase", "root", "rootpassword");


if (!isset($_GET['id'])) {
    header("Location: admin.php");
    exit;
}

$id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM menu_items WHERE id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch();

if (!$item) {
    echo "Item niet gevonden!";
    exit;
}

// UPDATE na submit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naam = $_POST["naam"];
    $beschrijving = $_POST["beschrijving"];
    $prijs = $_POST["prijs"];
    $afbeelding = $_POST["afbeelding"];
    $categorie = $_POST["categorie"];

    $stmt = $pdo->prepare("UPDATE menu_items SET naam=?, beschrijving=?, prijs=?, afbeelding=?, categorie=? WHERE id=?");
    $stmt->execute([$naam, $beschrijving, $prijs, $afbeelding, $categorie, $id]);

    header("Location: admin.php");
    exit;
}
?>

<form method="POST">
    <label>Naam:</label><br>
    <input name="naam" value="<?= htmlspecialchars($item['naam']) ?>"><br>

    <label>Beschrijving:</label><br>
    <textarea name="beschrijving"><?= htmlspecialchars($item['beschrijving']) ?></textarea><br>

    <label>Prijs (€):</label><br>
    <input name="prijs" value="<?= htmlspecialchars($item['prijs']) ?>"><br>

    <label>Categorie:</label><br>
    <input name="categorie" value="<?= htmlspecialchars($item['categorie']) ?>"><br>

    <label>Afbeelding (URL):</label><br>
    <input name="afbeelding" value="<?= htmlspecialchars($item['afbeelding']) ?>"><br>

    <button type="submit">Opslaan</button>
    <a href="admin.php">Annuleren</a>
</form>
