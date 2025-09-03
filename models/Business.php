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
    $id = $this->connection->real_escape_string($id);
    
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

  public function registerBusiness($business_id,$user_id,$address,$founded,$employees,$revenue)
  {
    $business_id = $this->connection->real_escape_string($business_id);
    $user_id = $this->connection->real_escape_string($user_id);
    $address = $this->connection->real_escape_string($address);
    $founded = $this->connection->real_escape_string($founded);
    $employees = $this->connection->real_escape_string($employees);
    $revenue = $this->connection->real_escape_string($revenue);

    $this->connection->query("INSERT INTO business(business_id, user_id, address, founded, employees, revenue)
    VALUES ('$business_id', '$user_id', '$address', '$founded', $employees, $revenue)");
  }
}