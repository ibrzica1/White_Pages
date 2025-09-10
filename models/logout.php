<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

$_SESSION["logged"] = false;

session_destroy();

header("Location: ../index.php");