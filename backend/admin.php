<?php

	$currentView = "../frontend/admin/home/main.php";

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
	order::addMenuItem($_POST["name"], $_POST["price"], $_POST["description"], $_POST["picture"]);
	}
	elseif(isset($_POST["adminremove"])){
	order::removeMenuItem($_POST["id"]);
	}
	elseif(isset($_POST["adminitemremove"])){
	admin::removeItem($_POST["id"], $_POST["user_id"]);
	}		
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
	if(isset($_GET['menu'])){
		if($_GET['menu']==="view"){
				$currentView = "../frontend/admin/menu/main.php";
		}
		else if($_GET['menu']==="additems"){
				$currentView = "../frontend/admin/menu/additems.php";
		}
		else if($_GET['menu']==="removeitems"){
				$currentView = "../frontend/admin/menu/removeitems.php";
		}		
		else {
		header("location:./admin?menu=view");
	}
	}
	else if(isset($_GET['orders'])){
		if($_GET['orders']==="view"){
			$orders=admin::getPendingOrders();
				$currentView = "../frontend/admin/orders/main.php";
				
		}	
		else {
		header("location:./admin?orders=view");
	}
	}
}



?>