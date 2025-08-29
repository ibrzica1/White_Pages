<?php

session_start();

if(!isset($_POST["userName"]) || empty($_POST["userName"]))
{
  $_SESSION["message"] = "You didnt send Username";
  header("Location: ../signup.php");
  exit();
}
else
{
  $userName = $_POST["userName"];
}

if(!isset($_POST["email"]) || empty($_POST["email"]))
{
  $_SESSION["message"] = "You didnt send email";
  header("Location: ../signup.php");
  exit();
}
else
{
  $email = $_POST["email"];
}

if(!isset($_POST["password"]) || empty($_POST["password"]))
{
  $_SESSION["message"] = "You didnt send password";
  header("Location: ../signup.php");
  exit();
}
else
{
  $password = $_POST["password"];
}

if(!isset($_POST["repeatPassword"]) || empty($_POST["repeatPassword"]))
{
  $_SESSION["message"] = "You didnt send repeatPassword";
  header("Location: ../signup.php");
  exit();
}
else
{
  $repeatPassword = $_POST["repeatPassword"];
}