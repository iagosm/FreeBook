<?php

class Connection {
  protected $conn;

  public function __construct() {

    try {
      $dbhost = 'localhost';
      $dbname = 'freebook';
      $dbuser = 'root';
      $dbpass = '';
    
      $conn = new PDO("mysql:dbhost=$dbhost;dbname=$dbname", $dbuser, $dbpass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOExcpetion $e) {
      echo 'Error: ' . $e->getMessage();
    }
    
  }

}
