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

  <form action="models/signupUser.php" method="POST">
      <input type="text" name="username" placeholder="Enter Username">
      <input type="email" name="email" placeholder="Enter Email">
      <input type="text" name="password" placeholder="Enter Password">
      <input type="text" name="repeatPassword" placeholder="Repeat Password">
      <button>Register</button>
  </form>  

  
</body>

</html>