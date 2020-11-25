<?php include_once("./template.php");?>

<!doctype html>
<html>
	<head>
	<?php LoadTemplate("header");?>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Quiz Creater</title>
	</head>
	
	<body>
		<?php 
		for ($i = 0; $i < 10; $i++) { //Each test consists of 10 questions
			drawQuestion($i+1);           // We originally wanted more, but we're pressed for time and have decided to get the bare minimum,
		}                             // then build more on this, if we have time later 
		?>
		
		<table class="testpageTable">
		<tr>
			<td style="border:0px"><button class="Remove">Finish Quiz</button></td>
		</tr>
		</table>
	</body>
</html>


<?php
function drawQuestion($id) {
	echo '
		<h1>Question x of 10 </h1>
		<h1><input class="testpageInput" type="text" id="Question" name="Question" value="Question"></h1>
	
		<div class="testpageDiv">
		<table class="testpageTable">  <!-- Laver skemaet hvor lærere kan putte svar ind-->
		<tr>
			<th class="arrows">Skriv spørgsmål</th>  <!--Laver en knap, der kan gør så man kan gå tilbage til et tidligere spørgsmål -->
			<th class="arrows">Vælg Korrekt Svar</th>  <!--Laver en knap, der kan gør så man kan gå frem igen -->
		</tr>
		
		<tr>
			<td> <input style="display: block; margin:0 auto; width: 50%; font-size: 20px;" type="text" id="QuestionAnswer1" name="QuestionAnswer1" value=""></td>
			<td style="width : 5%;">  <input type="radio" id="QuestionAnswer1" name="QuestionAnswer' . $id . '"></td>
		</tr>
		
		<tr>
			<td> <input style="display: block; margin:0 auto; width: 50%; font-size: 20px;" type="text" id="QuestionAnswer2" name="QuestionAnswer2" value=""></td>
			<td style="width : 5%;">  <input type="radio" id="QuestionAnswer2" name="QuestionAnswer' . $id . '"></td>
		</tr>
		
		<tr>
			<td> <input style="display: block; margin:0 auto; width: 50%; font-size: 20px;" type="text" id="QuestionAnswer3" name="QuestionAnswer3" value=""></td>
			<td style="width : 5%;"><input type="radio" id="QuestionAnswer3" name="QuestionAnswer' . $id . '"></td>
		</tr>
		
		<tr>
			<td> <input style="display: block; margin:0 auto; width: 50%; font-size: 20px;" type="text" id="QuestionAnswer4" name="QuestionAnswer4" value=""></td>
			<td style="width : 5%;"><input type="radio" id="QuestionAnswer4" name="QuestionAnswer' . $id . '"></td>
		</tr>
		</table>
		</div>
		<br><br><br>
	';
}
?>