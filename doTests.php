<?php include_once("./template.php");
include_once("./dbconnect.php");
?>

<!doctype html>
<html>
<head>
	<?php LoadTemplate("header");?>
	<?php echo '<script src="student.js"></script>';?>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Quiz Creater</title>
</head>

<body>
	
	<button id="close" class="homeButton" onClick="FrontPage();"><img src="MEPT.png" width="100" height="100" ></button>
	
	<form action="submitAnswer.php" method="post">
		

		<?php 

		if(isset($_POST["startTestSubmit"])) {

			$testID = $_POST['testId'];
			$mysql = Connect();


			$sql_reqTest = "SELECT * FROM tests WHERE id = " . $testID . "";
			$sql_reqQuestions = "SELECT * FROM questions WHERE belongsTo = " . $testID . "";


			$getTestData = $mysql->query($sql_reqTest);
			$testDataRow = $getTestData->fetch_assoc();

			$getQuestionsData = $mysql->query($sql_reqQuestions);
			
			echo '<h1>' . $testDataRow["testName"] .'</h1>';

			if ($getQuestionsData->num_rows > 0) //if there's more than 0 rows, i.e. if there are any rows at all
			{

				$index = 0;
				
				while($questionDataRow = $getQuestionsData->fetch_assoc())
				{
					$numberOfRows = mysqli_num_rows($getQuestionsData);
					$questionName = $questionDataRow["questionHeader"];
					$answer1 = $questionDataRow["answer1"];
					$answer2 = $questionDataRow["answer2"];
					$answer3 = $questionDataRow["answer3"];
					$answer4 = $questionDataRow["answer4"];
					drawQuestion($index+1, $index+1,$numberOfRows,$questionName, $answer1, $answer2, $answer3, $answer4);  
					$index++;
				}
			}
			echo '<input type="hidden" name="numberOfRows" value="'.$numberOfRows.'"/><input type="hidden" name="testId" value="'.$testID.'"/>';

			$mysql->close();
		}
		?>

		<table class="testpageTable">
			<tr>
				<td style="border:0px"><input type="submit" name="submitTestAnswers" class = "klasseTestButton"  style=" float: center; width: 20%; font-size: 30px; margin: auto; 10px" type="button"></input></td>

			<!-- <td style="border:0px"><button class="Remove" type="button" onclick="GoToTeacherFrontPage();">Finish Quiz</button></td> 
				document.location.href='./TeacherFrontPage.php'-->
			</tr>
		</table>
	</form>
</body>
</html>




<?php

function drawQuestion($AnswerButtons,$questionNumber,$questionCount,$questionName,$answer1,$answer2,$answer3,$answer4) {
	echo '
	<h2>Question ' . $questionNumber . ' of ' . $questionCount . '</h2>
	<h2><input class="testpageInput" type="text" READONLY id="Question" name="Question' . $questionNumber . '" value="' . $questionName . '"></h2>
	
	<div class="testpageDiv">
	<table class="testpageTable">  <!-- Laver skemaet hvor lærere kan putte svar ind-->
	<tr>
	<th class="arrows">Skriv spørgsmål</th>  <!--Laver en knap, der kan gør så man kan gå tilbage til et tidligere spørgsmål -->
	<th class="arrows">Vælg Korrekt Svar</th>  <!--Laver en knap, der kan gør så man kan gå frem igen -->
	</tr>

	<tr>
	<td> <input style="display: block; margin:0 auto; width: 100%; font-size: 20px;" type="text" READONLY id="QuestionAnswer1" name="Question' . $questionNumber . 'Answer1" value="' . $answer1 . '"></td>
	<td style="width : 5%;">  <input type="radio" name="Question' . $AnswerButtons . 'AnswerButtons" value="1"></td>  

	<!-- We add the id from the for-loop, that calls this function -->
	</tr>																										   <!--so each question gets its own set of radio-buttons  -->

	<tr>
	<td> <input style="display: block; margin:0 auto; width: 100%; font-size: 20px;" type="text" READONLY id="QuestionAnswer2" name="Question' . $questionNumber . 'Answer2" value="' . $answer2 . '"></td>
	<td style="width : 5%;">  <input type="radio" name="Question' . $AnswerButtons . 'AnswerButtons" value="2"></td>
	</tr>

	<tr>
	<td> <input style="display: block; margin:0 auto; width: 100%; font-size: 20px;" type="text" READONLY id="QuestionAnswer3" name="Question' . $questionNumber . 'Answer3" value="' . $answer3 . '"></td>
	<td style="width : 5%;">  <input type="radio" name="Question' . $AnswerButtons . 'AnswerButtons" value="3"></td>
	</tr>

	<tr>
	<td> <input style="display: block; margin:0 auto; width: 100%; font-size: 20px;" type="text" READONLY id="QuestionAnswer4" name="Question' . $questionNumber . 'Answer4" value="' . $answer4 . '"></td>
	<td style="width : 5%;">  <input type="radio" name="Question' . $AnswerButtons . 'AnswerButtons" value="4"></td>
	</tr>
	</table>
	</div>
	<br><br><br>
	';


}

?>