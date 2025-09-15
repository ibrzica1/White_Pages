<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "../models/Business.php";

$business = new Business();

if(!isset($_POST["delete"]))
{
  $_SESSION["message"] = "You didnt send form delete";
  header("Location: ../view/userBusiness.php");
  exit();
}

$businessId = $_POST["delete"];
$userId = $_SESSION["id"];

$beforeCount = $business->countUserBusiness($userId);

$business->deleteBusiness($businessId);

$afterCount = $business->countUserBusiness($userId);

if($beforeCount === $afterCount)
{
  $_SESSION["message"] = "Business was not deleted";
  header("Location: ../view/userBusiness.php");
  exit();
}
elseif($afterCount > 0)
{
  $_SESSION["message"] = "Business was successfully deleted";
  header("Location: ../view/userBusiness.php");
  exit();
}
elseif($afterCount < 1)
{
  $_SESSION["message"] = "Business was successfully deleted";
  header("Location: ../view/userPage.php");
  exit();
}