<?php

include_once("./dbconnect.php");


if(isset($_POST["submitTestAnswers"])) {
	
	$numberOfRows = $_POST['numberOfRows'];
	$testID = $_POST['testId'];
	$answerValues = [];
	
	$mysql = Connect();

	for ($i = 0; $i < $numberOfRows; $i++) { 

		//Answer Buttons:
		$answerValue = $_POST['Question'. intval($i+1) .'AnswerButtons'];
		array_push($answerValues,$answerValue);

	}

	$sql_reqQuestions = "SELECT * FROM questions WHERE belongsTo = " . $testID ."";
	$getQuestionsData = $mysql->query($sql_reqQuestions);
	if ($getQuestionsData->num_rows > 0) //if there's more than 0 rows, i.e. if there are any rows at all
	{	
		$i = 0;
		while($questionDataRow = $getQuestionsData->fetch_assoc())
		{

			$questionID = $questionDataRow["id"];
			$userID = 79;
			//for ($i = 0; $i < $numberOfRows; $i++) { 
				//$sql_req = "INSERT INTO answers (testID, questionID, studentID, answerValue) VALUE (". "'" . $testID . "','" . $questionID . "','" . $userID . "','" . $answerValues[$i] . "')";

				$sql_req = "INSERT INTO answers (testID, questionID, studentID, answerValue) VALUE ('$testID','$questionID', $userID,'$answerValues[$i]')";

				$i++;
				$mysql->query($sql_req);
			//}

		}
	}
	
	
	$mysql->close();
	
}

echo '<script>document.location.href="StudentFrontPage.php"</script>';
?>