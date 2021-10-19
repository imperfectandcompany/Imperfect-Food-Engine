 <?php
if(isset($_POST['settings'])){

//checks if all fields are filled in
try {

if(isset($_POST['oldpassword']) && $_POST['oldpassword']){	
if(!isset($_POST['newpassword']) || !$_POST['newpassword']){ throw new Exception('Error: You did not provide a new password!'); }	
if(!isset($_POST['newpasswordrepeat']) || !$_POST['newpasswordrepeat']){ throw new Exception('Error: You did not confirm your new password!'); }	
//set variables
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$newpasswordrepeat = $_POST['newpasswordrepeat'];


//checks if old pass fits the database for the user
if (password_verify($oldpassword, DatabaseConnector::query('SELECT password FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['password'])){
//checks if new password and the repeated passwords match
if ($newpassword == $newpasswordrepeat){
	
if(strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {
DatabaseConnector::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));
	$success = "password";
}

} else {
	throw new Exception('New passwords don\'t match!');
}

} else {
		throw new Exception('Incorrect old password');
}

}

	}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }	

}
?>