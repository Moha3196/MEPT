<?php
//The code was originally written by Anton Rosenørn and not by us, but we've since commented it ourselves.
//We have also edited parts of it ourselves, so it suits our needs

include_once("./dbconnect.php");  //so we can send/recieve data from the db

$exitStatus = 1;  //used for SUCCESS and ERROR overlays. 1 means SUCCESS, 0 means ERROR. $exitStatus changes if an error occurs

if(isset($_POST["submit"])) {
	if ($_FILES["uploadedClasses"]["error"] == 0) {  //if we get an error, when attempting to upload a file
		//$placeInClass = $_POST["ClassName"];  //saves the given className to a variable
		$csvClasses = $_FILES["uploadedClasses"]["tmp_name"]; //saves a variable, that contains a CSV-file, as an array$csvStudents = $_FILES["uploadedStudents"]["tmp_name"];
		$classes_as_string = file_get_contents($csvClasses); //saves the contents of the CSV-file to a variable, that becomes one big string$students_as_string = file_get_contents($csvStudents);
		//print_r($file_as_string);
		
		
		$counter = 0;  //a counter for keeping track of index - will make more sense later
		$temp_arr_classes = explode(PHP_EOL,$classes_as_string);  //creates an array of strings, where each string in the array is just one line from the CSV-file (PHP_EOL means "PHP End Of Line",
																  //i.e. "where this line ends")$temp_arr_students = explode(PHP_EOL,$students_as_string);
		$line_arr_classes = array(count($temp_arr_classes));  //an array of all the lines (that will eventually exist, just wait) in the uploaded CSV-file	$line_arr_students = array(count($temp_arr_students));
		$classCount = intval(count($temp_arr_classes));  //counts the amount of lines (i.e. new classes) with count() and saves this as an int
		echo 'creating ' . intval($classCount-1) . " Classes<br>";  //tells us the amount of classes are being creating
		//var_dump($temp_arr_classes);
		
		foreach($temp_arr_classes as $entry)  //each of the newly created strings is saved under the variable name "entry" since it will be used as an entry in the database later on
		{
			if($counter != 0)
			{
				$line = explode(",", $entry); //now we split each entry where a comma is present
				$line_arr_classes[$counter-1] = $line; //saves all the lines just made to an array. Uses counter as an index to cycle through the entire array
				//var_dump($line_arr_classes[$counter-1]);
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
		//var_dump($line_arr_classes);
		
		foreach($line_arr_classes as $row) //each of the lines in the array is saved to the "row" variable
		{
			$mysql_internal = Connect();  //connects to database
			$sql_req = "INSERT INTO classes (className, studentCount)
						VALUES (" . "'" . $row[0] . "'," . $row[1] . ")";  //stores the values from the new "row" array in the database
			$mysql_internal->query($sql_req); //sends this to the database
			$mysql_internal->close(); //closes the database, since we're done using it
			
			$counter++;
		}
		
		
	}
	else {
		echo 'Upload failed. Error is: ' . $_FILES["uploadedClasses"]["error"];  //prints the error, if we get one
		$exitStatus = 0;  //changes the status to 0
	}
}
else if (isset($_POST["submit_students"])) {
	if ($_FILES["uploadedStudents"]["error"] == 0) {  //if we get an error, when attempting to upload a file
		$placeInClass = $_POST["ClassName"];  //saves the given className to a variable
		$csvStudents = $_FILES["uploadedStudents"]["tmp_name"];
		$students_as_string = file_get_contents($csvStudents);
		//print_r($file_as_string);
		
		
		$counter = 0;
		$temp_arr_students = explode(PHP_EOL, $students_as_string);$line_arr_classes = array(count($temp_arr_classes));  
		$line_arr_students = array(count($temp_arr_students));
		//var_dump($temp_arr_classes);
		//echo "<br>";
		
		foreach($temp_arr_students as $entry)
		{
			if($counter != 0)
			{
				$line = explode(",", $entry);
				$line_arr_students[$counter-1] = $line;
				//var_dump($line_arr_classes[$counter-1]);
			}
			$counter++;
		}
		$counter = 0;
		
		/*
		$mysql_internal = Connect();  //connects to database
		$sql_req = "INSERT INTO classes (className) VALUES (" . "'" . $newClassName . "'". ")";  //stores the values from the new "row" array in the database
		$mysql_internal->query($sql_req); //sends this to the database
		$mysql_internal->close(); //closes the database, since we're done using it
		*/
		//var_dump($line_arr_classes);
		
		foreach($line_arr_students as $row) //each of the lines in the array is saved to the "row" variable
		{
			$mysql_internal = Connect();  //connects to database
			$sql_req = "INSERT INTO users (name, username, password, type, inClasses)
						VALUES (" . "'" . $row[0] . "','" . $row[1] . "','" . hash("sha512", $row[2]) . "', 0, '" . $_POST["ClassName"] . "')";
			$mysql_internal->query($sql_req); //sends this to the database
			$mysql_internal->close(); //closes the database, since we're done using it
			
			$counter++;
		}
		//readfile($_FILES["uploadedClasses"]["tmp_name"]);
	}
	else {
		echo 'Upload failed. Error is: ' . $_FILES["uploadedClasses"]["error"];
		$exitStatus = 0;  //changes the status to 0
	}
}
else {
	$exitStatus = 0;  //if an error occurs, we set status to 0, so it gives an ERROR overlay
}

echo '<script>document.location.href="TeacherFrontPage.php?status=' . $exitStatus . '"</script>';  //links back to the TeacherFrontPage after the file is uploaded
?>
