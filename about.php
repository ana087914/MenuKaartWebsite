<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Over Ons</title>
    <link rel="stylesheet" href="css/main.css">
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

<main class="about-page">
    <h1 class="about-title">Over Ons</h1>
    <p class="about-text">
        Welkom bij Aesthetic Slices – jouw favoriete plek voor ambachtelijke pizza’s! Wij geloven in de kracht van verse ingrediënten, authentiek deeg en een creatief menu dat jouw smaakpapillen verrast. Met passie voor kwaliteit en service willen we een unieke ervaring bieden voor elke klant.
    </p>
    <p class="about-text">
        Of je nu komt voor een klassieke Margherita of een verrassende special, onze pizzabakkers staan elke dag klaar om iets lekkers te maken. Onze missie? Smaakvolle momenten creëren, vers bereid, altijd met liefde geserveerd.
    </p>

    <div class="features">
        <div class="feature-box">
            
            <h3>Premium Kwaliteit</h3>
        </div>
        <div class="feature-box">
            
            <h3>Verse Ingrediënten</h3>
        </div>
        <div class="feature-box">
           
            <h3>Vers Deeg</h3>
        </div>
        <div class="feature-box">
            
            <h3>Creatief Menu</h3>
        </div>
    </div>
</main>

</body>
</html>
