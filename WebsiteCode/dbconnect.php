<?php
/*
Fill in the database access info here
*/
$serverAdress = "";
$serverUsername = "";
$serverPassword = "";
$DBName = "";
function Connect()
{
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
