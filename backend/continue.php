<?php

$orders = order::fetchMenu();	

$cartOrders = order::getUserCart(User::isLoggedIn());	

if($_SERVER['REQUEST_METHOD'] == "POST"){
	if(isset($_POST["id"]) && isset($_POST["insert"])){
	$item = $_POST["id"];
	order::addItem($item);		
	}
	elseif(isset($_POST["id"]) && isset($_POST["delete"])){
	$item = $_POST["id"];
	order::removeItem($item);		
	}
	elseif(isset($_POST["admin"])){
	order::addMenuItem($_POST["name"], $_POST["price"], $_POST["description"], $_POST["emoji"]);
	}
	elseif(isset($_POST["adminremove"])){
	order::removeMenuItem($_POST["id"]);
	}		
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
	try {
		if(!isset($_GET['type'])){ throw new Exception('Error: Please go back to home and select a order type!'); }
//check if $_GET['type'] is a valid option
	if($_GET['type'] == "delivery" || $_GET['type'] == "takeout" || $_GET['type'] == "dine-in"){


	} else {
		throw new Exception('Error: That is not a valid option!');
	}
}	catch (Exception $e) {
	$GLOBALS['errors'][] = $e->getMessage();
}	
}


?>