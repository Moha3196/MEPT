<?php



function getQuestions($testID)  //function for connecting to db and getting all the tests it contains
{
	updateStatus();  //runs the update status, BEFORE we grab any data from the "tests" table in the database (which happens on the next line of code)
	
	$sqlRequest = 'SELECT * FROM `questions`';  //takes everything from the "tests" table in the db
	$mysql = Connect(); //connects to database
	$result = ""; //makes sure to reset the variable "result". PHP can declare variables like this, if none already exist, but if it does already exist´, then it just gets overwritten (which is a massive pain for some)
	$result = $mysql->query($sqlRequest);  //we query the "everything" from before and set $result to be this (basically $result becomes everything in the table "tests"
	
	if ($result->num_rows > 0) //if there's more than 0 rows, i.e. if there are any rows at all
    {
		while($row = $result->fetch_assoc())
		{
			
			if ($row["belongsTo"] == $testID) { //if the status of a test is equal to what we call the function with, then loads the info for that specific test
				echo '<tr>'; //starts a new row for each test
				
				if (strlen($row["class"]) > 0) {  //a class must be a string, that's longer than 0 chars, so if it's longer, then it must valid. This only works on strings (or string-like things)
					echo '<td><label class = "holdNavn">' . $row["class"];  //enters the class of the found test as table-data
					echo '</label></td>';
				}
				else {  //if it's not, then it must be because it's not defined (somehow) and therefore we'll say "Ikke Angivet"
					echo '<td><label>Ikke angivet</label></td>';
				}
				
				if (strlen($row["testName"]) > 0) {  //another validity test
					echo '<td><label>' . $row["testName"];  //enters the name of the found test as table-data
					echo '</label></td>';
				}
				else {
					echo '<td><label>Ikke angivet</label></td>';
				}
				
				
				echo '<td><label>' . $row["status"];  //enters the status (forrig, nuværende, planlagt) of the found test as table-data
				echo '</label></td>';
				
				echo '<td><label>' . $row["startDate"];  //enters the starting date of the found test as table-data
				echo '</label></td>';
				
				echo '<td><label>' . $row["endDate"];  //enters the deadline of the found test as table-data
				echo '</label></td>';
				
				echo '</tr>'; //ends the test's row. The next test will get it's own row
			}
		}
	}
	// else  //this was original "nothing to report" code. The code's been optimized to write stuff for each individual piece of info, instead, so this is no longer needed
	// {
		// echo '<td><label>ingen</label></td>';  //in case there are no tests, then just writes "ingen" in the table row
		// echo '<td><label>ingen</label></td>';
		// echo '<td><label>ingen</label></td>';
		// echo '<td><label>ingen</label></td>';
		// echo '<td><label>ingen</label></td>';
	// }
	
	$mysql->close();  //closes the database search because we're done looking up / getting stuff in it
}

?>