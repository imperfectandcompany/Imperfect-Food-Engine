<?php
class admin {
	
public static function countUsers(){
	return DatabaseConnector::query('SELECT COUNT(*) FROM users')[0]['COUNT(*)'];
}

public static function countMenuItems(){
	return DatabaseConnector::query('SELECT COUNT(*) FROM menu_items')[0]['COUNT(*)'];
}

public static function countActiveCarts(){
	return DatabaseConnector::query('SELECT COUNT(DISTINCT user_id) FROM order_cart')[0]['COUNT(DISTINCT user_id)'];
}

public static function getPendingOrders(){
	return DatabaseConnector::query('SELECT * FROM order_cart');
}

public static function removeItem($item, $user_id){
	try{ 
	if(DatabaseConnector::query('SELECT user_id FROM order_cart WHERE item_id=:itemid AND user_id=:userid', array(':itemid'=>$item,':userid'=>$user_id))){
	DatabaseConnector::query('DELETE FROM order_cart WHERE item_id=:itemid AND user_id=:userid', array(':userid'=>$user_id, ':itemid'=>$item));
	header("refresh: 0;");
	}
            throw new Exception('Error: Item does not exist in the cart of the user!');
	}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }	
}


}
?>