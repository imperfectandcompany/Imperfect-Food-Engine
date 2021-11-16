<?php 
//use this function in the cookies class to see if the user is logged in
if (!User::isLoggedin()){
	header("Location: ./");
}

//confirms if logout was clicked
if (isset($_POST['confirm'])){
	
	//checks to see if they logged out of all devices
		if ($_POST['alldevices'] == 'alldevices' ) { 
			DatabaseConnector::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>User::isLoggedIn()));		

			
			//otherwise only log them out of specific device
		} else {
			if (isset($_COOKIE['FOODENGINEID'])){
			DatabaseConnector::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['FOODENGINEID'])));
			}
			$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;			
			//expire cookie
			//
			setcookie("FOODENGINEID", '1', time()-3600, '/', $domain, false);
			//expire cookie
			setcookie("FOODENGINEID_", '1', time()-3600, '/', $domain, false);
			header('Refresh: 0');
			}
		}
?>
