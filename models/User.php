<?php

require_once "Database.php";

class User extends Database
{
  public $username;
  public $email;
  public $password;

  public function __construct($username,$email,$password)
  {
    parent::__construct();

    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
  }

  public function checkUsernameExists($name)
  {
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
    $rezultat = $this->connection->query("SELECT * FROM user WHERE email = '$email' ");

    if($rezultat->num_rows > 0)
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
}