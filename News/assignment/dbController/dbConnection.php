<?php

/**
*
*/
//creating a class for connecting to database
class ConnectionDb
{

  //function to provide database connection
  public function dbConnection()
  {
    try {

      //creating the PDO connection and storing in a variable
      $dbConnection = new PDO("mysql:host=db;dbname=assignment1", "root", "try");
      //showing error in case of Exception
      $dbConnection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //returning the connection
      return $dbConnection;

    } catch (PDOException $exception) {
      //In case data could not be connected, display error
      echo "Could not connect with the database : " . $exception->getMessage();
    }

  }
}


?>
