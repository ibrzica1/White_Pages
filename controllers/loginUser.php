<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "../models/User.php";
require_once "../models/Database.php";

$database = new Database();

if(!isset($_POST["email"]) || empty($_POST["email"]))
{
  $_SESSION["message"] = "You didnt send email";
  header("Location: ../view/login.php");
  exit();
}
else
{
  $email = $_POST["email"];
}

if(!isset($_POST["password"]) || empty($_POST["password"]))
{
  $_SESSION["message"] = "You didnt send password";
  header("Location: ../view/login.php");
  exit();
}
else
{
  $password = $_POST["password"];
}

$result = $database->connection->query("SELECT * FROM user WHERE email = '$email' ");

if($result->num_rows < 1)
{
  $_SESSION["message"] = "Email doesnt exists";
  header("Location: ../view/login.php");
  exit();
}

$user = $result->fetch_assoc();

$passwordFromDatabase = $user["password"];

if(!password_verify($password,$passwordFromDatabase))
{
  $_SESSION["message"] = "Icorrect password";
  header("Location: ../view/login.php");
  exit();
}

$_SESSION["username"] = $user["username"];
$_SESSION["id"] = $user["id"];
$_SESSION["logged"] = true;

header("Location: ../index.php");
exit();
  