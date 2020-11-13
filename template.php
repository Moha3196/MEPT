<?php
$GLOBALS["pagename"] = "page? - Am I.... A PAGE?!?!?!?!?";
function LoadTemplate($area)
{
  if($area == "header")
  {
	echo "<header>";
    echo "<link rel='stylesheet' href='template.css'>";  //links the CSS-file to the rest of the system
    echo '<script src="mainJs.js"></script>';  //links the mainJS-file to the rest of the system
    echo "<header id='header' class='center'>";
    echo "<h1 id='siteHeader' class='center'>Test Quiz System</h1> ";
    echo "</header>";
  }
  else if($area == "overlay")
  {
    echo '<div id="overlay"></div>';
  }
  else if($area == "footer")
  {

  }
  else if($area == "sysstatus")
  {
    echo '<script>OverlayMessage("System should be working",OverlayType.INFO);</script>';
  }
  else if($area == "head")
  {
    echo '<head><title>' . "Test Quiz System " . $GLOBALS["pagename"] . '</title><meta charset=UTF-8></head>';
  }
  else if($area == "lolFooter")
  {
    echo "<script src='megaAwesomeJavaScriptThatSucks.js'></script>";  //links the shitpost-file to the rest of the system
  }
  else if($area == "userPage")
  {
	
  }
}

?>
