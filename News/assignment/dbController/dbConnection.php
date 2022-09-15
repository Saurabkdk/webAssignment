<?php

/**
*
*/
class ConnectionDb
{

  public function dbConnection()
  {
    try {

      $dbConnection = new PDO("mysql:host=db;dbname=assignment1", "root", "try");
      $dbConnection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $dbConnection;

    } catch (PDOException $exception) {
      echo "Could not connect with the database : " . $exception->getMessage();
    }

  }
}


?>
