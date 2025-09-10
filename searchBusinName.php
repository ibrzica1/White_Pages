<?php

if(session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }

  if(!isset($_GET["inputBusinName"]) || empty($_GET["inputBusinName"]))
{
  $_SESSION["message"] = "You didnt send input Business Name";
  header("Location: index.php");
  exit();
}
else
{
  $inputBusinName = $_GET["inputBusinName"];
}

require_once "models/Database.php";

$database = new Database();

$inputBusinName = $database->connection->real_escape_string($inputBusinName);

$result = $database->connection->query("SELECT * FROM business WHERE name LIKE '%$inputBusinName%' ");

$businessArray = $result->fetch_all(MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search By Business Name</title>
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
  <h3>Search By Business Name</h3>
    <h4>Results for %<?=$inputBusinName?>%: <span>No Results</span></h4>
 <?php else:?>
  <h3>Search By Business Name</h3>
    <h4>Results for %<?=$inputBusinName?>%:</h4>
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
