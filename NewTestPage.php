<?php include_once("./template.php");?>


<!doctype html>
<html>
	<head>
	<?php LoadTemplate("header");?>
	<?php echo '<script src="teacher.js"></script>';?>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Quiz Creater</title>
	</head>
	
	<body>

		<form action="submitTest.php" method="post">
		
		<h1><input type="text" name="testTitle" placeholder="Test Name"/></h1>
		<h1><input type="date" min="2020-11-26" max="2020-12-01" name="startDate" placeholder="Pick Starting Date"/><input type="date" name="deadline" placeholder="Pick Deadline"/></h1>
		<h1><input type="text" name="forClass" placeholder="Choose Class"/></h1>
		
		<?php 
		for ($i = 0; $i < 10; $i++) {  //Each test consists of 10 questions
			drawQuestion($i+1, $i+1);  // We originally wanted more, but we're pressed for time and have decided to get the bare minimum,
		}                              // then build more on this, if we have time later 
		?>
		
		<table class="testpageTable">
		<tr>
			<td style="border:0px"><input type="submit" name="submit" class = "klasseTestButton"  style=" float: center; width: 20%; font-size: 30px; margin: auto; 10px" value="Create Test"></input></td>

			<!-- <td style="border:0px"><button class="Remove" type="button" onclick="GoToTeacherFrontPage();">Finish Quiz</button></td> 
			document.location.href='./TeacherFrontPage.php'-->
		</tr>
		</table>
	</form>
	</body>
</html>
	
	


<?php

function drawQuestion($AnswerButtons,$questionNumber) {
	echo '
		<h2>Question ' . $questionNumber . ' of 10</h2>
		<h2><input class="testpageInput" type="text" id="Question" name="Question' . $questionNumber . '" value="Question"></h2>
	
		<div class="testpageDiv">
		<table class="testpageTable">  <!-- Laver skemaet hvor lærere kan putte svar ind-->
		<tr>
			<th class="arrows">Skriv spørgsmål</th>  <!--Laver en knap, der kan gør så man kan gå tilbage til et tidligere spørgsmål -->
			<th class="arrows">Vælg Korrekt Svar</th>  <!--Laver en knap, der kan gør så man kan gå frem igen -->
		</tr>
		
		<tr>
			<td> <input style="display: block; margin:0 auto; width: 100%; font-size: 20px;" type="text" id="QuestionAnswer1" name="Question' . $questionNumber . 'Answer1" value=""></td>
			<td style="width : 5%;">  <input type="radio" name="Question' . $AnswerButtons . 'AnswerButtons" value="1"></td>  

			<!-- We add the id from the for-loop, that calls this function -->
		</tr>																										   <!--so each question gets its own set of radio-buttons  -->
		
		<tr>
			<td> <input style="display: block; margin:0 auto; width: 100%; font-size: 20px;" type="text" id="QuestionAnswer2" name="Question' . $questionNumber . 'Answer2" value=""></td>
			<td style="width : 5%;">  <input type="radio" name="Question' . $AnswerButtons . 'AnswerButtons" value="2"></td>
		</tr>
		
		<tr>
			<td> <input style="display: block; margin:0 auto; width: 100%; font-size: 20px;" type="text" id="QuestionAnswer3" name="Question' . $questionNumber . 'Answer3" value=""></td>
			<td style="width : 5%;">  <input type="radio" name="Question' . $AnswerButtons . 'AnswerButtons" value="3"></td>
		</tr>
		
		<tr>
			<td> <input style="display: block; margin:0 auto; width: 100%; font-size: 20px;" type="text" id="QuestionAnswer4" name="Question' . $questionNumber . 'Answer4" value=""></td>
			<td style="width : 5%;">  <input type="radio" name="Question' . $AnswerButtons . 'AnswerButtons" value="4"></td>
		</tr>
		</table>
		</div>
		<br><br><br>
	';


}

?>