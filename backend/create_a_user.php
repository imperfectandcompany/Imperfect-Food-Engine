<?php
//use this function in the user class to see if the user is logged in
if (!User::isLoggedin()){
	header("Location: https://postogon.com/lit/public_html/login");
}
if (User::getUsername($userid)){
	//redirect mans if hes got a username already
	header("Location: https://postogon.com/lit/public_html/home");	
}
include('components/changeusername/changeusername.php');
?>