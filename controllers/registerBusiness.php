<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "../models/Business.php";

if(!isset($_POST["business_id"]) || empty($_POST["business_id"]))
{
  $_SESSION["message"] = "You didnt send business_id";
  header("Location: ../view/businessinput.php");
  exit();
}
else
{
  $business_id = $_POST["business_id"];
}

if(!isset($_POST["name"]) || empty($_POST["name"]))
{
  $_SESSION["message"] = "You didnt send name";
  header("Location: ../view/businessinput.php");
  exit();
}
else
{
  $name = $_POST["name"];
}

if(!isset($_POST["address"]) || empty($_POST["address"]))
{
  $_SESSION["message"] = "You didnt send address";
  header("Location: ../view/businessinput.php");
  exit();
}
else
{
  $address = $_POST["address"];
}

if(!isset($_POST["founded"]) || empty($_POST["founded"]))
{
  $_SESSION["message"] = "You didnt send founded";
  header("Location: ../view/businessinput.php");
  exit();
}
else
{
  $founded = $_POST["founded"];
}

if(!isset($_POST["employees"]) || empty($_POST["employees"]))
{
  $_SESSION["message"] = "You didnt send employees";
  header("Location: ../view/businessinput.php");
  exit();
}
else
{
  $employees = $_POST["employees"];
}

if(!isset($_POST["revenue"]) || empty($_POST["revenue"]))
{
  $_SESSION["message"] = "You didnt send revenue";
  header("Location: ../view/businessinput.php");
  exit();
}
else
{
  $revenue = $_POST["revenue"];
}

if(!isset($_SESSION["id"]))
{
  $_SESSION["message"] = "Session Id not set, Login again";
  header("Location: ../view/businessinput.php");
  exit();
}

$user_id = $_SESSION["id"];

$business = new Business();

if($business->checkBusinessIdExists($business_id))
{
  $_SESSION["message"] = "Business Id already exists";
  header("Location: ../view/businessinput.php");
  exit();
}

if($business->checkNameExists($name))
{
  $_SESSION["message"] = "Business Name already exists";
  header("Location: ../view/businessinput.php");
  exit();
}

if(!$business->checkFoundedDate($founded))
{
  $_SESSION["message"] = "Founded date cant be after today ";
  header("Location: ../view/businessinput.php");
  exit();
}

if(!is_numeric($employees))
{
  $_SESSION["message"] = "Employees input must be a number";
  header("Location: ../view/businessinput.php");
  exit();
}

if(!$business->checkIfPositiveNumber($employees)) {
    $_SESSION["message"] = "Number of employees must be a positive number.";
    header("Location: ../view/businessinput.php");
    exit();
}

if(!is_numeric($revenue))
{
  $_SESSION["message"] = "Revenue input must be a number";
  header("Location: ../view/businessinput.php");
  exit();
}

if(!$business->checkIfPositiveNumber($revenue)) {
    $_SESSION["message"] = "Revenue must be a positive number.";
    header("Location: ../view/businessinput.php");
    exit();
}

$oldCount = $business->countUserBusiness($user_id);

$business->registerBusiness($business_id,$user_id,$name,$address,$founded,$employees,$revenue);

$newCount = $business->countUserBusiness($user_id);

if($newCount > $oldCount)
{
  $_SESSION["message"] = "Business successfully registered";
  header ("Location: ../index.php");
  exit();
}
else
{
  $_SESSION["message"] = "Business wasnt registered";
  header ("Location: ../index.php");
  exit();
}

