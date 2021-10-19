<?php

class User {
/**
 * Function to test if user is logged in or not
 * Returns a boolean value of true or false depending on if a user is logged in or not
 */
public static function isLoggedIn()
{
	//looks for cookie that is stored
	if(isset($_COOKIE['SCHOOLPROJID'])) {
		//db check to see if the token is valid
		if (DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SCHOOLPROJID'])))) {
			//grab and return user id
			$userid = DatabaseConnector::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SCHOOLPROJID'])))[0]['user_id'];

			if (isset($_COOKIE['SCHOOLPROJID_'])) {
			return $userid;
			} else {
				$cstrong = True;
				$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
				DatabaseConnector::query('INSERT INTO login_tokens (token, user_id) VALUES (:token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
				DatabaseConnector::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SCHOOLPROJID'])));
				
				setcookie("SCHOOLPROJID", $token, time() + 60 * 60 * 24 * 7, '/', 'postogon.com', TRUE, TRUE);
				// create a second cookie to force the first cookie to expire without logging the user out, this way the user won't even know they've been given a new login toke
				setcookie("SCHOOLPROJID_", '1', time() + 60 * 60 * 24 * 3, '/', 'postogon.com', TRUE, TRUE);	
				//get loggedin user id
				return $userid;
			}

		} 
	} 
	return false;	
}

public static function isAdmin($id)
{
	//check to see if the username is set then using the given $id. else return false.
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

public static function getUserVerified($username)
{
	//check to see if the username is set then using the given $id. else return false.
	if(DatabaseConnector::query('SELECT verified FROM users WHERE username=:username', array(':username'=>$username))[0]['verified']){
	//return username
	return DatabaseConnector::query('SELECT verified FROM users WHERE username=:username', array(':username'=>$username))[0]['verified'];
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

//function to see if a user is following another 
public static function isUserFollowing($user, $follower)
{
if(DatabaseConnector::query('SELECT ID FROM followers WHERE user_id=:userid AND follower_id=:followerid', array(':userid' => $user,
':followerid' => $follower))) {
	//return username
	return true;
	}
	else {
	return false;
	}
}

//function to see the amount of followers
public static function countUserFollowers($user)
{
if(DatabaseConnector::query('SELECT count(*) as total FROM followers WHERE user_id=:userid', array(':userid' => $user))) {
	//return the amount of followers the user has
	return DatabaseConnector::query('SELECT count(*) as total FROM followers WHERE user_id=:userid', array(':userid' => $user));
	}
}

//function to see the amount of followers
public static function countUserFollowing($user)
{
if(DatabaseConnector::query('SELECT count(*) as total FROM followers WHERE follower_id=:userid', array(':userid' => $user))) {
	//return the amount of people the user is following
	return DatabaseConnector::query('SELECT count(*) as total FROM followers WHERE follower_id=:userid', array(':userid' => $user));
	}
}

//function to see if a user is mutually following each-other
public static function isUserFollowingMutual($user1, $user2)
{
	//if user1 is following user2
if(self::isUserFollowing($user1, $user2)) {
	//if user2 is following user2
if(self::isUserFollowing($user2, $user1)) {
			//returned true if user is following each other
		return true;
		}	
	}
	else {
		//returned false if user is not following each other
	return false;
	}
}

//function to see if a user is mutually a contact
public static function isUserContactMutual($user1, $user2)
{
	//if user1 is following user2
if(self::isUserContact($user1, $user2)) {
	//if user2 is following user2
if(self::isUserContact($user2, $user1)) {
			//returned true if user is following each other
		return true;
		}	
	}
	else {
		//returned false if user is not contacts with each other
	return false;
	}
}


//function to see if a user is invited 
public static function isUserInvited($user, $inviter)
{
if(DatabaseConnector::query('SELECT ID FROM invites WHERE user_id=:userid AND inviter_id=:inviterid', array(':userid' => $user,
':inviterid' => $inviter))) {
	return true;
	}
	else {
	return false;
	}
}

//function to see if a user is a contact 
public static function isUserContact($user, $contact)
{
if(DatabaseConnector::query('SELECT ID FROM contacts WHERE user_id=:userid AND contact_id=:contactid', array(':userid' => $user,
':contactid' => $contact))) {
	return true;
	}
	else {
	return false;
	}
}





}


