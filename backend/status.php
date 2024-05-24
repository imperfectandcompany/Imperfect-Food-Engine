<?php

$orders = order::fetchMenu();	


//testmode enables sandbox
$testmode = true;
$paypalurl = $testmode ? 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr' : 'https://ipnpb.paypal.com/cgi-bin/webscr';


$customizePizza = false;
$cartOrders = order::getUserPlaced(User::isLoggedIn());	
$isDelivery = order::deliveryActive();

if($_SERVER['REQUEST_METHOD'] == "POST"){
	if(isset($_POST["cancelorder"])){

	order::CancelOrder();

	$urlPage = "https://yourhosthere.com/foodengine/public_html/";
		header("refresh: 0; url=".$urlPage."");
	}
	
		if(isset($_POST["placeorder"]) || isset($_POST["paypal"])){

    $data = array(
        'cmd'			=> '_cart',
        'upload'        => '1',
        'lc'			=> 'EN',
        'business' 		=> 'youremailhere@gmail.com',
        'cancel_return'	=> 'https://yourhosthere.com/foodengine/public_html/status?cancel=true',
        'notify_url'	=> 'https://yourhosthere.com/foodengine/public_html/status?ipn_listener=paypal',
        'currency_code'	=> 'USD',
        'return'        => 'https://yourhosthere.com/foodengine/public_html/status&success=true'
    );
	

    for ($i = 0; $i < count($cartOrders); $i++) {
        $data['item_number_' . ($i+1)] = $cartOrders[$i]['id'];
        $data['item_name_' . ($i+1)] = $cartOrders[$i]['name'];
        $data['amount_' . ($i+1)] = $cartOrders[$i]['price'];
    }
	header('location:' . $paypalurl . '?' . http_build_query($data));
    // End script
    exit;
	}
	

}

if($_SERVER['REQUEST_METHOD'] == "GET"){
	if (isset($_GET['ipn_listener']) && $_GET['ipn_listener'] == 'paypal') {
    // Get all input variables and convert them all to URL string variables
    $raw_data = file_get_contents('php://input');
    $raw_array = explode('&', $raw_data);
    $myData = array();
	
	}

	
	
	if(isset($_GET["cancel"])){
			order::CancelOrder();

	if($_GET["cancel"] == "true"){
			order::CancelOrder();

			$urlPage = "https://yourhosthere.com/school/public_html/";
		header("refresh: 0; url=".$urlPage."");
	} else {
	
			$urlPage = "https://yourhosthere.com/school/public_html/status";
		header("refresh: 0; url=".$urlPage."");
	}

	}



}




?>