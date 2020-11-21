<?php
include_once("./dbconnect.php");

function getTests()  //function for connecting to db and getting all the tests it contains
{
	$sqlRequest = 'SELECT * FROM `tests`';  //takes everything from the "tests" table in the db
	$mysql = Connect(); //connects to database
	$result = ""; //makes sure to reset the variable "result". PHP can declare variables like this, if none already exist, but if it does already exist´, then it just gets overwritten (which is a massive pain for some)
	$result = $mysql->query($sqlRequest);  //we query the "everything" from before and set $result to be this (basically $result becomes everything in the table "tests"
	
	if ($result->num_rows > 0) //if there's more than 0 rows, i.e. if there are any rows at all
    {
      while($row = $result->fetch_assoc())
      {
		  echo '<tr>';
		  echo '<td><label>' . $row["class"];
		  // if ($result->num_rows > 1) {  //checks if there are more than 1 row (of so adds a break to seperate test names)
				// echo '<br>';
		  // }
		  echo '</label></td>';
		  
		  echo '<td><label>' . $row["testName"]; //starts a label, writes the testName in a row
		  // if ($result->num_rows > 1) {
				// echo '<br>';
		  // }
		  echo '</label></td>';  //then ends the label
		  
		  echo '<td><label>' . $row["status"];
		  // if ($result->num_rows > 1) {
				// echo '<br>';
		  // }
		  echo '</label></td>';
		  
		  echo '<td><label>' . $row["startDate"];
		  // if ($result->num_rows > 1) {
				// echo '<br>';
		  // }
		  echo '</label></td>';
		  
		  echo '<td><label>' . $row["endDate"];
		  // if ($result->num_rows > 1) {
				// echo '<br>';
		  // }
		  echo '</label></td>';
		  echo '</tr>';
		  
	  }
	}
	else
	{
		echo '<td><label>ingen</label></td>';  //in case there are no tests, then just writes "ingen" in the table row
		echo '<td><label>ingen</label></td>';
		echo '<td><label>ingen</label></td>';
		echo '<td><label>ingen</label></td>';
		echo '<td><label>ingen</label></td>';
	}
	
	$mysql->close();  //closes the database because we're done looking up stuff in it
}


?>