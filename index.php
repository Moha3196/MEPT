<?php
$GLOBALS["pagename"] = "";
?>
<html>
<head>
  <title>Test Quiz</title>
</head>
<?php
require('./template.php');  //so the system uses this file
LoadTemplate("header");
?>
<body>
  <?php LoadTemplate("overlay");?>
  <br>
  <div id="loginWidget">
    <?php
      require('./login.php');  //so the system uses this file
    ?>
  </div>
</body>
<?php LoadTemplate("footer"); LoadTemplate("lolFooter");?>
<?php LoadTemplate("sysstatus"); ?>
</html>
