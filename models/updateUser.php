<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "User.php";

$user = new User();
$userId = $_SESSION["id"];

if (!isset($_SESSION['logged'])) {
    header("Location: ../login.php");
    exit();
}

if(isset($_POST['field']))
{

  $fieldToUpdate = $_POST['field'];

  if($fieldToUpdate === 'username')
  {
    if(!isset($_POST["newUsername"]) || empty($_POST["newUsername"]))
      {
        $_SESSION["message"] = "You didnt send username";
        header("Location: ../userPage.php");
        exit();
      }
    else
      {
        $newUsername = $_POST["newUsername"];
      }

    $user->updateUsername($newUsername,$userId);

    $_SESSION["message"] = "Username successfully chaged";
    header("Location: ../userPage.php");
    exit();
  }

  if($fieldToUpdate === 'email')
  {
    if(!isset($_POST["newEmail"]) || empty($_POST["newEmail"]))
      {
        $_SESSION["message"] = "You didnt send email";
        header("Location: ../userPage.php");
        exit();
      }
    else
      {
        $newEmail = $_POST["newEmail"];
      }

    $user->updateEmail($newEmail,$userId);

    $_SESSION["message"] = "Email successfully chaged";
    header("Location: ../userPage.php");
    exit();
  }

  if($fieldToUpdate === 'password')
  {
    if(!isset($_POST["oldPassword"]) || empty($_POST["oldPassword"]))
    {
      $_SESSION["message"] = "You didnt send old Password";
      header("Location: ../userPage.php");
      exit();
    }
    else
    {
      $oldPassword = $_POST["oldPassword"];
    }

    $passwordFromDatabase = $user->getUserPassword($userId);


    if(!password_verify($oldPassword,$passwordFromDatabase))
    {
      $_SESSION["message"] = "Old password is not correct";
      header("Location: ../userPage.php");
      exit();
    }

    if(!isset($_POST["newPassword"]) || empty($_POST["newPassword"]))
    {
      $_SESSION["message"] = "You didnt send new Password";
      header("Location: ../userPage.php");
      exit();
    }
    else
    {
      $newPassword = $_POST["newPassword"];
    }

    if(!isset($_POST["repeatPassword"]) || empty($_POST["repeatPassword"]))
    {
      $_SESSION["message"] = "You didnt send repeat Password";
      header("Location: ../userPage.php");
      exit();
    }
    else
    {
      $repeatPassword = $_POST["repeatPassword"];
    }

    if($newPassword !== $repeatPassword)
    {
      $_SESSION["message"] = "New Password and Repeat Password dont match";
      header("Location: ../userPage.php");
      exit();
    }

    $user->updatePassword($newPassword,$userId);

    $_SESSION["message"] = "Password successfully chaged";
    header("Location: ../userPage.php");
    exit();

  }

}
