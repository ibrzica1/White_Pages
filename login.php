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
  <title>Login</title>
  <link rel="stylesheet" href="style/header.css">
  <link rel="stylesheet" href="style/login.css">
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
  
 

  <div class="login-body-container">

    <div>

       <?php if(isset($_SESSION["message"])): ?>
        <?php $message = htmlspecialchars($_SESSION["message"]); ?>
        <p class="message"><?= $message ?></p>
        <?php unset($_SESSION["message"]); ?>
       <?php endif; ?>

      <form action="models/loginUser.php" method="POST" class="login-form">
        <h>Email</h>
        <div class="email">
          <img src="images\mail.png">
          <input type="text" name="email" placeholder="Email">
        </div>
        <h>Password</h>
        <div class="password">
          <img src="images\password.png">
          <input type="text" name="password" placeholder="Password">
        </div>
        <div class="login-btn-container">
          <button class="login-btn">Login</button>
        </div>
      </form>

    </div>

  </div>

  
  
</body>

</html>