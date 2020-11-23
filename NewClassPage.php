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
    <label style="display: block; margin:0 auto;font-size: 30px;">Name of class</label>
	<input style="display: block; margin:0 auto; width:10%;    font-size: 20px;  "type="text" id="ClassName" name="ClassName" value=""><br>  <!--Navngive klassen -->

<!--
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

<form action="uploader.php" method="post" enctype="multipart/form-data">
  
  Upload CSV-fil med elever:
  <input type="file" name="fileToUpload" id="uploadedFile">
  <input type="submit" value="Upload File" name="submit">
</form>


</body>
</html>
