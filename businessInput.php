<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

if(!isset($_SESSION["logged"]))
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
  <title>business Register</title>
  <link rel="stylesheet" href="style/header.css">
</head>

<body>

  <div class="header-main-container">
      <div class="logo">
        <a href="index.php">
          <img src="images\White-Pages-Logo.png">
        </a>
      </div>

      <div class="user-header">
      <div>
      <a href="businessInput.php" class="register-btn">Register<br>Business</a>
     </div>
     <div class="user-wrapper">
      <a href="userPage.php" class="user-link"><?= $_SESSION["username"] ?></a>
      <a href="models/logout.php" class="user-logout">Logout</a>
     </div>
    </div>
  </div>

    <?php if(isset($_SESSION["message"])): ?>
      <?php $message = htmlspecialchars($_SESSION["message"]); ?>
      <p><?= $message ?></p>
      <?php unset($_SESSION["message"]); ?>
    <?php endif; ?>
  
    <form action="models/registerBusiness.php" method="post">
        <input type="text" name="business_id" placeholder="Business Id">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="address" placeholder="Address">
        <input type="date" name="founded" placeholder="Founded">
        <input type="text" name="employees" placeholder="Employees">
        <input type="text" name="revenue" placeholder="Revenue">
        <button>Register</button>
    </form>

</body>

</html>
