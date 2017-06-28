<?php

  $servername = "localhost";
  $username = "root";
  $password = "kini419,247";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=my_oauth2_db", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "<br /><br />Connected successfully";
      }
  catch(PDOException $e)
      {
      echo "Connection failed: " . $e->getMessage();
      }
      //$conn = null;
?>
