<?php 
//confirms if logout was clicked
if (isset($_POST['confirm'])){
	
	//checks to see if they logged out of all devices
		if ($_POST['alldevices'] == 'alldevices' ) { 
			DatabaseConnector::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>User::isLoggedIn()));		
		
			//otherwise only log them out of specific device
		} else {
			if (isset($_COOKIE['POSTOGONID'])){
			DatabaseConnector::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['POSTOGONID'])));
			}
			//expire cookie
			setcookie('POSTOGONID', '1', time()-3600);
			//expire cookie
			setcookie('POSTOGONID_', '1', time()-3600);			
			}
		}
?>
