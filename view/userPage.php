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

require_once "../models/User.php";

$userId = $_SESSION["id"];
$user = new User();
$sessionUser = $user->getUser($userId);
$businessArray = $user->getUserBusiness($userId);
$businessCount = $user->getNumberUserBusiness($userId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>User Page</title>
 <link rel="stylesheet" href="../style/header.css"> 
 <link rel="stylesheet" href="../style/userPage.css"> 
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

<div class="user-body">

  <?php if(isset($_SESSION["message"])): ?>
    <?php $message = htmlspecialchars($_SESSION["message"]); ?>
    <div class="userPage-message">
    <p class="message"><?=  $message ?></p>
    </div>
    <?php unset($_SESSION["message"]); ?>
 <?php endif; ?>

  <div class="user-info-container">

      <h2><?=$sessionUser["username"]?></h2>

    <div class="username-container">
      <p>Username</p>
      <div class="username-display">
        <img src="../images\user (2).png">
        <h3><?=$sessionUser["username"]?></h3>
        <button onclick="showEditForm('username')">Edit</button>
      </div>

      <div class="username-edit-form" style="display: none;">
        <form action="../controllers/updateUser.php" method="post" class="username-form">
          <img src="../images\user (2).png">
          <input type="hidden" name="field" value="username">
          <input type="text" name="newUsername" placeholder="<?=$sessionUser["username"]?>">
          <button type="submit" class="save-btn">Save</button>
          <button type="button" onclick="hideEditForm('username')" class="cancel-btn">Cancel</button>
        </form>
      </div>
    </div>

    <div class="email-container">
      <p>Email</p>
      <div class="email-display">
        <img src="../images\mail.png">
        <h3><?=$sessionUser["email"]?></h3>
        <button onclick="showEditForm('email')">Edit</button>
      </div>

      <div class="email-edit-form" style="display: none;">
        <form action="../controllers/updateUser.php" method="post" class="email-form">
          <img src="../images\mail.png">
          <input type="hidden" name="field" value="email">
          <input type="text" name="newEmail" placeholder="<?=$sessionUser["email"]?>">
          <button type="submit" class="save-btn">Save</button>
          <button type="button" onclick="hideEditForm('email')" class="cancel-btn">Cancel</button>
        </form>
      </div>
    </div>

    <div class="password-container">
      <p>Password</p>
      <div class="password-display">
        <img src="../images\password.png">
        <h3>*********</h3>
        <button onclick="showEditForm('password')">Edit</button>
      </div>

      <div class="password-edit-form" style="display: none;">
        <form action="../controllers/updateUser.php" method="post"  class="password-form">
            
            <input type="hidden" name="field" value="password">
          <div class="password-input-container">
            <img src="../images\old-key.png">
            <input type="text" name="oldPassword" placeholder="Old Password">
          </div>
          <div class="password-input-container">
            <img src="../images\password.png">
            <input type="text" name="newPassword" placeholder="New Password">
          </div>
          <div class="password-input-container">
            <img src="../images\security.png">
            <input type="text" name="repeatPassword" placeholder="Repeat Password">
          </div>
          <div class="password-btn-container">
          <button type="submit" class="save-btn">Save</button>
          <button type="button" onclick="hideEditForm('password')" class="cancel-btn">Cancel</button>
          </div>
        </form>
      </div>
    </div>
    
    <div class="info-container">
      <p>Business Registered</p>
      <div class="info-display">
        <img src="../images\briefcase.png">
        <h3>Business Registered <?=$businessCount?></h3>
        <a href="userBusiness.php">Edit</a>
      </div>
    </div>
    
    <div class="delete-btn-container">
      <form action="../controllers/deleteUser.php" method="post" onsubmit="return confirm('Are you sure?');">
        <button>Delete account</button>
      </form>
    </div>

  </div>

</div>




<script>
  function showEditForm(field)
  {
    document.querySelector(`.${field}-display`).style.display = 'none';
    document.querySelector(`.${field}-edit-form`).style.display = 'block';
  }

  function hideEditForm(field)
  {
    document.querySelector(`.${field}-display`).style.display = 'flex';
    document.querySelector(`.${field}-edit-form`).style.display = 'none';
  }
</script>

</body>

</html>