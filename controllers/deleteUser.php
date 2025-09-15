<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "../models/User.php";

$userId = $_SESSION["id"];
$user = new User();
$user->deleteUser($userId);

header("Location: logout.php");
exit();