<?php

 session_start();
	


 if($_SERVER['REQUEST_METHOD'] == "POST") {

   
    $connection = mysql_pconnect("web7.duc.auburn.edu","kzv0003","kaushik9");
    mysql_select_db("dbkzv0003",$connection) or die(mysql_error());
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $result = mysql_query("SELECT * FROM spectrum_login WHERE username='$username' AND
      password='$password' ");
$_SESSION['user_id'] = $username;

    if(mysql_num_rows($result) > 0) {
      
      $_SESSION['is_logged'] = 1;
	 	  
    }
  }

  if(!isset($_SESSION['is_logged'])) {

    echo '<script type="text/javascript">';
echo 'confirm("Invalid username or password");';

echo 'document.location = "login.html";';
echo '</script>';

  } else {
	
header('Location:loginHome.html');
  }
?>