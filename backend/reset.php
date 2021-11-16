<?php

if (User::isLoggedin()){
	header("Location: ./home");
}


//check if user hit the reset button
if(isset($_POST['resetpassword'])){
		
try{ 
	if(!isset($_POST['email']) || !$_POST['email']){ throw new Exception('Error: You did not provide an email!'); }	
	//set variables
	$email = $_POST['email'];
	
	//php built in validator for email, if valid then insert
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	//Before we continue, does this email exist?
	if (DatabaseConnector::query('SELECT email from users where email=:email', array(':email'=>$email))) { 
	//generate a random token
		$cstrong = True;
		$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
		$email = $_POST['email'];
		//set value to user_id
		$user_id = DatabaseConnector::query('SELECT id FROM users where email=:email', array(':email'=>$email))[0]['id'];
		//query the database and insert into the tokens table
		DatabaseConnector::query('INSERT INTO password_tokens (token, user_id) VALUES (:token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
	    $success = 1;		
	} else {
		throw new Exception('Error: Email does not exist!');		
	}	
	} else {
		throw new Exception('Error: Email is invalid!'); 	
	}
	}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }	
}

?>