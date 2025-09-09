<?php

require_once "Database.php";

class Business extends Database
{
  public $business_id;
  public $user_id;
  public $name;
  public $address;
  public $founded;
  public $employees;
  public $revenue;

  public function getBusinessByUserId($userId)
  {
     $userId = $this->connection->real_escape_string($userId);

     $result = $this->connection->query("SELECT * FROM business WHERE user_id = '$userId' ");

     $business = $result->fetch_all(MYSQLI_ASSOC);
     return $business;
  }

  public function updateBusinessId($business_id,$id)
  {
    $business_id = $this->connection->real_escape_string($business_id);
    $id = $this->connection->real_escape_string($id);

    $this->connection->query("UPDATE business 
    SET business_id = '$business_id'
    WHERE id = '$id'");
  }

  public function updateName($name,$id)
  {
    $name = $this->connection->real_escape_string($name);
    $id = $this->connection->real_escape_string($id);

    $this->connection->query("UPDATE business 
    SET name = '$name'
    WHERE id = '$id'");
  }

  public function updateAddress($address,$id)
  {
    $address = $this->connection->real_escape_string($address);
    $id = $this->connection->real_escape_string($id);

    $this->connection->query("UPDATE business 
    SET address = '$address'
    WHERE id = '$id'");
  }

  public function updateFounded($founded,$id)
  {
    $founded = $this->connection->real_escape_string($founded);
    $id = $this->connection->real_escape_string($id);

    $this->connection->query("UPDATE business 
    SET founded = '$founded'
    WHERE id = '$id'");
  }

  public function deleteBusiness($id)
  {
    $id = $this->connection->real_escape_string($id);

    $this->connection->query("DELETE FROM business WHERE id = '$id' ");
  }

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

  public function countUserBusiness($userId)
  {
    $userId = $this->connection->real_escape_string($userId);

    $result = $this->connection->query("SELECT * FROM business 
    WHERE user_id = '$userId' ");

    $number = $result->num_rows;

    return $number;
  }

  public function registerBusiness($business_id,$user_id,$name,$address,$founded,$employees,$revenue)
  {
    $business_id = $this->connection->real_escape_string($business_id);
    $user_id = $this->connection->real_escape_string($user_id);
    $name = $this->connection->real_escape_string($name);
    $address = $this->connection->real_escape_string($address);
    $founded = $this->connection->real_escape_string($founded);
    $employees = $this->connection->real_escape_string($employees);
    $revenue = $this->connection->real_escape_string($revenue);

    $this->connection->query("INSERT INTO business(business_id, user_id, name, address, founded, employees, revenue)
    VALUES ('$business_id', '$user_id', '$name', '$address', '$founded', $employees, $revenue)");
  }
}