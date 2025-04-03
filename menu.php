<?php
$host = 'mysql_db';
$db   = 'mydatabase';
$user = 'root';
$pass = 'rootpassword';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    echo "Verbinding mislukt: " . $e->getMessage();
    exit;
}

$stmt = $pdo->query("SELECT * FROM menu_items");
$items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
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

<main class="menu-page">
    <h1 class="menu-title">Ons Menu</h1>
    <div class="menu-container">
        <?php foreach (array_chunk($items, 3) as $row): ?>
            <div class="menu-row">
                <?php foreach ($row as $item): ?>
                    <div class="menu-item">
                        <img src="images/<?= htmlspecialchars($item['afbeelding']) ?>" alt="<?= htmlspecialchars($item['naam']) ?>">
                        <div class="menu-info">
                            <h2><?= htmlspecialchars($item['naam']) ?></h2>
                            <p><?= htmlspecialchars($item['beschrijving']) ?></p>
                            <p class="prijs">€<?= number_format($item['prijs'], 2) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<footer>
    <p>&copy; 2025 Aesthetic Slices. Alle rechten voorbehouden.</p>
</footer>

</body>
</html>
