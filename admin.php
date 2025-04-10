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

$stmt = $pdo->query("SELECT * FROM menu_items ORDER BY categorie, naam");
$items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="nl">
<head>

    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/main.css">


</head>
<body>

    <h1>Admin Panel – Producten beheren</h1>
    <body class="admin-page">

    <div class="top-bar">
        <a href="add.item.php">➕ Nieuw gerecht toevoegen</a>
        <a href="index.php">🏠 Terug naar Home</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Beschrijving</th>
                <th>Prijs (€)</th>
                <th>Categorie</th>
                <th>Afbeelding</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['naam']) ?></td>
                    <td><?= htmlspecialchars($item['beschrijving']) ?></td>
                    <td><?= number_format($item['prijs'], 2) ?></td>
                    <td><?= htmlspecialchars($item['categorie']) ?></td>
                    <td><?= htmlspecialchars($item['afbeelding']) ?></td>
                    <td>
                        <a class="btn" href="edit.item.php?id=<?= $item['id'] ?>">✏️ Edit</a>
                        <a class="btn" href="delete.item.php?id=<?= $item['id'] ?>" onclick="return confirm('Weet je zeker dat je dit item wilt verwijderen?');">🗑️ Verwijder</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>