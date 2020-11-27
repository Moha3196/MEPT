<?php

include_once("./dbconnect.php");


if(isset($_POST["submit"])) {
	$CurrTime = new DateTime("now");
	$testTitle = $_POST['testTitle'];
	$startDate = $_POST['startDate'];
	$deadline = $_POST['deadline'];
	$forClass = $_POST['forClass'];

	$answerArray = [];
	$questionHeaderArray = [];

	for ($i = 0; $i < 10; $i++) { 
		$tmpAnswerArray = [];

		//Question Header:
		$questionHeader = $_POST['Question'. intval($i+1) .''];
		$questionHeaderArray[] = $questionHeader;

		//Answers:
		$answer1 = $_POST['Question'. intval($i+1) .'Answer1'];
		$answer2 = $_POST['Question'. intval($i+1) .'Answer2'];
		$answer3 = $_POST['Question'. intval($i+1) .'Answer3'];
		$answer4 = $_POST['Question'. intval($i+1) .'Answer4'];

		$tmpAnswerArray[0] = $answer1;
		$tmpAnswerArray[1] = $answer2;
		$tmpAnswerArray[2] = $answer3;
		$tmpAnswerArray[3] = $answer4;
		$answerArray[$i] = $tmpAnswerArray;
	}

	/*echo '<h1>'.$testTitle.'</h1>';
	for ($i = 0; $i < 10; $i++) { 
		echo '<h2>'.$questionHeaderArray[$i].'</h2>';
		for ($j = 0; $j < 4; $j++) { 
			echo '<h3>'.$answerArray[$i][$j].'</h3>';
		}
	}*/

	if ($CurrTime < $startDate) {
		$status = 0;
	}
	else if ($CurrTime > $deadline) {
		$status = 2;
	}
	else {
		$status = 1;
	}

	$mysql = Connect();
	$sql_req1 = "INSERT INTO tests (testName, status, startDate, endDate, class) VALUE (". "'" . $testTitle . "','" . $status . "','" . $startDate . "','" . $deadline . "','" . $forClass . "')";
	$mysql->query($sql_req1);

	$latestTestID = "";
	$sql_req2 = "SELECT * FROM tests ORDER BY id DESC LIMIT 1";
	$result = $mysql->query($sql_req2);
	/* while($row = $result->fetch_assoc()) {
		echo $row['id'];
	} 
	*/
	$row = $result->fetch_assoc();
	
	for ($i = 0; $i < 10; $i++) { 
		$sql_req = "INSERT INTO questions (belongsTo, questionHeader, answer1, answer2, answer3, answer4) VALUE (". "'" . $row['id'] . "','" . $questionHeaderArray[$i] . "','" . $answerArray[$i][0] . "','" . $answerArray[$i][1] . "','" . $answerArray[$i][2] . "','" . $answerArray[$i][3] . "')";
		$mysql->query($sql_req);

	}
	$mysql->close();
}

echo '<script>document.location.href="TeacherFrontPage.php"</script>';
?>