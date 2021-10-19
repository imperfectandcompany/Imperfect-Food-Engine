<?php
if (!User::isLoggedin()){
	header("Location: https://postogon.com/lit/public_html/login");
}


include_once('components/post/createpost.php');



include_once('components/post/post.php');


?>