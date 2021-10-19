<?php
if (User::isLoggedin()){
	header("Location: https://postogon.com/schoolproj/public_html/home");
}

if (isset($_POST['login'])) {

try{
	
if(!isset($_POST['login_emailoruser']) || !$_POST['login_emailoruser']){ throw new Exception('Error: You did not provide an email or username!'); }
if(!isset($_POST['login_password']) || !$_POST['login_password']){ throw new Exception('Error: You did not provide a password!'); }

//set variables
$emailoruser = $_POST['login_emailoruser'];
$password = $_POST['login_password'];

//check if email exists
if (DatabaseConnector::query('SELECT email from users WHERE email=:email', array(':email'=>$emailoruser))){
	//match user input password with database password
	if(password_verify($password, DatabaseConnector::query('SELECT password from users WHERE email=:email', array(':email'=>$emailoruser))[0]['password'])){
		$success = 1;
		$cstrong = True;
		$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
		$user_id = DatabaseConnector::query('SELECT id from users WHERE email=:email', array(':email'=>$emailoruser))[0]['id'];
		DatabaseConnector::query('INSERT INTO login_tokens (token, user_id) VALUES (:token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
		//pass cookie name, token itself, expiry date = current time + amount valid for which we picked for one week, then location of the server the cookie is valid for.. / for everywhere, domain cookie is valid on... localhost, and ssl is true, and http only which means http only meaning js cant access which prevents XSS ATTACKS.
		setcookie("SCHOOLPROJID", $token, time() + 60 * 60 * 24 * 7, '/', 'postogon.com', TRUE, TRUE);
		setcookie("SCHOOLPROJID_", '1', time() + 60 * 60 * 24 * 3, '/', 'postogon.com', TRUE, TRUE);
	} else {
		throw new Exception('Error: Password is incorrect!');
	}

}	else {
	//try checking for username
if (DatabaseConnector::query('SELECT username from users WHERE username=:username', array(':username'=>$emailoruser))){
	//match user input password with database password
	if(password_verify($password, DatabaseConnector::query('SELECT password from users WHERE username=:username', array(':username'=>$emailoruser))[0]['password'])){
		$success = 1;
		$cstrong = True;
		$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
		$user_id = DatabaseConnector::query('SELECT id from users WHERE username=:username', array(':username'=>$emailoruser))[0]['id'];
		DatabaseConnector::query('INSERT INTO login_tokens (token, user_id) VALUES (:token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
		//pass cookie name, token itself, expiry date = current time + amount valid for which we picked for one week, then location of the server the cookie is valid for.. / for everywhere, domain cookie is valid on... postogon.com, and ssl is true, and http only which means http only meaning js cant access which prevents XSS ATTACKS.
		setcookie("SCHOOLPROJID", $token, time() + 60 * 60 * 24 * 7, '/', 'postogon.com', TRUE, TRUE);
		setcookie("SCHOOLPROJID_", '1', time() + 60 * 60 * 24 * 3, '/', 'postogon.com', TRUE, TRUE);
	} else {
		throw new Exception('Error: Password is incorrect!');
	}

} else {
			throw new Exception('Error: Email / Username does not exist!');
}
} 
	}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }	

}

?>