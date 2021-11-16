<?php

$orders = order::fetchMenu();	

$customizePizza = false;
$cartOrders = order::getUserCart(User::isLoggedIn());	

if($_SERVER['REQUEST_METHOD'] == "POST"){
	if(isset($_POST["id"]) && isset($_POST["insert"]) && isset($_POST["customizepizza"])){
		echo "yeet";
	$item = $_POST["id"];
	order::addTopping($item);
		header("refresh: 0;");

	$customizePizza = true;	
	}
	elseif(isset($_POST["id"]) && isset($_POST["delete"]) && isset($_POST["customizepizza"])){
	$item = $_POST["id"];
	order::removeTopping($item);
		$customizePizza = true;	

	$urlPage = "https://postogon.com/school/public_html/order?type=".$_GET["type"]."&customize=true";
		header("refresh: 0; url=".$urlPage."");
	$customizePizza = true;	
	}	
	elseif(isset($_POST["id"]) && isset($_POST["insert"])){
	$item = $_POST["id"];
	order::addItem($item);		
	}
	elseif(isset($_POST["id"]) && isset($_POST["delete"])){
	$item = $_POST["id"];
	order::removeItem($item);		
	}
	elseif(isset($_POST["pizza"]) && isset($_POST["customize"])){
	$item = $_POST["pizza"];
	order::Customize();
	$toppings = order::fetchToppings();
	$customizePizza = true;
	}
	elseif(isset($_POST["pizza"]) && isset($_POST["remove"])){
	$item = $_POST["pizza"];
	order::removePizza();
	$customizePizza = false;
	}	
	elseif(isset($_POST["pizza"]) && isset($_POST["add"])){
	$item = $_POST["pizza"];
	order::Customize();
	$customizePizza = true;
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
	if($_GET['customize'] == true){
	$customizePizza = true;	
	}

	} else {
		throw new Exception('Error: That is not a valid option!');
	}
}	catch (Exception $e) {
	$GLOBALS['errors'][] = $e->getMessage();
}	
}


?>