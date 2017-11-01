<?php

 session_start();
	


 if($_SERVER['REQUEST_METHOD'] == "POST") {

   
    $connection = mysql_pconnect("web7.duc.auburn.edu","kzv0003","kaushik9");
    mysql_select_db("dbkzv0003",$connection) or die(mysql_error());
$email = mysql_real_escape_string($_POST['email']);

    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
  



$result = mysql_query("update spectrum_login set password ='$password' where username = '$username'") or die(mysql_error());
$_SESSION['user_id'] = $username;
echo '<script type="text/javascript">';
echo 'confirm("Password changed");';

echo 'document.location = "login.html";';
echo '</script>';
  }
?>