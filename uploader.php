<?php
//denne kode er skrevet af Anton Rosenørn og ikke af os, men den er efterfølgende blevet kommenteret af os

if(isset($_POST["submit"])) {
	$csv = $_FILES["uploadedFile"]["tmp_name"]; //gemmer en variabel, der indeholder CSV-filens indhold, som et array
	$file_as_string = file_get_contents($csv); //gemmer CSV-filens indhold i en variabel, der bliver en string
	
	
	//Hvis den læser CSV som linjer
	$line_arr = 0;  //an array of all the lines (that will eventually exist, just wait) in the uploaded CSV-file
	$counter = 0;  //a counter for keeping track of index - will make more sense later
	$file_as_string = explode("\n",$file_as_string);  //creates an array of strings, where each string in the array is just one line from the CSV-file

	foreach($file_as_string as $entry)  //each of the newly created strings is saved under the variable name "entry" since it will be used as an entry in the database later on
	{
  
		$line = explode(",", $entry); //now we split each entry where a comma is present
		$line_arr[counter] = $line; //saves all the lines just made to an array. Uses counter as an index to cycle through the entire array
		counter++; //adds 1 to the counter, so that all the different indexes are used, and not just one of them
	
	}
	couner = 0;
	
	foreach($line_arr as $row) //each of the lines in the array is saved to the "row" variable
	{
		if(counter > 0)
		{
			$mysql_internal = Connect();  //connects to database
			$sql_req = "INSERT INTO classes (className, student_count) VALUES (" . $row[0] . "," . $row[1] . ")";  //stores the values from the new "row" array in the database
			$mysql_internal->query($sql_req); //sends this to the database
			$mysql_internal->close(); //closes the database, since we're done using it
			counter++;
		}
	}
}
?>