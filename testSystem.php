<?php  //nærmest al koden her er skrevet af Niklas og Anton Rosenørn, der arbejdede sammen om at skrive koden. Koden er efterfølgende blevet kommenteret af os
include_once("./dbconnect.php");

function updateStatus()
{
	$sqlRequest = 'SELECT * FROM `tests`';  //takes everything from the "tests" table in the db
	$mysql = Connect(); //connects to database
	$result = ""; //makes sure to reset the variable "result". PHP can declare variables like this, if none already exist, but if it does already exist´, then it just gets overwritten (which is a massive pain for some)
	$result = $mysql->query($sqlRequest);  //we query the "everything" from before and set $result to be this (basically $result becomes everything in the table "tests"
	
	if ($result->num_rows > 0) //if there's more than 0 rows, i.e. if there are any rows at all
    {
		while($row = $result->fetch_assoc())
		{
			$CurrTime = new DateTime("now");  //variable for now
			$endDate = new DateTime($row["endDate"]);  //variable for the test's deadline
			$startDate = new DateTime($row["startDate"]);  //variable for the test's startDate
			//$endDate = $endDate->format("Y-m-d H:i:s");
			if ($CurrTime > $endDate) {  //is deadline passed
				if ($row["status"] != 0) {  //is the status set correctly, i.e. is 0
					$mysql2 = Connect();  //we use another "mysql" variable, to connect to db and send a new request, since the original is still open
					$newRequest = "UPDATE tests SET status = '0' WHERE id = " . $row["id"];  //if not, then updates to set the status to correct number
					$mysql2->query($newRequest);  //sends the request to the DB
					
					$mysql2->close();
				}
			}
			else if ($CurrTime < $startDate) 
			{
				if ($row["status"] != 2) { //if status is not what it should be, then runs the code that updates it, so it becomes the correct value
					$mysql2 = Connect();  //we closed the other one, so we just open it again and use it here too
					$newRequest = "UPDATE tests SET status = '2' WHERE id = " . $row["id"];  //if not, then updates to set the status to correct number
					$mysql2->query($newRequest);  //sends the request to the DB
					
					$mysql2->close();  //closing is important people
				}
			}
			else if (($CurrTime > $startDate) && ($CurrTime < $endDate)) {  //if current time is between startDate and deadline, then the test must have started and should be "Nuværende"
				if ($row["status"] != 1) { //if status is not what it should be, then runs the code that updates it, so it becomes the correct value
					$mysql2 = Connect();  //heehoo another opening
					$newRequest = "UPDATE tests SET status = '1' WHERE id = " . $row["id"];  //if not, then updates to set the status to correct number
					$mysql2->query($newRequest);  //sends the request to the DB
					
					$mysql2->close();  //wait no, closing aren't important people, but just important, people
				}
			}
		}
	}
	$mysql->close();  //close the main sql-thingy, because we're done with it for now
}


function getTestsForTeacher($statusValue)  //function for connecting to db and getting all the tests it contains
{
	updateStatus();  //runs the update status, BEFORE we grab any data from the "tests" table in the database (which happens on the next line of code)
	
	$sqlRequest = 'SELECT * FROM `tests`';  //takes everything from the "tests" table in the db
	$mysql = Connect(); //connects to database
	$result = ""; //makes sure to reset the variable "result". PHP can declare variables like this, if none already exist, but if it does already exist´, then it just gets overwritten (which is a massive pain for some)
	$result = $mysql->query($sqlRequest);  //we query the "everything" from before and set $result to be this (basically $result becomes everything in the table "tests"
	
	if ($result->num_rows > 0) //if there's more than 0 rows, i.e. if there are any rows at all
    {
		while($row = $result->fetch_assoc())
		{

			$uniqueAnswers = "SELECT COUNT(DISTINCT (studentID)) FROM answers WHERE testID = '". $row["id"] . "';";
			$uniqueAnswersData = $mysql->query($uniqueAnswers);
			$uniqueAnswersData = $uniqueAnswersData->fetch_assoc();
			$uniqueAnswersDataCount = $uniqueAnswersData["COUNT(DISTINCT (studentID))"];
			
			if ($row["status"] == $statusValue) { //if the status of a test is equal to what we call the function with, then loads the info for that specific test
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
				
				#echo '<td><label>' . $row["status"];  //enters the status (forrig, nuværende, planlagt) of the found test as table-data
				echo '<td><label>' . $uniqueAnswersDataCount;  //enters the status (forrig, nuværende, planlagt) of the found test as table-data
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

function getTestsForStudent($statusValue)  //function for connecting to db and getting all the tests it contains
{

	//ob_start(); // ob_start — Turn on output buffering
	//echo '<script>var userID = localStorage.getItem("userID"); document.write(userID);</script>';
	//$userIDFromLocalStorage = ob_get_clean(); // Get current buffer contents and delete current output buffer
	//echo $userIDFromLocalStorage;



	updateStatus();  //runs the update status, BEFORE we grab any data from the "tests" table in the database (which happens on the next line of code)
	
	$sqlRequest = 'SELECT * FROM `tests`';  //takes everything from the "tests" table in the db
	$mysql = Connect(); //connects to database
	$result = ""; //makes sure to reset the variable "result". PHP can declare variables like this, if none already exist, but if it does already exist´, then it just gets overwritten (which is a massive pain for some)
	$result = $mysql->query($sqlRequest);  //we query the "everything" from before and set $result to be this (basically $result becomes everything in the table "tests"
	
	if ($result->num_rows > 0) //if there's more than 0 rows, i.e. if there are any rows at all
    {
		while($row = $result->fetch_assoc())
		{
			
			if ($row["status"] == $statusValue) { //if the status of a test is equal to what we call the function with, then loads the info for that specific test
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
				if ($statusValue == 1) {
				echo '<form action="doTests.php" method="post"></label></td><th><input type="submit" name="startTestSubmit" value="Start"></input><input type="hidden" name="testId" value="'.$row["id"].'" /></form>
				</th>';
				} else {
				echo '</label></td>';
				}
				
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
