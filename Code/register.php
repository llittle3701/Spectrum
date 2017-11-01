<?php

 session_start();
	


 if($_SERVER['REQUEST_METHOD'] == "POST") {

   
    $connection = mysql_pconnect("web7.duc.auburn.edu","kzv0003","kaushik9");
    mysql_select_db("dbkzv0003",$connection) or die(mysql_error());
$email = mysql_real_escape_string($_POST['email']);

    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    
	$result = mysql_query("SELECT * FROM spectrum_login WHERE username='$username'");
	
     if(mysql_num_rows($result) > 0) {
         echo '<script type="text/javascript">';
echo 'confirm("User already exists!");';
echo 'document.location = "home.html";';
echo '</script>';


	 	  
    }
  



$result = mysql_query("insert into spectrum_login values( '$email','$username','$password') ") or die(mysql_error());
$_SESSION['user_id'] = $username;
echo '<script type="text/javascript">';
echo 'confirm("You are registered successfully");';

echo 'document.location = "loginHome.html";';
echo '</script>';
  }
?>