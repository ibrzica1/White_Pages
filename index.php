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
    <a href="businessRegister.php">Register Business</a>
  <?php endif; ?>

</body>

</html>