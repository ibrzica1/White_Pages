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
var_dump($businessCount);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>User Page</title>
  <link rel="stylesheet" href="style/index.css">
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
      <a href="businessInput.php">Register Business</a>
    </div>
    <div>
      <a href="userPage.php"><?= $sessionUser["username"] ?></a>
      <a href="logout.php">Logout</a>
    </div>
  </div>
</div>

<h2><?=$sessionUser["username"]?></h2>
<div>
  <h3><?=$sessionUser["username"]?></h3>
  <button>Edit</button>
</div>
<div>
  <h3><?=$sessionUser["email"]?></h3>
  <button>Edit</button>
</div>
<div>
  <h3>***********</h3>
  <button>Edit</button>
</div>
<div>
  <h3>Business Registered <?=$businessCount?></h3>
  <button>Edit</button>
</div>
<div>
  <form action="models/deleteUser.php" method="post" onsubmit="return confirm('Are you sure?');">
    <button>Delete account</button>
  </form>
</div>

</body>

</html>