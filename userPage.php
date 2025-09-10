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

require_once "models/User.php";

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

<h2><?=$sessionUser["username"]?></h2>

<?php if(isset($_SESSION["message"])): ?>
    <?php $message = htmlspecialchars($_SESSION["message"]); ?>
    <p><?=  $message ?></p>
    <?php unset($_SESSION["message"]); ?>
<?php endif; ?>

<div class="username-container">
  <div class="username-display">
    <h3><?=$sessionUser["username"]?></h3>
    <button onclick="showEditForm('username')">Edit</button>
  </div>

  <div class="username-edit-form" style="display: none;">
    <form action="models/updateUser.php" method="post">
      <input type="hidden" name="field" value="username">
      <input type="text" name="newUsername" placeholder="<?=$sessionUser["username"]?>">
      <button type="submit">Save</button>
      <button type="button" onclick="hideEditForm('username')">Cancel</button>
    </form>
  </div>
</div>

<div class="email-container">
  <div class="email-display">
    <h3><?=$sessionUser["email"]?></h3>
    <button onclick="showEditForm('email')">Edit</button>
  </div>

  <div class="email-edit-form" style="display: none;">
    <form action="models/updateUser.php" method="post">
      <input type="hidden" name="field" value="email">
      <input type="text" name="newEmail" placeholder="<?=$sessionUser["email"]?>">
      <button type="submit">Save</button>
      <button type="button" onclick="hideEditForm('email')">Cancel</button>
    </form>
  </div>
</div>

<div class="password-container">
  <div class="password-display">
    <h3>*********</h3>
    <button onclick="showEditForm('password')">Edit</button>
  </div>

  <div class="password-edit-form" style="display: none;">
    <form action="models/updateUser.php" method="post">
      <input type="hidden" name="field" value="password">
      <input type="text" name="oldPassword" placeholder="Old Password">
      <input type="text" name="newPassword" placeholder="New Password">
      <input type="text" name="repeatPassword" placeholder="Repeat Password">
      <button type="submit">Save</button>
      <button type="button" onclick="hideEditForm('username')">Cancel</button>
    </form>
  </div>
</div>

<div>
  <h3>Business Registered <?=$businessCount?></h3>
  <a href="userBusiness.php">Edit</a>
</div>
<div>
  <form action="models/deleteUser.php" method="post" onsubmit="return confirm('Are you sure?');">
    <button>Delete account</button>
  </form>
</div>


<script>
  function showEditForm(field)
  {
    document.querySelector(`.${field}-display`).style.display = 'none';
    document.querySelector(`.${field}-edit-form`).style.display = 'block';
  }

  function hideEditForm(field)
  {
    document.querySelector(`.${field}-display`).style.display = 'block';
    document.querySelector(`.${field}-edit-form`).style.display = 'none';
  }
</script>

</body>

</html>