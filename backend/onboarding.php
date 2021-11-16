<?php
//use this function in the user class to see if the user is logged in
if (!User::isLoggedin()){
	header("Location: ./login");
}
if (User::getUsername($userid)){
	//redirect mans if hes got a username already
	header("Location: ./home");	
}
include('components/changeusername/changeusername.php');
?>