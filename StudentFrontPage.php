<?php include_once("./template.php");?>
<?php include_once("./testSystem.php");?>

<!doctype html>
<html>
 <?php LoadTemplate("header");?>
 
<head>
  <?php echo '<script src="student.js"></script>';?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body> 

<button id="close" class="closing" style ="border: none; position: fixed; onClick="javascript:close_clip()"><img src="MEPT.png" width="100" height="100" ></button>
<div class="center2" style = "padding-top : 22px;">
  
<table>
  

<text style ="font-size : 30px; margin-left: 5px;">Forrige test</text>

<tr style ="padding-top : 200px;">
	<th style = "padding : 15px;"><label>Hold</label></</th>	
	<th><label>Opgavetitel</label></th>
	<th><label>Besvarelser</label></th>
	<th><label>Startdato</label></th>
	<th><label>Afleveringsfrist</label></</th>
</tr>

<?php getTests(0);?>  <!-- function makes it's own row for each test. Calls function with a certain status-value (here it's 0 for "Forrige tests") -->

<!-- <tr> -->  <!-- placeholder code. No longer needed, since correct code is implemented -->
	<!-- <td class = "padding"><label class = "holdNavn">Lene Hau</label></td> -->
	<!-- <td></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
<!-- </tr> -->


<!-- how everything would look if there were no tests in the database -->
<!-- <tr> -->
	<!-- <td class = "padding"><label class = "holdNavn">Jane Goodall</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
<!-- </tr> -->
	

 <!-- <tr>
    <td>  <label for="Answer">Answer1</label></td>
	<td style="width : 20%;">  <input type="text" id="Answer1" name="Answer" value="1"></td>
  </tr>
  <tr>
    <td>  <label for="Answer2">Answer2</label></td>
	<td style="width : 20%;">  <input type="radio" id="Answer2" name="Answer" value="2"></td>
  </tr>
    <tr>
    <td><label for="Answer3">Answer3</label></td>
	<td style="width : 20%;"><input type="radio"id="Answer3" name="Answer" value="3"></td>
  </tr>
 -->
  
</table>

<table>
<br><br>

<text style ="font-size : 30px; margin-left: 5px;">Nuværende tests</text>

<tr>
	<th style = "padding : 15px"><label>Hold</label></</th>
	<th><label>Opgavetitel</label></th>
	<th><label>Besvarelser</label></th>
	<th><label>Startdato</label></th>
	<th><label>Afleveringsfrist</label></</th>
</tr>

<?php getTests(1);?>  <!-- calls function with a certain status-value (here it's 1 for "Nuværende tests") -->

<!-- <tr> -->  <!-- placeholder code. No longer needed, since correct code is implemented -->
	<!-- <td class = "padding"><label class = "holdNavn">Lene Hau</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
<!-- </tr> -->

<!-- <tr> -->
	<!-- <td class = "padding"><label class = "holdNavn">Jane Goodall</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
<!-- </tr> -->

</table>
</table>

<table>
<br><br>

<text style ="font-size : 30px; margin-left: 5px;">Planlagte tests</text>

<tr>
<th style = "padding : 15px"><label>Hold</label></</th>
	<th><label>Opgavetitel</label></th>
	<th><label>Besvarelser</label></th>
	<th><label>Startdato</label></th>
	<th><label>Afleveringsfrist</label></</th>
</tr>

<?php getTests(2);?>  <!-- calls function with a certain status-value (here it's 2 for "Planlagte tests") -->

<!-- <tr> -->  <!-- placeholder code. No longer needed, since correct code is implemented -->
	<!-- <td class = "padding"><label class = "holdNavn">Lene Hau</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
<!-- </tr> -->

<!-- <tr> -->
	<!-- <td class = "padding"><label class = "holdNavn">Jane Goodall</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
	<!-- <td><label>ingen</label></td> -->
<!-- </tr> -->

</table>

</div>

</body>
</html>