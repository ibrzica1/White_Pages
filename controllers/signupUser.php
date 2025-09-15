<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "../models/User.php";


if(!isset($_POST["username"]) || empty($_POST["username"]))
{
  $_SESSION["message"] = "You didnt send Username";
  header("Location: ../view/signup.php");
  exit();
}
else
{
  $username = $_POST["username"];
}

if(!isset($_POST["email"]) || empty($_POST["email"]))
{
  $_SESSION["message"] = "You didnt send email";
  header("Location: ../view/signup.php");
  exit();
}
else
{
  $email = $_POST["email"];
}

if(!isset($_POST["password"]) || empty($_POST["password"]))
{
  $_SESSION["message"] = "You didnt send password";
  header("Location: ../view/signup.php");
  exit();
}
else
{
  $password = $_POST["password"];
}

if(!isset($_POST["repeatPassword"]) || empty($_POST["repeatPassword"]))
{
  $_SESSION["message"] = "You didnt send repeated password";
  header("Location: ../view/signup.php");
  exit();
}
else
{
  $repeatPassword = $_POST["repeatPassword"];
}


$user = new User();

if($user->checkUsernameExists($username))
{
  $_SESSION["message"] = "Username already exists";
  header("Location: ../view/signup.php");
  exit();
}

if($user->checkEmailExists($email))
{
  $_SESSION["message"] = "Email already exists";
  header("Location: ../view/signup.php");
  exit();
}

if($password != $repeatPassword)
{
  $_SESSION["message"] = "Passwords dont match";
  header("Location: ../view/signup.php");
  exit();
}

$user->registerUser($username,$email,$password);

$userId = $user->getUserId($email);

$_SESSION["id"] = $userId;
$_SESSION["username"] = $username;
$_SESSION["logged"] = true;

header("Location: ../index.php");
exit();