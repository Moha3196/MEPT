<?php
/*
Fill in the database access info here
*/


function Connect()
{
  $serverAdress = "localhost";
  $serverUsername = "root";
  $serverPassword = "";
  $DBName = "mept";
  $conn = new mysqli($serverAdress, $serverUsername,$serverPassword, $DBName);
  if (!$conn)
  {
    die('Server connection failed!'. mysqli_connect_error());
  }
  else
  {
    return $conn;
  }
}


?>
