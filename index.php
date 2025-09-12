<?php

  if(session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <link rel="stylesheet" href="style/header.css">
  <link rel="stylesheet" href="style/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>
  
  <div class="header-main-container">
      <div class="logo">
        <a href="index.php">
          <img src="images\White-Pages-Logo.png">
        </a>
      </div>

  <?php if(isset($_SESSION["logged"])): ?>
    
    <div class="user-header">
      <div>
      <a href="businessInput.php" class="register-btn">Register<br>Business</a>
     </div>
     <div class="user-wrapper">
      <a href="userPage.php" class="user-link"><?= $_SESSION["username"] ?></a>
      <a href="models/logout.php" class="user-logout">Logout</a>
     </div>
    </div>
  <?php else: ?>
    <div class="login-signup">
        <a href="login.php" class="login">Log In</a>
        <a href="signup.php" class="signup">Sign Up</a>
    </div>
  <?php endif; ?>
      
  </div>

  <div class="index-body-container">

  <p class="description">Find Business, their address, revenue and more</p>

   <div class="index-search-container">

     <?php if(isset($_SESSION["message"])): ?>
      <?php $message = htmlspecialchars($_SESSION["message"]); ?>
      <p><?=  $message ?></p>
      <?php unset($_SESSION["message"]); ?>
     <?php endif; ?>

    <form action="searchBusiness.php" method="get">
      <p class="search-type">Search By Business Id</p>
      <div class="search-wrapper">
        <input type="hidden" name="field" value="business-id">
        <input type="text" name="inputBusinId" class="search-input" placeholder="Business Id">
        <button class="search-btn">Search</button>
      </div>
    </form>

    <form action="searchBusiness.php" method="get">
      <p class="search-type">Search By Business Address</p>
      <div class="search-wrapper">
        <input type="hidden" name="field" value="address">
        <input type="text" name="inputBusinAddress" class="search-input" placeholder="Business Address">
        <button class="search-btn">Search</button>
      </div>
    </form>

    <form action="searchBusiness.php" method="get">
      <p class="search-type">Search By Business Name</p>
      <div class="search-wrapper">
        <input type="hidden" name="field" value="name">
        <input type="text" name="inputBusinName" class="search-input" placeholder="Business Name">
        <button class="search-btn">Search</button>
      </div>
    </form>

   </div>

  </div>

</body>

</html>