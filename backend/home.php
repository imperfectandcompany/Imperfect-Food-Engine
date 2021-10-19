<?php
if (!User::isLoggedin()){
	header("Location: https://postogon.com/schoolproj/public_html/login");
}
$profile = User::getUsername($userid);



?>