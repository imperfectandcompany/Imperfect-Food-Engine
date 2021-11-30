<?php

class User {
/**
 * Function to test if user is logged in or not
 * Returns a boolean value of true or false depending on if a user is logged in or not
 */
public static function isLoggedIn()
{
	//looks for cookie that is stored
	if(isset($_COOKIE['FOODENGINEID'])) {
		//db check to see if the token is valid
		if (DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['FOODENGINEID'])))) {
			//grab and return user id
			$userid = DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['FOODENGINEID'])))[0]['user_id'];

			if (isset($_COOKIE['FOODENGINEID_'])) {
			return $userid;
			} else {				
				$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;			
				$cstrong = True;
				$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
				DatabaseConnector::query('INSERT INTO login_tokens (token, user_id) VALUES (:token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
				DatabaseConnector::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['FOODENGINEID'])));
				setcookie("FOODENGINEID", $token, time() + 60 * 60 * 24 * 7, '/', $domain, false);
				// create a second cookie to force the first cookie to expire without logging the user out, this way the user won't even know they've been given a new login toke
				setcookie("FOODENGINEID_", '1', time() + 60 * 60 * 24 * 3, '/', $domain, false);	
				//get loggedin user id
				return $userid;
			}

		} 
	} 
	return false;	
}

public static function isAdmin($id)
{
	//check to see if the user is an admin
	if(DatabaseConnector::query('SELECT admin FROM users WHERE id=:id', array(':id'=>$id))[0]['admin'] == 1){
	return true;
	}
	else{
		return false;
}
}

public static function getUsername($id)
{
	//check to see if the username is set then using the given $id. else return false.
	if(DatabaseConnector::query('SELECT username FROM users WHERE id=:id', array(':id'=>$id))[0]['username']){
	//return username
	return DatabaseConnector::query('SELECT username FROM users WHERE id=:id', array(':id'=>$id))[0]['username'];
	}
	else {
	return false;
	}
}

public static function getUserId($username)
{
	//grabs the userid of the given username $id. else return false.
	if(DatabaseConnector::query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id']){
	//return username
	return DatabaseConnector::query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];
	}
	else {
	return false;
	}
}

public static function getUserEmployee($username)
{
	//check to see if the user an employee
	if(DatabaseConnector::query('SELECT staff FROM users WHERE username=:username', array(':username'=>$username))[0]['staff']){
	//return username
	return true;
	}
	else {
	return false;
	}
}

public static function getUserEmail($username)
{
	//grabs the userid of the given username $id. else return false.
	if(DatabaseConnector::query('SELECT email FROM users WHERE username=:username', array(':username'=>$username))[0]['email']){
	//return username
	return DatabaseConnector::query('SELECT email FROM users WHERE username=:username', array(':username'=>$username))[0]['email'];
	}
	else {
	return false;
	}
}

public static function getUserDate($username)
{
	//grabs the createdAt of the given username $id. else return false.
	if(DatabaseConnector::query('SELECT createdAt FROM users WHERE username=:username', array(':username'=>$username))[0]['createdAt']){
	//return createdAt
	return DatabaseConnector::query('SELECT createdAt FROM users WHERE username=:username', array(':username'=>$username))[0]['createdAt'];
	}	
	else {
	return false;
	}
}

public static function getUserLastSeen($username)
{
	//grabs the createdAt of the given username $id. else return false.
	if(DatabaseConnector::query('SELECT updatedAt FROM users WHERE username=:username', array(':username'=>$username))[0]['updatedAt']){
	//return createdAt
	return DatabaseConnector::query('SELECT updatedAt FROM users WHERE username=:username', array(':username'=>$username))[0]['updatedAt'];
	}	
	else {
	return false;
	}
}

public static function addUserAddress($address)
{
	$userid = self::isLoggedIn();
	DatabaseConnector::query('UPDATE users SET address=:address WHERE id=:userid', array(':userid'=>$userid,':address'=>$address));		

}

public static function getAddress(){
	$user_id = User::isLoggedIn();
	if(DatabaseConnector::query('SELECT address FROM users WHERE id=:userid', array(':userid'=>$user_id))){
		return DatabaseConnector::query('SELECT address FROM users WHERE id=:userid', array(':userid'=>$user_id))[0]['address'];
	} else {
		return false;
		}
}

public static function getUserStatus($username)
{
	//grabs the createdAt of the given username $id. else return false.
	if(DatabaseConnector::query('SELECT status FROM users WHERE username=:username', array(':username'=>$username))[0]['status']){
	//return createdAt
	return DatabaseConnector::query('SELECT status FROM users WHERE username=:username', array(':username'=>$username))[0]['status'];
	}	
	else {
	return false;
	}
}

}


