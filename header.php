<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MMCOE Events</title>

  <!--Fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;700&display=swap" rel="stylesheet">

  <!--CSS-->
  <link rel="stylesheet" href="/campus/css/style.css">
</head>

<body>

<!-- Mobile Menu -->
<div id="mob-menu">
  <span class="mob-close" onclick="closeMob()">✕</span>

  <a href="/campus/index.php" onclick="closeMob()">Home</a>
  <a href="/campus/pages/events.php" onclick="closeMob()">Events</a>
  <a href="/campus/pages/gallery.php" onclick="closeMob()">Gallery</a>
  <a href="/campus/pages/about.php" onclick="closeMob()">About</a>
  <a href="/campus/pages/contact.php" onclick="closeMob()">Contact</a>

  <?php if(isset($_SESSION["userid"])) { ?>
    <a href="/campus/logout.php" onclick="closeMob()">Logout</a>
  <?php } else { ?>
    <a href="/campus/login.php" onclick="closeMob()">Login</a>
  <?php } ?>
</div>


<!-- Navigation Bar -->
<nav id="nav">

  <!-- Logo -->
  <a href="/campus/index.php" class="nav-logo">
    <img src="/campus/includes/mmcoe.jpeg" class="mmcoelogo-img" alt="MMCOE Logo">
    Marathwada Mitramandal<span>College of Engineering</span>
  </a>


  <!-- Menu Links -->
  <ul class="nav-links">
    <li><a href="/campus/index.php">Home</a></li>
    <li><a href="/campus/pages/events.php">Events</a></li>
    <li><a href="/campus/pages/gallery.php">Gallery</a></li>
    <li><a href="/campus/pages/about.php">About</a></li>
    <li><a href="/campus/pages/contact.php">Contact</a></li>
  </ul>


  <!-- Right Side -->
  <div class="nav-right">

    <?php if(isset($_SESSION["userid"])) { ?>

      <!-- Welcome -->
      <span style="color:white;margin-right:1rem">
        Welcome, <?php echo $_SESSION["name"]; ?>
      </span>

      <!-- Logout -->
      <a href="/campus/logout.php" class="btn-login">
        <span>Logout</span>
      </a>

    <?php } else { ?>

      <!-- Login -->
      <a href="/campus/login.php" class="btn-login">
        <span>Login</span>
      </a>

      <!-- Register -->
      <a href="/campus/register.php" class="btn-signup">
        <span>Register</span>
      </a>

    <?php } ?>

    <!-- Hamburger -->
    <div class="ham" onclick="document.getElementById('mob-menu').classList.add('on')">
      <span></span>
      <span></span>
      <span></span>
    </div>

  </div>

</nav>