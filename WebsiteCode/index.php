<html>
<head>
  <title>Test Quiz!</title>
</head>
<?php
require('./template.php');
LoadTemplate("header");
?>
<body>
  <br>
  <div id="loginWidget">
    <?php
      require('./login.php');
    ?>
  </div>
</body>
<?php LoadTemplate("footer"); LoadTemplate("lolFooter");?>
</html>
