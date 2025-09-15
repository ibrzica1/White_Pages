<?php

require_once "Database.php";

class User extends Database
{
  private $username;
  private $email;
  private $password;

  public function checkUsernameExists($name)
  {
    $name = $this->connection->real_escape_string($name);

    $rezultat = $this->connection->query("SELECT * FROM user WHERE username = '$name' ");

    if($rezultat->num_rows > 0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function checkEmailExists($email)
  {
    $email = $this->connection->real_escape_string($email);
    
    $result = $this->connection->query("SELECT * FROM user WHERE email = '$email' ");

    if($result->num_rows > 0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function registerUser($username,$email,$password)
  {
    $username = $this->connection->real_escape_string($username);
    $email = $this->connection->real_escape_string($email);
    $password = password_hash($password, PASSWORD_BCRYPT);
    $password = $this->connection->real_escape_string($password);

    $this->connection->query("INSERT INTO user(username, email, password)
    VALUES ('$username','$email','$password') ");
  }

  public function getUserId($email)
  {
    $result = $this->connection->query("SELECT id FROM user WHERE email = '$email' ");
    $userId = $result->fetch_assoc();
    return $userId['id'];
  }

  public function getUser($id)
  {
    $result = $this->connection->query("SELECT * FROM user WHERE id = '$id' ");
    $user = $result->fetch_assoc();
    return $user;
  }

  public function getUserBusiness($id)
  {
    $result = $this->connection->query("SELECT * FROM business WHERE user_id = '$id' ");
    $business = $result->fetch_all(MYSQLI_ASSOC);
    return $business;
  }

  public function getNumberUserBusiness($id)
  {
    $id = $this->connection->real_escape_string($id);
    $result = $this->connection->query("SELECT * FROM business WHERE user_id = '$id' ");
    $number = $result->num_rows;
    return $number;
  }

  public function getUserPassword($id)
  {
    $id = $this->connection->real_escape_string($id);
    $result = $this->connection->query("SELECT password FROM user WHERE id = '$id' ");
    $password = $result->fetch_assoc();
    return $password['password'];
  }

  public function getUserAtribute($atribute,$id)
  {
    $atribute = $this->connection->real_escape_string($atribute);
    $id = $this->connection->real_escape_string($id);

    $result = $this->connection->query("SELECT $atribute FROM user WHERE id = '$id' ");

    $value = $result->fetch_assoc();

    return $value["$atribute"];
  }

  public function deleteUser($id)
  {
    $id = $this->connection->real_escape_string($id);
    $this->connection->query("DELETE FROM user WHERE id = '$id' ");
    $this->connection->query("DELETE FROM business WHERE user_id = '$id' ");
  }

  public function updateUsername($username,$id)
  {
    $username = $this->connection->real_escape_string($username);

    $this->connection->query("UPDATE user 
    SET username = '$username'
    WHERE id = '$id'");
  }

  public function updateEmail($email,$id)
  {
    $email = $this->connection->real_escape_string($email);
    $id = $this->connection->real_escape_string($id);

    $this->connection->query("UPDATE user 
    SET email = '$email'
    WHERE id = '$id'");
  }

  public function updatePassword($password,$id)
  {
    $password = password_hash($password, PASSWORD_BCRYPT); 
    $password = $this->connection->real_escape_string($password);
    $id = $this->connection->real_escape_string($id);

    $this->connection->query("UPDATE user 
    SET password = '$password'
    WHERE id = '$id'");
  }
}
