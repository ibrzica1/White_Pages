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
}