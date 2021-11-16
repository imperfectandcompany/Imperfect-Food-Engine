<?php
if (!User::isLoggedin()){
	header("Location: ./login");
}
$profile = User::getUsername($userid);
?>