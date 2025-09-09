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
        $_SESSION["message"] = "You didnt send name";
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

  if($fieldToUpdate === 'address')
  {
    if(!isset($_POST["newAddress"]) || empty($_POST["newAddress"]))
      {
        $_SESSION["message"] = "You didnt send address";
        header("Location: ../userBusiness.php");
        exit();
      }
    else
      {
        $newAddress = $_POST["newAddress"];
      }

    $business->updateAddress($newAddress,$businessId);

    $_SESSION["message"] = "Address successfully chaged";
    header("Location: ../userBusiness.php");
    exit();
  }

  if($fieldToUpdate === 'founded')
  {
    if(!isset($_POST["newFounded"]) || empty($_POST["newFounded"]))
      {
        $_SESSION["message"] = "You didnt send founded";
        header("Location: ../userBusiness.php");
        exit();
      }
    else
      {
        $newFounded = $_POST["newFounded"];
      }

    $business->updateFounded($newFounded,$businessId);

    $_SESSION["message"] = "Founded successfully chaged";
    header("Location: ../userBusiness.php");
    exit();
  }

  if($fieldToUpdate === 'employees')
  {
    if(!isset($_POST["newEmployees"]) || empty($_POST["newEmployees"]))
      {
        $_SESSION["message"] = "You didnt send employees";
        header("Location: ../userBusiness.php");
        exit();
      }
    else
      {
        $newEmployees = $_POST["newEmployees"];
      }

    $business->updateEmployees($newEmployees,$businessId);

    $_SESSION["message"] = "Employees successfully chaged";
    header("Location: ../userBusiness.php");
    exit();
  }

  if($fieldToUpdate === 'revenue')
  {
    if(!isset($_POST["newRevenue"]) || empty($_POST["newRevenue"]))
      {
        $_SESSION["message"] = "You didnt send revenue";
        header("Location: ../userBusiness.php");
        exit();
      }
    else
      {
        $newRevenue = $_POST["newRevenue"];
      }

    $business->updateRevenue($newRevenue,$businessId);

    $_SESSION["message"] = "Revenue successfully chaged";
    header("Location: ../userBusiness.php");
    exit();
  }
}