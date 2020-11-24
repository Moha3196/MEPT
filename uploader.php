<?php
//denne kode er oprindeligt skrevet af Anton Rosenørn og ikke af os, men den er efterfølgende blevet kommenteret af os. Vi har også selv redigeret i den, for at tilpasse den bedre til vores behov

include_once("./dbconnect.php");

$exitStatus = 1;

if(isset($_POST["submit"])) {
	if ($_FILES["uploadedFile"]["error"] == 0) {
		$newClassName = $_POST["ClassName"];
		$csv = $_FILES["uploadedFile"]["tmp_name"]; //saves a variable, that contains a CSV-file, as an array
		$file_as_string = file_get_contents($csv); //saves the contents of the CSV-file in a variable, that becomes a string
		//print_r($file_as_string);
		
		
		$counter = 0;  //a counter for keeping track of index - will make more sense later
		$temp_arr = explode(PHP_EOL,$file_as_string);  //creates an array of strings, where each string in the array is just one line from the CSV-file
		$line_arr = array(count($temp_arr));  //an array of all the lines (that will eventually exist, just wait) in the uploaded CSV-file
		$classCount = intval(count($temp_arr));
		echo 'creating ' . intval($classCount-1) . " Classes<br>";
		//var_dump($temp_arr);
		//echo "<br>";
		foreach($temp_arr as $entry)  //each of the newly created strings is saved under the variable name "entry" since it will be used as an entry in the database later on
		{
			if($counter != 0)
			{
				$line = explode(",", $entry); //now we split each entry where a comma is present
				$line_arr[$counter-1] = $line; //saves all the lines just made to an array. Uses counter as an index to cycle through the entire array
				//var_dump($line_arr[$counter-1]);
		
				
			}
			$counter++; //adds 1 to the counter, so that all the different indexes are used, and not just one of them
		}
		$counter = 0;
		/*
		$mysql_internal = Connect();  //connects to database
		$sql_req = "INSERT INTO classes (className) VALUES (" . "'" . $newClassName . "'". ")";  //stores the values from the new "row" array in the database
		$mysql_internal->query($sql_req); //sends this to the database
		$mysql_internal->close(); //closes the database, since we're done using it
		*/
		//var_dump($line_arr);
		foreach($line_arr as $row) //each of the lines in the array is saved to the "row" variable
		{
			$mysql_internal = Connect();  //connects to database
			$sql_req = "INSERT INTO classes (className, studentCount) VALUES (" . "'" . $row[0] . "',". $row[1] . ")";  //stores the values from the new "row" array in the database
			$mysql_internal->query($sql_req); //sends this to the database
			$mysql_internal->close(); //closes the database, since we're done using it
			
			$counter++;
		}
		//readfile($_FILES["uploadedFile"]["tmp_name"]);
	}
	else {
		echo 'Upload failed. Error is: ' . $_FILES["uploadedFile"]["error"];
		$exitStatus = 0;
	}
}
else {
	$exitStatus = 0;
}

echo '<script>document.location.href="TeacherFrontPage.php?status=' . $exitStatus . '"</script>';
?>
