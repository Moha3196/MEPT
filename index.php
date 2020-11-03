<?php
$GLOBALS["pagename"] = "";
?>
<html>
<head>
  <title>Test Quiz!</title>
</head>
<?php
require('./template.php');
LoadTemplate("header");
?>
<body>
  <?php LoadTemplate("overlay");?>
  <br>
  <div id="loginWidget">
    <?php
      require('./login.php');
    ?>
  </div>
</body>
<?php LoadTemplate("footer"); LoadTemplate("lolFooter");?>
<?php LoadTemplate("sysstatus"); ?>
</html>
