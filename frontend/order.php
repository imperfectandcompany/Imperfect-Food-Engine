<?php 
session_start();

class item {
  public $item;
  public $price;
  public $description;
  public $emoji;
    
}
$pizza = new item;
$pizza->name = "Pizza";
$pizza->price = "2.50";
$pizza->description = "Thin slice of 'za";
$pizza->emoji = "🍕";

$water = new item;
$water->name = "Cup of water";
$water->price = "2.00";
$water->description = "200ml";
$water->emoji = "💧";

$items = array();
$items[] = $pizza;
$items[] = $water;
var_dump($items);
echo "############";

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
?>

<?php
   /*Call our notification handling*/ include("../frontend/sitenotif.php");
   ?>

<?php if(!isset($errorz)):?>

<style>
button, input[type="submit"], input[type="reset"] {
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}
</style>



<div class="container flex mx-auto w-full items-center justify-center">
   <ul class="flex flex-col bg-gray-300 p-4">
   <div class="mb-2">
<div class="text-gray-600">Order type:</div><div id="ordertype"></div> <script>
var ordertype = "<?php echo $_GET['type'];?>".charAt(0).toUpperCase() + "<?php echo $_GET['type'];?>".slice(1).toLowerCase();
document.getElementById("ordertype").innerHTML=ordertype</script></div>
<?php foreach($orders as $item): ?>
		 <form method="post" class="flex flex-grow">
		 <input name="id" type="hidden" value="<?php echo $item['id']; ?>"></input>
		 <input name="insert" type="hidden"></input>
		<button type="submit">
        <li class="border-gray-400 flex flex-row mb-2" >
          <div class="select-none cursor-pointer bg-gray-200 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4"><?php echo $item['emoji'];?></div>
            <div class="flex-1 pl-1 mr-16">
              <div class="font-medium"><?php echo $item['name'];?></div>
              <div class="text-gray-600 text-sm"><?php echo $item['description']; ?></div>
            </div>
			            <div class="text-green-600 font-bold text-xs">$</div>
            <div class="text-gray-600 text-xs font-semibold"><?php echo $item['price']; ?></div>
          </div>
        </li>
				</button>

</form>		
		  <?php endforeach; ?>
		<li>
		<button onclick="window.location.href='home/'" class="mt-2 block flex uppercase mx-auto shadow bg-indigo-800 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">Back Home</button>
		</li>
    </ul>
	   <ul class="flex flex-col bg-gray-600 p-4">
   <div class="mb-2">
<div class="text-gray-300">Cart:</div><div id="ordertype"></div> <script>
var ordertype = "<?php echo $_GET['type'];?>".charAt(0).toUpperCase() + "<?php echo $_GET['type'];?>".slice(1).toLowerCase();
document.getElementById("ordertype").innerHTML=ordertype</script></div>
<?php foreach($cartOrders as $item): ?>
		 <form method="post" class="flex flex-grow">
		 <input name="id" type="hidden" value="<?php echo $item['id']; ?>"></input>
		 <input name="delete" type="hidden" ></input>
		<button type="submit">
        <li class="border-gray-800 flex flex-row mb-2" >
          <div class="select-none cursor-pointer bg-gray-400 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex flex-col rounded-md w-10 h-10 bg-gray-600 justify-center items-center mr-4"><?php echo $item['emoji'];?></div>
            <div class="flex-1 pl-1 mr-16">
              <div class="font-medium"><?php echo $item['name'];?></div>
              <div class="text-gray-800 text-sm"><?php echo $item['description']; ?></div>
            </div>
			            <div class="text-green-600 font-bold text-xs">$</div>
            <div class="text-gray-600 text-xs font-semibold"><?php echo $item['price']; ?></div>
          </div>
        </li>
				</button>

</form>		
		  <?php endforeach; ?>
		  <div class="text-gray-300">Total: <?php echo array_sum(array_column($cartOrders,'price'));
 ?></div>
		<li>
		<button onclick="window.location.href='home/'" class="mt-2 block flex uppercase mx-auto shadow bg-indigo-800 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">Order</button>
		</li>
    </ul>
  </div>

<div class="flex">  

	
	  	   <ul class="flex flex-col p-4">

<div class="leading-loose">
  <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="post">
	<input name="admin" type="hidden"> </input>
    <p class="text-gray-800 font-medium">Admin: Add items</p>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="cus_email">Menu Item</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="name" type="text" required="" placeholder="Pizza" aria-label="Food Name">
    </div>
    <div class="mt-2">
      <label class="hidden text-sm block text-gray-600" for="cus_email">Description</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="description" type="text" required="" placeholder="A fine taste of italy" aria-label="Email">
    </div>
    <div class="inline-block mt-2 w-1/2 pr-1">
      <label class="hidden block text-sm text-gray-600" for="cus_email">Emoji</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="emoji" type="text" required="" placeholder="🍕" aria-label="Emoji">
    </div>
    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
      <label class="hidden block text-sm text-gray-600" for="cus_email">Price</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"  name="price" type="text" required="" placeholder="Price" aria-label="Email">
    </div>


    <div class="mt-4">
      <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Add</button>
    </div>
  </form>
</div>

    </ul>
	
	  	   <ul class="flex flex-col p-4">

<div class="leading-loose">
  <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="post">
	<input name="adminremove" type="hidden"> </input>
    <p class="text-gray-800 font-medium">Admin: Remove items</p>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="cus_email">Menu Item ID</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="id" type="text" required="" placeholder="0" aria-label="Food Name">
    </div>
    <div class="mt-4">
      <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Remove</button>
    </div>
  </form>
</div>

    </ul>
	</div>
  
<?php elseif(($errorz)): ?>
<div class="flex flex-col items-center space-x-2 mx-auto ">
<div class="flex font-medium text-lg space-x-2"><div class="text-red-500">Error:</div><div>You must select a order type</div></div>
<button onclick="window.location.href='home/'" class="block flex uppercase mx-auto shadow bg-indigo-800 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">Back Home</button>
</div>
<?php endif;?>