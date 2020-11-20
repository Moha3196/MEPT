<?php
include_once("./dbconnect.php");
function getTests()  //function for connecting to db and getting all the tests it contains
{
	$sqlRequest = 'SELECT * FROM `tests`';  //takes everything from the db
	$mysql = Connect(); //connects to database
	$result = ""; //makes sure to reset the variable "result". PHP can declare variables like this, if none already exist, but if it does already exist´, then it just gets overwritten (which is a massive pain for some)
	$result = $mysql->query($sqlRequest);  //we query the "everything" from before and set $result to be this (basically $result becomes everything in the table "tests"
	
	if ($result->num_rows > 0) //if there's more than 0 rows, i.e. if there are any rows at all
    {
      while($row = $result->fetch_assoc())
      {
		  echo '<label>' . $row["testName"]; //starts a label, writes the testName in a row, checks if there are more than 1 row (of so adds a break to seperate test names), then ends label
		  if ($result->num_rows > 1) {
				echo '<br>';
		  }
		  echo '</label>';
	  }
	}
	else
	{
		echo '<label>ingen</label>';  //in case there are no tests, then just writes "ingen" in the table cell
	}
	
	$mysql->close();  //closes the database because we're done looking up stuff in it
}
?>