<?php
//use this function in the user class to see if the user is logged in
if (!User::isLoggedin()){
	header("Location: https://postogon.com/lit/public_html/login");
}
$userid = User::isLoggedIn();
include('components/changeusername/changeusername.php');
include('components/changepassword/changepassword.php');
include('components/addsteam/addsteam.php');
include('components/addavatar/addavatar.php');	
include('components/logout/logout.php');
?>