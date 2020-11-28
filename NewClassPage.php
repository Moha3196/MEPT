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
  <br> 
	
	<form action="uploader.php" method="post" enctype="multipart/form-data"> <!-- "action" refers to where we want to send the uploaded file. We don't want to encode the input, so we use multipart/form-data to avoid it.-->
		<label style="display: block; margin:0 auto;font-size: 25px;">Tilføj klasser:</label><br>  <!-- enctype="" requires method="post", so we also have that -->
		<!-- <input style="display: block; margin:0 auto; width:10%; font-size: 20px; "type="text" id="ClassName" name="ClassName" value=""><br> -->
		
		Upload CSV-fil med klasser og antal elever i hver (adskildt med et komma, uden mellemrum): <br><br>
		<input type="file" name="uploadedClasses" id="uploadedFile"><br><br>  <!--the name attribute is relevant for line 7 in uploader.php, because that's what is used - not the id -->
		<input type="submit" value="Upload Fil" name="submit"> <!-- we tell the program that we want to submit this chosen file afterwards -->
	</form>
	
	<br><br><br><br>
	
	<form action="uploader.php" method="post" enctype="multipart/form-data"> <!-- "action" refers to where we want to send the uploaded file. We don't want to encode the input, so we use multipart/form-data to avoid it.-->
		<label style="display: block; margin:0 left; font-size: 25px;">Tilføj elever til denne klasse:</label>  <!-- enctype="" requires method="post", so we also have that -->
		<input style="display: block; margin:0 left; width:10%; font-size: 20px; "type="text" id="ClassName" name="ClassName" value=""><br>
		
		Upload CSV-fil med elever - 1 elev per linje: <br><br>
		<input type="file" name="uploadedStudents" id="uploadedFile"><br><br>  <!--the name attribute is relevant for line 7 in uploader.php, because that's what is used - not the id -->
		<input type="submit" value="Upload Fil" name="submit_students"> <!-- we tell the program that we want to submit this chosen file afterwards -->
	</form>


<!--  the original code we wanted to use for creating classes, but we decided to let users upload files instead
<div class="center2">

<table>
  <tr>
    <td class="StudentNames"></td>
	<td class="arrows"><button class="Select">&laquo; Select</button></td>
	<td class="arrows"><button class="Remove">Remove &raquo;</button></td>
	<td class="StudentNames">student1</td>
  </tr>
  
  <tr>
    <td class="StudentNames"></td>
	<td class="arrows"><button class="Select">&laquo; Select</button></td>
	<td class="arrows"><button class="Remove">Remove &raquo;</button></td>
	<td class="StudentNames">student2</td>
  </tr>
  
  <tr>
    <td class="StudentNames"></td>
	<td class="arrows"><button class="Select">&laquo; Select</button></td>
	<td class="arrows"><button class="Remove">Remove &raquo;</button></td>
	<td class="StudentNames">student3</td>
  </tr>
  
  <tr>
    <td class="StudentNames"></td>
	<td class="arrows"><button class="Select">&laquo; Select</button></td>
	<td class="arrows"><button class="Remove">Remove &raquo;</button></td>
	<td class="StudentNames">student4</td>
  </tr>
  
  <tr>
    <td class="StudentNames"></td>
	<td class="arrows"><button class="Select">&laquo; Select</button></td>
	<td class="arrows"><button class="Remove">Remove &raquo;</button></td>
	<td class="StudentNames">student5</td>
  </tr>
 </table>
 
<table>
  <tr>
	<td class="arrows"><button class="Select">Select All</button></td>
	<td class="arrows"><button class="Remove">Remove All</button></td>
  </tr>
  </table>
  
<table>
  <tr>
	<td style="border:0px"><button class="Remove">Finish class</button></td>
  </tr>
</table>

</div>
-->

</body>
</html>
