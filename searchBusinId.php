<?php

if(session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }

  if(!isset($_GET["inputBusinId"]) || empty($_GET["inputBusinId"]))
{
  $_SESSION["message"] = "You didnt send input Business Id";
  header("Location: index.php");
  exit();
}
else
{
  $inputBusinId = $_GET["inputBusinId"];
}

require_once "models/Database.php";

$database = new Database();

$inputBusinId = $database->connection->real_escape_string($inputBusinId);

$result = $database->connection->query("SELECT * FROM business WHERE business_id LIKE '%$inputBusinId%' ");

$businessArray = $result->fetch_all(MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search By Business ID</title>
  <link rel="stylesheet" href="style/header.css">

</head>

<body>

  <div class="header-main-container">
      <div class="logo">
        <a href="index.php">
          <img src="images\White-Pages-Logo.png">
        </a>
      </div>

  <?php if(isset($_SESSION["logged"])): ?>
    
    <div class="user-header">
      <div>
      <a href="businessInput.php" class="register-btn">Register<br>Business</a>
     </div>
     <div class="user-wrapper">
      <a href="userPage.php" class="user-link"><?= $_SESSION["username"] ?></a>
      <a href="models/logout.php" class="user-logout">Logout</a>
     </div>
    </div>
  <?php else: ?>
    <div class="login-signup">
        <a href="login.php" class="login">Log In</a>
        <a href="signup.php" class="signup">Sign Up</a>
    </div>
  <?php endif; ?>
      
  </div>

 <?php if(empty($businessArray)):?>
  <h3>Search By Business ID</h3>
    <h4>Results for %<?=$inputBusinId?>%: <span>No Results</span></h4>
 <?php else:?>
  <h3>Search By Business ID</h3>
    <h4>Results for %<?=$inputBusinId?>%:</h4>
    <?php foreach($businessArray as $business):?>
      <p>Business ID: <?=$business['business_id']?></p>
      <p>Name: <?=$business['name']?></p>
      <p>Address: <?=$business['address']?></p>
      <p>Founded: <?=$business['founded']?></p>
      <p>Employees: <?=$business['employees']?></p>
      <p>Revenue: <?=$business['revenue']?></p>
    <?php endforeach;?>
 <?php endif;?>

</body>


</html>
