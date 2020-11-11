<?php
require(".\dbconnect.php");
class UserLookup
{
  public $id = 0;
  public $username;
  public $password;
  public $mysql;
  public $type = -1;


  public function __construct( $Username, $Password )
  {
    $this->username = $Username;
    $this->password = $Password;
    $this->mysql = Connect();
  }

  public function Close()
  {
    if($this->mysql)
    {
      $this->mysql->close();
    }
  }

  public function Open()
  {
    $this->Close();
    $this->mysql = Connect();
  }
  public function UsernameCheck()
  {
    $sqlRequest = "SELECT username, id FROM Users";
    $result = $this->mysql->query($sqlRequest);
    if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        if($row['username'] == $this->username)
        {
          $this->id = $row['id'];
          return TRUE;
          break;
        }
      }
      return FALSE;
    }
    else
    {
      echo "<h2 id='loginError' class='error'>DataBase Error 1</h2>";
      die();
    }
  }
  public function GetUserType()
  {
	  if($this->id != 0)
	  {
    $sqlRequest = "SELECT type FROM Users WHERE id=$this->id";
    $result = $this->mysql->query($sqlRequest);
    if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        $this->type = $row['type'];
      }
    }
    else
    {
      echo "<h2 id='loginError' class='error'>DataBase Error 1</h2>";
      die();
    }
	  }
	  else {
		  echo "<h2 id='loginError' class='error'>Can't look up User 0</h2>";
		  return FALSE;
	  }
  }
  public function PasswordCheck()
  {
    $sqlRequest = "SELECT password FROM Users WHERE id=$this->id";
    $result = $this->mysql->query($sqlRequest);
    if ($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        if(hash('sha512', $this->password) === strtolower($row['password']))
        {
          return TRUE;
          break;
        }
      }
      return FALSE;
    }
    else
    {
      echo "<h2 id='loginError' class='error'>DataBase Error</h2>";
      echo "Request : " . $sqlRequest;
      die();
    }
  }

}

function ShowLogin()
{
  echo '<h4 id="loginHeader" class="center">Login</h4>
  <form id="loginForm" method="post" action="login.php">
    <formP > Username </formP><input name="username" id="usernameField" type="text"></input><br><br>  <!-- the username text box -->
    <formP > Password </formP><input name="password" id="passField" type="password"></input><br><br>  <!-- the password text box -->
	<button type="submit" name="login" id="loginBtn">Login</button>  <!-- The login button -->
  </form>';
}

?>



<?php
include_once("./template.php");
if(!isset($_POST['login']))
{
  LoadTemplate("header");
  ShowLogin();
}
else
{
  $global_pagename = "User Page?";
  echo '<html>';
  LoadTemplate("head");
  LoadTemplate("header");
  echo '<body>';
  LoadTemplate("overlay");
  if((strlen($_POST['username']) >= 5 || strlen($_POST['password']) >= 5) && (strlen($_POST['username']) <= 30 || strlen($_POST['password']) <= 30))
  {
    $sane_username = Sanitize($_POST['username']);
    $sane_password = Sanitize($_POST['password']);
    $tmp_mysql = Connect();
    $sqlRequest = "CREATE TABLE IF NOT EXISTS Users(
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(30) NOT NULL,
      password VARCHAR(256) NOT NULL,
      type INT(10) NOT NULL,
      last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    if($tmp_mysql->query($sqlRequest) !== TRUE)
    {
      echo 'Error on table creation' . $tmp_mysql->error;
      die();
    }
    else
    {
      $tmp_mysql->close();
      $userLook = new UserLookup($sane_username, $sane_password);
      if(!$userLook->mysql)
      {
        echo "Reported username: " . $userLook->username . "<br>";
        die("mysql not intilized??");
      }
      //$userLook->Open();
      if($userLook->UsernameCheck())
      {
        if($userLook->PasswordCheck())
        {
          //Success
          echo '<script>OverlayMessage("Site is still under contruction",OverlayType.INFO);</script>';
          $userLook->GetUserType();
		  if($userLook->type == 1) {
			TeacherLoggedIn();
		  } else if($userLook->type == 0) {
			  StudentLoggedIn();
		  }
		$userLook->Close();
          die();
        }
        else
        {
          echo '<script>OverlayMessage("Username or password is incorrect",OverlayType.ERROR);</script>';
          die();
        }
      }
      else
      {
        echo '<script>OverlayMessage("Username or password is incorrect",OverlayType.ERROR);</script>';
        die();
      }
    }

  }
  else
  {/*
    echo '<h2 class="center">Username or Password is too short or long for being valid</h2>';
    echo '<script>';
    echo 'function goBack(){document.location.href="index.php";}';
    echo '</script>';
    echo '<button id="rtnBtn" onClick="goBack()">Go Back</button>';*/
    echo '<script>OverlayMessage("Username or Password is too short or long for being valid",OverlayType.ERROR);</script>';
    die();
  }
}
echo '</body></html>';



?>


<?php

function Sanitize($input)
{
  return filter_var($input,FILTER_SANITIZE_STRING);
}

function TeacherLoggedIn() {
	echo '<script src="teacher.js"></script>';
	echo '<button onclick="CreateNewClass()"> + Opret ny klasse</button>';
	echo '<button onclick="CreateNewTest()"> + Opret ny test</button>';
	
}

function StudentLoggedIn() {
	echo '<script src="student.js"></script>';
	echo '<button onclick="CreateNewClass()"> + Opret ny klasse</button>';
}

?>
