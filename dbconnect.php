<?php
/*
Fill in the database access info here
*/


function Connect()
{
  $serverAdress = "localhost";  //we're using a localhost to see the page
  $serverUsername = "root";
  $serverPassword = "";
  $DBName = "mept";  //specifies the database to take/recieve data from
  $conn = new mysqli($serverAdress, $serverUsername,$serverPassword, $DBName);
  if (!$conn)
  {
    die('Server connection failed!'. mysqli_connect_error());  //in case of fail at connecting
  }
  else
  {
    return $conn;
  }
}


?>
