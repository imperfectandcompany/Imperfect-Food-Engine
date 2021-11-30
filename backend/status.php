<?php

$orders = order::fetchMenu();	

$customizePizza = false;
$cartOrders = order::getUserPlaced(User::isLoggedIn());	
$isDelivery = order::deliveryActive();

if($_SERVER['REQUEST_METHOD'] == "POST"){
	if(isset($_POST["cancelorder"])){

	order::CancelOrder();

	$urlPage = "https://postogon.com/school/public_html/";
		header("refresh: 0; url=".$urlPage."");
	}
	

}



?>