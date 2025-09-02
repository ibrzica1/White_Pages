<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "Business.php";

if(!isset($_POST["business_id"]) || empty($_POST["business_id"]))
{
  $_SESSION["message"] = "You didnt send business_id";
  header("Location: ../businessinput.php");
  exit();
}
else
{
  $business_id = $_POST["business_id"];
}

if(!isset($_POST["address"]) || empty($_POST["address"]))
{
  $_SESSION["message"] = "You didnt send address";
  header("Location: ../businessinput.php");
  exit();
}
else
{
  $address = $_POST["address"];
}

if(!isset($_POST["founded"]) || empty($_POST["founded"]))
{
  $_SESSION["message"] = "You didnt send founded";
  header("Location: ../businessinput.php");
  exit();
}
else
{
  $founded = $_POST["founded"];
}

if(!isset($_POST["employees"]) || empty($_POST["employees"]))
{
  $_SESSION["message"] = "You didnt send employees";
  header("Location: ../businessinput.php");
  exit();
}
else
{
  $employees = $_POST["employees"];
}

if(!isset($_POST["revenue"]) || empty($_POST["revenue"]))
{
  $_SESSION["message"] = "You didnt send revenue";
  header("Location: ../businessinput.php");
  exit();
}
else
{
  $revenue = $_POST["revenue"];
}

$business = new Business();

if($business->checkBusinessIdExists($business_id))
{
  $_SESSION["message"] = "Business Id already exists";
  header("Location: ../businessinput.php");
  exit();
}

if(!isset($_SESSION["id"]))
{
  $_SESSION["message"] = "Session Id not set, Login again";
  header("Location: ../businessinput.php");
  exit();
}

$user_id = $_SESSION["id"];

if(!$business->validateDateFormat($founded))
{
  $_SESSION["message"] = "Founded date incorrect input or format (YYYY-MM-DD)";
  header("Location: ../businessinput.php");
  exit();
}