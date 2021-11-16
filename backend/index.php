<?php
if (User::isLoggedin()){
	header("Location: ./home");
}
?> 