<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

if(!isset($_SESSION["logged"]))
{
  header("Location: ../index.php");
  exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>business Register</title>
  <link rel="stylesheet" href="../style/header.css">
  <link rel="stylesheet" href="../style/businessinput.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>

  <div class="header-main-container">
      <div class="logo">
        <a href="../index.php">
          <img src="../images\White-Pages-Logo.png">
        </a>
      </div>

      <div class="user-header">
      <div>
      <a href="businessInput.php" class="register-btn">Register<br>Business</a>
     </div>
     <div class="user-wrapper">
      <a href="userPage.php" class="user-link"><?= $_SESSION["username"] ?></a>
      <a href="../controllers/logout.php" class="user-logout">Logout</a>
     </div>
    </div>
  </div>

    <div class="business-input-body">

      <div>

          <?php if(isset($_SESSION["message"])): ?>
            <?php $message = htmlspecialchars($_SESSION["message"]); ?>
            <p class="message"><?= $message ?></p>
            <?php unset($_SESSION["message"]); ?>
          <?php endif; ?>

        <form action="../controllers/registerBusiness.php" method="post" class="business-input-form">
          <h>Business Id</h>
          <div class="field">
            <img src="../images\fingerprint.png">
            <input type="text" name="business_id" placeholder="Business Id">
          </div>
          <h>Name</h>
          <div class="field">
            <img src="../images\briefcase.png">
            <input type="text" name="name" placeholder="Name">
          </div>
          <h>Address</h>
          <div class="field">
            <img src="../images\location.png">
            <input type="text" name="address" placeholder="Address">
          </div>
          <h>Founded</h>
          <div class="field">
            <img src="../images\pantheon.png">
            <input type="date" name="founded" placeholder="Founded">
          </div>
          <h>Employees</h>
          <div class="field">
            <img src="../images\employee.png">
            <input type="text" name="employees" placeholder="Employees">
          </div>
          <h>Revenue</h>
          <div class="field">
            <img src="../images\salary.png">
            <input type="text" name="revenue" placeholder="Revenue">
          </div>
          <div class="register-container">
            <button>Register</button>
          </div>
          
        </form>

      </div>

    </div>
  
</body>

</html>
