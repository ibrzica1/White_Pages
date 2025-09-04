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

</head>

<body>

  <?php if(isset($_SESSION["logged"])): ?>
    <a href="index.php">Main Page</a>
    <a href="businessInput.php">Register Business</a>
    <p><?= $_SESSION["username"] ?></p>
    <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="index.php">Main Page</a>
      <a href="login.php">Log In</a>
      <a href="signup.php">Sign Up</a>
  <?php endif; ?>

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
