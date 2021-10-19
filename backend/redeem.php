<?php
if (User::isLoggedin()){
	header("Location: https://postogon.com/lit/public_html/home");
}

try {
	$isTokenValid = false;
	$tokenwarning = 0;
	$success = 0;
	if(isset($_GET['token'])){
	$token = $_GET['token'];	
	if(DatabaseConnector::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id']){
		$user_id = DatabaseConnector::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
				$isTokenValid = true;
	if(isset($_POST['changepassword'])){
if(!isset($_POST['newpassword']) || !$_POST['newpassword']){ throw new Exception('Error: You did not provide a new password!'); }	
if(!isset($_POST['newpasswordrepeat']) || !$_POST['newpasswordrepeat']){ throw new Exception('Error: You did not confirm your new password!'); }	
//set variables
$newpassword = $_POST['newpassword'];
$newpasswordrepeat = $_POST['newpasswordrepeat'];
//checks if new password and the repeated passwords match
if ($newpassword == $newpasswordrepeat){
	
if(strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {
DatabaseConnector::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$user_id));
	$success = "1";
}

} else {
	throw new Exception('Error: New passwords don\'t match!');
}

	}
	
		
	} else	{
	throw new Exception('Error: Token Invalid.');
	}
	}
else {
	$tokenwarning = 1;
}
}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }				
?>