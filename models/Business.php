<?php

require_once "Database.php";

class Business extends Database
{
  public $business_id;
  public $user_id;
  public $address;
  public $founded;
  public $employees;
  public $revenue;

  public function checkBusinessIdExists($id)
  {
    $result = $this->connection->query("SELECT * FROM business WHERE business_id = '$id' ");

    if($result->num_rows > 0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function checkFoundedDate($date)
  {
      $foundedDate = new DateTime($date);
      $dateNow = new DateTime();

      if($foundedDate <= $dateNow)
      {
        return true;
      }
      else
      {
        return false;
      }
  }
}