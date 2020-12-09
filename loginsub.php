<?php 
session_start();
$db = mysqli_connect("localhost","root","","student_management");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sessUserInfo = $_SESSION['loginUser'];

//Loin Checking
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['loginSub']) && $_POST['loginSub'] === 'Log in') {

  
	// username and password sent from form 
  
  $myusername = mysqli_real_escape_string($db,$_POST['username']);
  $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
  $mypassword = md5($mypassword);
  
  $sql = "SELECT * FROM users WHERE username = '".$myusername."' AND pwd = '".$mypassword."' AND status = '1'";

  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  
  $count = mysqli_num_rows($result);
  
  // If result matched $myusername and $mypassword, table row must be 1 row
	
  if($count == 1) {
     $_SESSION['loginUser'] = $row;
     
     header("location: index.php");
     exit;
  }else {
     $value = "Username or Password is invalid";
     setcookie("myLoginErr", $value, time() + 5);
     header("location: login.php");
     exit;
  }
}

?>