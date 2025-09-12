<?php

if(session_status() == PHP_SESSION_NONE)
  {
    session_start();
  }

require_once "models/Business.php";

$business = new Business();

if(isset($_GET["field"]))
{
  $fieldToSearch = $_GET["field"];

  if($fieldToSearch === "business-id")
  {
    if(!isset($_GET["inputBusinId"]) || empty($_GET["inputBusinId"]))
      {
        $_SESSION["message"] = "You didnt send input Business Id";
        header("Location: index.php");
        exit();
      }
      else
      {
        $input = $_GET["inputBusinId"];
      }
    $searchType = "Id";
    
    $businessArray = $business->getSearchBusinId($input);
  }

  if($fieldToSearch === "address")
  {
    if(!isset($_GET["inputBusinAddress"]) || empty($_GET["inputBusinAddress"]))
      {
        $_SESSION["message"] = "You didnt send input Business Address";
        header("Location: index.php");
        exit();
      }
      else
      {
        $input = $_GET["inputBusinAddress"];
      }
    $searchType = "Address";
    
    $businessArray = $business->getSearchBusinAddress($input);
  }

  if($fieldToSearch === "name")
  {
    if(!isset($_GET["inputBusinName"]) || empty($_GET["inputBusinName"]))
      {
        $_SESSION["message"] = "You didnt send input Business Name";
        header("Location: index.php");
        exit();
      }
      else
      {
        $input = $_GET["inputBusinName"];
      }
    $searchType = "Name";
    
    $businessArray = $business->getSearchBusinName($input);
  }
}
else
{
  $_SESSION["message"] = "You didnt send hidden input field";
  header("Location: index.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search By Business <?=$searchType?></title>
  <link rel="stylesheet" href="style/header.css">
  <link rel="stylesheet" href="style/searchBusiness.css">
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

  <div class="search-busin-body">
    <h class="search-type">Search By Business <?=$searchType?></h>
    <h class="search-found"><?=$input?> <span class="span">No business found</span></h>
  </div>
  
 <?php else:?>

  <div class="search-busin-body">
    <h class="search-type">Search By Business <?=$searchType?></h>
    <h class="search-found"><?=$input?> <span class="span"><span class="span-number"><?=count($businessArray)?></span> business found</span></h>

      <?php foreach($businessArray as $business):?>

      <div class="business-container">
        <div class="name-container">
          <img src="images\briefcase.png">
          <p>Name: <span><?=$business['name']?></span></p>
        </div>
        <div class="attribute">
          <img src="images\fingerprint.png">
          <p>Business ID: <span><?=$business['business_id']?></span></p>
        </div>
        <div class="attribute">
          <img src="images\location.png">
          <p>Address: <span><?=$business['address']?></span></p>
        </div>
        <div class="attribute">
          <img src="images\pantheon.png">
          <p>Founded: <span><?=$business['founded']?></span></p>
        </div>        
        <div class="attribute">
          <img src="images\employee.png">
          <p>Employees: <span><?=$business['employees']?></span></p>
        </div>
        <div class="attribute">
          <img src="images\salary.png">
          <p>Revenue: <span><?=$business['revenue']?></span></p>
        </div>
        

      </div>

      <?php endforeach;?>

  </div>
    
 <?php endif;?>

</body>


</html>
