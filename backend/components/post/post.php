<?php
$username = User::isLoggedIn();

if(isset($_POST['like'])) {
	if(User::isLoggedIn()){		
		$postid = $_POST['postid'];
		posts::likePost($postid);
		die();
		header("Refresh:");
	} else {
	header('location: /lit/public_html/login');
	}
}

	if(isset($_POST['unlike'])) {
	if(User::isLoggedIn()){			
		$postid = $_POST['postid'];
		posts::unlikePost($postid);
		die();	
		header("Refresh:");
	} else {
	header('location: /lit/public_html/login');
	}
}

	if(isset($_POST['comment'])) {
	if(User::isLoggedIn()){
		$postId = $_POST['postid'];
		$commentBody = $_POST['commentBody'];			
		comment::create($commentBody, $postId);
		die();	
		header("Refresh:");
	} else {
	header('location: /lit/public_html/login');
	}
}


?> 