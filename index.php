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
      <a href="businessInput.php">Register Business</a>
     </div>
     <div>
      <a href="userPage.php"><?= $_SESSION["username"] ?></a>
      <a href="logout.php">Logout</a>
     </div>
    </div>
  <?php else: ?>
    <div class="login-signup">
        <a href="login.php" class="login">Log In</a>
        <a href="signup.php" class="signup">Sign Up</a>
    </div>
  <?php endif; ?>
      
  </div>
  <div>

    <?php if(isset($_SESSION["message"])): ?>
      <?php $message = htmlspecialchars($_SESSION["message"]); ?>
      <p><?=  $message ?></p>
      <?php unset($_SESSION["message"]); ?>
    <?php endif; ?>

    <form action="searchBusinId.php" method="get">
      <h4>Search By Business Id</h4>
      <input type="text" name="inputBusinId" placeholder="Business Id">
      <button>Search</button>
    </form>

    <form action="searchBusinAddress.php" method="get">
      <h4>Search By Business Address</h4>
      <input type="text" name="inputBusinAddress" placeholder="Business Address">
      <button>Search</button>
    </form>

    <form action="searchBusinName.php" method="get">
      <h4>Search By Business Name</h4>
      <input type="text" name="inputBusinName" placeholder="Business Name">
      <button>Search</button>
    </form>
  </div>

</body>

</html>