<?php

class Database
{
  public $connection;

  public function __construct()
  {
    $this->connection = mysqli_connect("localhost","root","","white_pages");
  }
}