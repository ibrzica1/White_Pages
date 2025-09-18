<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

require_once "../models/Business.php";

if (!isset($_SESSION['logged'])) {
    header("Location: ../view/login.php");
    exit();
}

if(!isset($_POST["id"]) || empty($_POST["id"]))
{
  $_SESSION["message"] = "You didnt send id";
  header("Location: ../view/userBusiness.php");
  exit();
}

$business = new Business();
$userId = $_SESSION["id"];
$businessId = $_POST["id"];

if(isset($_POST['field']))
{
  $fieldToUpdate = $_POST['field'];

  if($fieldToUpdate === 'business_id')
  {
    if(!isset($_POST["newBusiness_id"]) || empty($_POST["newBusiness_id"]))
      {
        $_SESSION["message"] = "You didnt send business id";
        header("Location: ../view/userBusiness.php");
        exit();
      }
    else
      {
        $newBusiness_id = $_POST["newBusiness_id"];
      }

    if($business->checkBusinessIdExists($newBusiness_id))
    {
      $_SESSION["message"] = "Business Id already exists";
      header("Location: ../view/userBusiness.php");
      exit();
    }

    $beforeId = $business->getBusinAtribute($fieldToUpdate,$businessId);

    $business->updateBusinessId($newBusiness_id,$businessId);

    $afterId = $business->getBusinAtribute($fieldToUpdate,$businessId);
    
    if($afterId !== $beforeId)
    {
      $_SESSION["message"] = "Business Id successfully chaged";
      header("Location: ../view/userBusiness.php");
      exit();
    }
    else
    {
      $_SESSION["message"] = "Business Id wasnt chaged";
      header("Location: ../view/userBusiness.php");
      exit();
    }
  }

  if($fieldToUpdate === 'name')
  {
    if(!isset($_POST["newName"]) || empty($_POST["newName"]))
      {
        $_SESSION["message"] = "You didnt send name";
        header("Location: ../view/userBusiness.php");
        exit();
      }
    else
      {
        $newname = $_POST["newName"];
      }

    if($business->checkNameExists($newname))
    {
      $_SESSION["message"] = "Business Name already exists";
      header("Location: ../view/userBusiness.php");
      exit();
    }

    $beforeName = $business->getBusinAtribute($fieldToUpdate,$businessId);

    $business->updateName($newname,$businessId);

    $afterName = $business->getBusinAtribute($fieldToUpdate,$businessId);

    if($afterName !== $beforeName)
    {
      $_SESSION["message"] = "Name successfully chaged";
      header("Location: ../view/userBusiness.php");
      exit();
    }
    else
    {
      $_SESSION["message"] = "Name wasnt chaged";
      header("Location: ../view/userBusiness.php");
      exit();
    }
  }

  if($fieldToUpdate === 'address')
  {
    if(!isset($_POST["newAddress"]) || empty($_POST["newAddress"]))
      {
        $_SESSION["message"] = "You didnt send address";
        header("Location: ../view/userBusiness.php");
        exit();
      }
    else
      {
        $newAddress = $_POST["newAddress"];
      }

    $beforeAddress = $business->getBusinAtribute($fieldToUpdate,$businessId);

    $business->updateAddress($newAddress,$businessId);

    $afterAddress = $business->getBusinAtribute($fieldToUpdate,$businessId);

    if($afterAddress !== $beforeAddress)
    {
      $_SESSION["message"] = "Address successfully chaged";
      header("Location: ../view/userBusiness.php");
      exit();
    }
    else
    {
      $_SESSION["message"] = "Address wasnt chaged";
      header("Location: ../view/userBusiness.php");
      exit();
    }
  }

  if($fieldToUpdate === 'founded')
  {
    if(!isset($_POST["newFounded"]) || empty($_POST["newFounded"]))
      {
        $_SESSION["message"] = "You didnt send founded";
        header("Location: ../view/userBusiness.php");
        exit();
      }
    else
      {
        $newFounded = $_POST["newFounded"];
      }

    if(!$business->checkFoundedDate($newFounded))
    {
      $_SESSION["message"] = "Founded date cant be after today";
      header("Location: ../view/userBusiness.php");
      exit();
    }  

    $beforeFounded = $business->getBusinAtribute($fieldToUpdate,$businessId);

    $business->updateFounded($newFounded,$businessId);

    $afterFounded = $business->getBusinAtribute($fieldToUpdate,$businessId);

    if($afterFounded !== $beforeFounded)
    {
      $_SESSION["message"] = "Founded successfully chaged";
      header("Location: ../view/userBusiness.php");
      exit();
    }
    else
    {
      $_SESSION["message"] = "Founded wasnt chaged";
      header("Location: ../view/userBusiness.php");
      exit();
    }
  }

  if($fieldToUpdate === 'employees')
  {
    if(!isset($_POST["newEmployees"]) || empty($_POST["newEmployees"]))
      {
        $_SESSION["message"] = "You didnt send employees";
        header("Location: ../view/userBusiness.php");
        exit();
      }
    else
      {
        $newEmployees = $_POST["newEmployees"];
      }

    if(!is_numeric($newEmployees))
    {
      $_SESSION["message"] = "Employees input must be a number";
      header("Location: ../view/userBusiness.php");
      exit();
    }

    if(!$business->checkIfPositiveNumber($newEmployees)) 
    {
      $_SESSION["message"] = "Number of employees must be a positive number.";
      header("Location: ../view/userBusiness.php");
      exit();
    }

    $beforeEmployees = $business->getBusinAtribute($fieldToUpdate,$businessId);

    $business->updateEmployees($newEmployees,$businessId);

    $afterEmployees = $business->getBusinAtribute($fieldToUpdate,$businessId);

    if($afterEmployees !== $beforeEmployees)
    {
      $_SESSION["message"] = "Employees successfully chaged";
      header("Location: ../view/userBusiness.php");
      exit();
    }
    else
    {
      $_SESSION["message"] = "Employees wasnt chaged";
      header("Location: ../view/userBusiness.php");
      exit();
    }
  }

  if($fieldToUpdate === 'revenue')
  {
    if(!isset($_POST["newRevenue"]) || empty($_POST["newRevenue"]))
      {
        $_SESSION["message"] = "You didnt send revenue";
        header("Location: ../view/userBusiness.php");
        exit();
      }
    else
      {
        $newRevenue = $_POST["newRevenue"];
      }

    if(!is_numeric($newRevenue))
    {
      $_SESSION["message"] = "Revenue input must be a number";
      header("Location: ../view/userBusiness.php");
      exit();
    }

    if(!$business->checkIfPositiveNumber($newRevenue)) 
    {
      $_SESSION["message"] = "Revenue number must be a positive number.";
      header("Location: ../view/userBusiness.php");
      exit();
    }

    $beforeRevenue = $business->getBusinAtribute($fieldToUpdate,$businessId);

    $business->updateRevenue($newRevenue,$businessId);

    $afterRevenue = $business->getBusinAtribute($fieldToUpdate,$businessId);

    if($afterRevenue !== $beforeRevenue)
    {
      $_SESSION["message"] = "Revenue successfully chaged";
      header("Location: ../view/userBusiness.php");
      exit();
    }
    else
    {
      $_SESSION["message"] = "Revenue wasnt chaged";
      header("Location: ../view/userBusiness.php");
      exit();
    }
  }
}