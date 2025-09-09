<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "Business.php";

$business = new Business();

if(!isset($_POST["delete"]))
{
  $_SESSION["message"] = "You didnt send form delete";
  header("Location: ../userBusiness.php");
  exit();
}

$businessId = $_POST["delete"];

$business->deleteBusiness($businessId);