<?php 

// database connection file 
include '../include/connect.php';


// $tweet is storing details from username Or email Input 
$tweet = $_POST['tweet'];

// $password is storing details for password Input
$password = $_POST['password'];

// if the $tweet is not set it will get redirected to login page 
if(!$tweet){
  header("location:login.php");
}


// If the $tweet and $password both values are set then $server_Obj Object(of Class Server) 
// will run the login_check Method and Send Data according to it
if($tweet && $password){
  echo $server_Obj->login_information_check($tweet, $password);
}

// To slow the login process of this page so that ajax can load Login Loader  
sleep(1);

?>