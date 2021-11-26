<?php
class Database
{
  private $host;
  private $db;
  private $user;
  private $password;
  private $charset;

  function __construct()
  {
    $this->host = HOST;
    $this->db = DB;
    $this->user = USER;
    $this->password = PASSWORD;
    $this->charset = CHARSET;
  }

  function connect()
  {
    // conectar 
    $conn = new mysqli($this->host, $this->user, $this->password, $this->db);
    $conn->set_charset($this->charset);
    return $conn;
  }
}
