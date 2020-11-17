<?php include_once("./template.php");?>

<!doctype html>
  <html>
  <?php LoadTemplate("header");?>

  <head>
  <?php echo '<script src="teacher.js"></script>';?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Create class</title>

  </head>
  <body>

  <h1 style="font-size: 40px;">Create Class</h1>
    <label style="display: block; margin:0 auto; font-size: 30px;">Name of class</label>
	<input style="display: block; margin:0 auto; width:10%; font-size: 20px;" type="text" id="ClassName" name="ClassName" value=""><br>


<div class="center" style="margin-right: 28.5%;	margin-left: 28.5%;">

<table>
  <tr>
    <td class="studenNames"></td>
	<td class="arrows"></td>
		<td class="arrows"></td>
	<td class="studenNames"><input type="button" id="student1" name="student1" value="student1"></td>
  </tr>
  
  <tr>
    <td class="studenNames"></td>
	<td class="arrows"></td>
	<td class="arrows"></td>
	<td class="studenNames"><input type="button" id="student2" name="student2" value="student2"></td>
  </tr>
  
  <tr>
    <td class="studenNames"></td>
	<td class="arrows"></td>
	<td class="arrows"></td>
	<td class="studenNames"><input type="button"id="student3" name="student3" value="student3"></td>
  </tr>
  
  <tr>
    <td class="studenNames"></td>
	<td class="arrows"></td>
	<td class="arrows"></td>
	<td class="studenNames"><input type="button"id="student4" name="student4" value="student4"></td>
  </tr>
  
  <tr>
    <td class="studenNames"></td>
	<td class="arrows"></td>
	<td class="arrows"></td>
	<td class="studenNames"><input type="button"id="student5" name="student5" value="student5"></td>
  </tr>
</table>
</div>

<button style="float: left; margin-left: 28.5%; width: 20%; font-size: 30px;" type="button" onclick="MEPT.page=MEPT.page-1">Previous Question</button>
<button style="float: left; margin-left: 3.0%;  width: 20%; font-size: 30px;" type="button" onclick="MEPT.page=MEPT.page+1">Next Question</button>

  </body>
  </html>