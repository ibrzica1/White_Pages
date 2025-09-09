<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "Business.php";

if (!isset($_SESSION['logged'])) {
    header("Location: ../login.php");
    exit();
}

if(!isset($_POST["id"]) || empty($_POST["id"]))
{
  $_SESSION["message"] = "You didnt send id";
  header("Location: ../userBusiness.php");
  exit();
}

$business = new Business();
$userId = $_SESSION["id"];
$businessId = $_POST["id"];

if(isset($_POST['field']))
{
  $fieldToUpdate = $_POST['field'];

  if($fieldToUpdate === 'business_id')
  {
    if(!isset($_POST["newBusiness_id"]) || empty($_POST["newBusiness_id"]))
      {
        $_SESSION["message"] = "You didnt send business id";
        header("Location: ../userBusiness.php");
        exit();
      }
    else
      {
        $newBusiness_id = $_POST["newBusiness_id"];
      }

    $business->updateBusinessId($newBusiness_id,$businessId);

    $_SESSION["message"] = "Username successfully chaged";
    header("Location: ../userBusiness.php");
    exit();
  }

  if($fieldToUpdate === 'name')
  {
    if(!isset($_POST["newName"]) || empty($_POST["newName"]))
      {
        $_SESSION["message"] = "You didnt send name id";
        header("Location: ../userBusiness.php");
        exit();
      }
    else
      {
        $newname = $_POST["newName"];
      }

    $business->updateName($newname,$businessId);

    $_SESSION["message"] = "Name successfully chaged";
    header("Location: ../userBusiness.php");
    exit();
  }
}