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
</head>

<body>
  
  <div class="header-main-container">
      <div class="logo"></div>

  <?php if(isset($_SESSION["logged"])): ?>
    <p><?= $_SESSION["username"] ?></p>
    <a href="logout.php">Logout</a>
  <?php else: ?>
    <div class="login-signup">
        <a href="login.php">Log In</a>
        <a href="signup.php">Sign Up</a>
    </div>
  <?php endif; ?>
      
  </div>

  <?php if(isset($_SESSION["logged"])): ?>
    <a href="businessInput.php">Register Business</a>
  <?php endif; ?>

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