<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Werken bij Aesthetic Slices</title>
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

<main class="werkenbij-page">
  <h1 class="werkenbij-title">Waarom werken bij Aesthetic Slices?</h1>

  <section class="werkenbij-info">
    <p>
      Wij zijn een groeiend pizzamerk met passie voor kwaliteit, klantbeleving en teamspirit. 
      We bieden een dynamische en stimulerende werkomgeving waarin jij je talenten kunt ontwikkelen.
    </p>
    <p>
      Of je nu op zoek bent naar een bijbaan als bezorger, een carrière in ons hoofdkantoor of 
      droomt van je eigen vestiging als franchisenemer – bij ons zijn de mogelijkheden eindeloos!
    </p>
  </section>

  <section class="job-options">
    <div class="job-card">
      <h2>STORE</h2>
     
      <p>Ben je op zoek naar een job als pizzabakker of bezorger? Dan zit je hier goed! Het is leuk, snel en leerzaam.</p>
    </div>
    <div class="job-card">
      <h2>HEADQUARTERS</h2>
     
      <p>Werk in een creatieve omgeving waar jouw ideeën tellen. Groei mee met ons team op het hoofdkantoor!</p>
    </div>
    <div class="job-card">
      <h2>FRANCHISEE</h2>
      
      <p>Droom je ervan je eigen vestiging te openen? Laat je ondernemersdroom uitkomen met onze support.</p>
    </div>
  </section>
</main>
</body>
</html>
