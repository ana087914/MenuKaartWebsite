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
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);


$pizzas = array_filter($items, fn($item) => stripos($item['naam'], 'Pizza') !== false);
$drinks = array_filter($items, fn($item) => stripos($item['naam'], 'Coca') !== false || stripos($item['naam'], 'Fanta') !== false || stripos($item['naam'], 'Bier') !== false);
$desserts = array_filter($items, fn($item) => stripos($item['naam'], 'cake') !== false || stripos($item['naam'], 'brownie') !== false || stripos($item['naam'], 'Tiramisu') !== false);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
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

<main class="menu-page">
    <h1 class="menu-title" style="margin-top: 160px;">Ons Menu</h1>

    <h2 class="menu-section">Pizzas</h2>
    <div class="menu-container">
        <?php foreach ($pizzas as $item): ?>
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

    <h2 class="menu-section">Drinks</h2>
    <div class="menu-container">
        <?php foreach ($drinks as $item): ?>
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

    <h2 class="menu-section">Desserts</h2>
    <div class="menu-container">
        <?php foreach ($desserts as $item): ?>
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
</main>


</body>
</html>
