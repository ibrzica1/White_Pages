<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

if(isset($_SESSION["logged"]))
{
  header("Location: index.php");
  exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="style/header.css">
  <link rel="stylesheet" href="style/signup.css">
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

      <div class="login-signup">
        <a href="login.php" class="login">Log In</a>
        <a href="signup.php" class="signup">Sign Up</a>
    </div>
  </div>

  <?php if(isset($_SESSION["message"])): ?>
    <?php $message = htmlspecialchars($_SESSION["message"]); ?>
    <p><?= $message ?></p>
    <?php unset($_SESSION["message"]); ?>
  <?php endif; ?>

  <div class="signup-body-container">

    <div>

      <form action="models/signupUser.php" method="POST" class="signup-form">
        <h>Username</h>
        <div class="input">
          <img src="images\user (2).png">
          <input type="text" name="username" placeholder="Enter Username">
        </div>
        <h>Email</h>
        <div class="input">
          <img src="images\mail.png">
          <input type="email" name="email" placeholder="Enter Email">
        </div>
        <h>Password</h>
        <div class="input">
          <img src="images\password.png">
          <input type="text" name="password" placeholder="Enter Password">
        </div>
        <h>Repeat Password</h>
        <div class="input">
          <img src="images\security.png">
          <input type="text" name="repeatPassword" placeholder="Repeat Password">
        </div>
        <div class="register-btn-container">
          <button>Register</button>
        </div>
        
      </form>  

    </div>

  </div>
  
</body>

</html>