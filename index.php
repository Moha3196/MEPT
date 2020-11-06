<?php
$GLOBALS["pagename"] = "";
?>
<html>
<head>
  <title>Test Quiz</title>
</head>
<?php
require('./template.php');
LoadTemplate("header");
?>
<body>
  <?php LoadTemplate("overlay");?>
  <br>
  <div id="loginWidget" style="display: block; margin-left: auto; margin-right: auto; margin: 10% auto;">
    <?php
      require('./login.php');
    ?>
  </div>
</body>
<?php LoadTemplate("footer"); LoadTemplate("lolFooter");?>
<?php LoadTemplate("sysstatus"); ?>
</html>
