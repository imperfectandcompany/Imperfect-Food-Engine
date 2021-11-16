<?php
class order {
	
public static function addItem($item){
	try{ 
	$user_id = User::isLoggedIn();
	if(!DatabaseConnector::query('SELECT user_id FROM order_cart WHERE item_id=:itemid AND user_id=:userid', array(':itemid'=>$item,':userid'=>$user_id))){
	DatabaseConnector::query('INSERT INTO order_cart (user_id, item_id) VALUES (:userid, :itemid)', array(':userid'=>$user_id, ':itemid'=>$item));
	header("refresh: 0;");
	}
            throw new Exception('Error: Item already in cart!');
	}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }	
}

public static function fetchToppings(){
return DatabaseConnector::query('SELECT * FROM pizza_toppings');
}

public static function addedItem($item){
	$user_id = User::isLoggedIn();
	if(DatabaseConnector::query('SELECT user_id FROM order_cart WHERE item_id=:itemid AND user_id=:userid', array(':itemid'=>$item,':userid'=>$user_id))){
		return true;
	} else {
		return false;
		}
}

public static function addedTopping($item){
	$user_id = User::isLoggedIn();
	if(DatabaseConnector::query('SELECT user_id FROM order_pizza WHERE topping_id=:topping_id AND user_id=:userid', array(':topping_id'=>$item,':userid'=>$user_id))){
		return true;
	} else {
		return false;
		}
}

public static function customizeActive(){
	$user_id = User::isLoggedIn();
	if(DatabaseConnector::query('SELECT user_id FROM order_pizza WHERE user_id=:userid', array(':userid'=>$user_id))){
		return true;
	} else {
		return false;
		}
}

public static function customize(){
	$user_id = User::isLoggedIn();
	if(self::customizeActive() == false){
	DatabaseConnector::query('INSERT INTO order_pizza (user_id) VALUES (:userid)', array(':userid'=>$user_id));
	}
}

public static function RemovePizza(){
	$user_id = User::isLoggedIn();
	if(self::customizeActive() == true){
	DatabaseConnector::query('DELETE FROM order_pizza WHERE user_id=:id', array(':id'=>$user_id));
	}
}

public static function addMenuItem($name, $price, $description, $picture){
	try{ 
	$user_id = User::isLoggedIn();
	if(!DatabaseConnector::query('SELECT name FROM menu_items WHERE name=:name', array(':name'=>$name))){
	DatabaseConnector::query('INSERT INTO menu_items (name, price, description, picture) VALUES (:name, :price, :description, :picture)', array(':name'=>$name, ':price'=>$price,':description'=>$description, ':picture'=>$picture));
    header("refresh: 0;");
	}
            throw new Exception('Error: Menu item name already exists!');
			    header("refresh: 0;");
	}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }	
}

public static function removeItem($item){
	try{ 
	$user_id = User::isLoggedIn();
	if(DatabaseConnector::query('SELECT user_id FROM order_cart WHERE item_id=:itemid AND user_id=:userid', array(':itemid'=>$item,':userid'=>$user_id))){
	DatabaseConnector::query('DELETE FROM order_cart WHERE item_id=:itemid AND user_id=:userid', array(':userid'=>$user_id, ':itemid'=>$item));
	header("refresh: 0;");
	}
            throw new Exception('Error: Item does not exist in the cart of the user!');
	}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }	
}

public static function removeTopping($item){
	try{ 
	$user_id = User::isLoggedIn();
	if(DatabaseConnector::query('SELECT user_id FROM order_pizza WHERE topping_id=:topping_id AND user_id=:userid', array(':topping_id'=>$item,':userid'=>$user_id))){
	DatabaseConnector::query('DELETE FROM order_pizza WHERE topping_id=:topping_id AND user_id=:userid', array(':userid'=>$user_id, ':topping_id'=>$item));
	}
            throw new Exception('Error: Item does not exist in the cart of the user!');
	}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }	
}

public static function addTopping($item){
	try{ 
	$user_id = User::isLoggedIn();
	if(!DatabaseConnector::query('SELECT user_id FROM order_pizza WHERE topping_id=:topping_id AND user_id=:userid', array(':topping_id'=>$item,':userid'=>$user_id))){
	DatabaseConnector::query('INSERT INTO order_pizza (user_id, topping_id) VALUES (:userid, :itemid)', array(':userid'=>$user_id, ':itemid'=>$item));
	}
            throw new Exception('Error: Item already in cart!');
	}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }	
}

public static function removeMenuItem($id){
	try{ 
	if(DatabaseConnector::query('SELECT id FROM menu_items WHERE id=:id', array(':id'=>$id))){
	DatabaseConnector::query('DELETE FROM menu_items WHERE id=:id', array(':id'=>$id));
	}
            throw new Exception('Error: Menu item does not exist!!');
	}	catch (Exception $e) {
                $GLOBALS['errors'][] = $e->getMessage();
            }	
}

	
public static function fetchOrders($user_id){	
return DatabaseConnector::query('SELECT * FROM order_cart WHERE user_id=:userid', array(':userid'=>$user_id));
}



//-- select the column body from the table posts and the username column from the table users FROM the tables users, posts, and followers
//update, also grabs the likes - post date - and activity status
// in the second line, the condition set ensures that the user_id column of the posts table is equal to the user_id column of the followers table
// the third line takes the column user_id of table posts and matches it with the user_id column from the followers table. this allows us to match the username to the owner of the post.
// the last condition ensures that the follower of the user_id pertains to the user logged in. When executed, this adds the two selected columns to an array. showing the posts of the people that the user is following
public static function getUserCart($user_id){
return DatabaseConnector::query('SELECT DISTINCT menu_items.id, menu_items.name, menu_items.price, menu_items.description, menu_items.picture FROM menu_items, order_cart, users
WHERE menu_items.id = order_cart.item_id
AND users.id = order_cart.user_id
AND order_cart.user_id = '.$user_id.'');}


public static function fetchMenu(){	
return DatabaseConnector::query('SELECT * FROM menu_items');
}
	
}


?>