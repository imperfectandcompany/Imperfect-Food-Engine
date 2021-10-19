<?php
if (isset($_POST['post'])){
	$postbody = $_POST['postbody'];
	$to_whom = $_POST['privacy_setting'];

	//check if the postbody length is greater than 160 and also less than one
	if (strlen($postbody) > 180 || strlen($postbody) < 1){
		die('incorrect length!');
	}
	
	DatabaseConnector::query('INSERT INTO posts (body, user_id, to_whom, likes, posted_on) VALUES (:body, :userid, :towhom, 0,  UNIX_TIMESTAMP())', array(':body'=>$postbody, ':userid'=>$userid, ':towhom'=>$to_whom));

	//keep the get parameters
	header ('Location: '.$GLOBALS['url_loc'][1]. preserve_qs());
	die;
}

?>