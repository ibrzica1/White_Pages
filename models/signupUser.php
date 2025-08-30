<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "User.php";

if(!isset($_POST["username"]) || empty($_POST["username"]))
{
  $_SESSION["message"] = "You didnt send Username";
  header("Location: ../signup.php");
  exit();
}
else
{
  $username = $_POST["username"];
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

$user = new User($username,$email,$password);

if($user->checkUsernameExists($username))
{
  $_SESSION["message"] = "Username already exists";
  header("Location: ../signup.php");
  exit();
}

if($user->checkEmailExists($email))
{
  $_SESSION["message"] = "Email already exists";
  header("Location: ../signup.php");
  exit();
}