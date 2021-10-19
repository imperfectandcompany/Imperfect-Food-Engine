<?php 
//use this function in the cookies class to see if the user is logged in
if (!User::isLoggedin()){
	header("Location: https://localhost/public_html/");
}

//confirms if logout was clicked
if (isset($_POST['confirm'])){
	
	//checks to see if they logged out of all devices
		if ($_POST['alldevices'] == 'alldevices' ) { 
			DatabaseConnector::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>User::isLoggedIn()));		
		
		
			
			//otherwise only log them out of specific device
		} else {
			if (isset($_COOKIE['SCHOOLPROJID'])){
			DatabaseConnector::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SCHOOLPROJID'])));
			}
			//expire cookie
			setcookie('SCHOOLPROJID', '1', time()-3600);
			//expire cookie
			setcookie('SCHOOLPROJID_', '1', time()-3600);			
			}
		}
?>
