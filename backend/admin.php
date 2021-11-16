<?php
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
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
	if(isset($_GET['viewitems']) || isset($_GET['additems']) || isset($_GET['removeitems'])){
	} else {
		header("location:./admin?viewitems=true");
	}
}


?>