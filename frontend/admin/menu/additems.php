             <!-- categories -->
          <div class="mt-5 flex flex-row px-5">
            <a href="./admin?menu=view"
              class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4"
            >
              View items
            </a>
            <a href="./admin?menu=additems" class="px-5 py-1 bg-green-500 rounded-2xl text-white text-sm mr-4">
              Add items
            </a>
            <a href="./admin?menu=removeitems" class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4">
              Remove Items
            </a>
          </div>
          <!-- end categories -->
  <ul class="flex flex-col p-4">

<div class="leading-loose">
  <form class="w-full flex flex-col p-10 border rounded" method="post">
	<input name="admin" type="hidden"> </input>
    <p class="text-gray-800 font-medium">Admin: Add items</p>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="item_name">Menu Item</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="item_name" name="name" type="text" required="" placeholder="Pizza" aria-label="Food Name">
    </div>
    <div class="mt-2">
      <label class=" text-sm block text-gray-600" for="item_desc">Description</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="item_desc" name="description" type="text" required="" placeholder="A fine taste of italy" aria-label="Email">
    </div>
	<div>
    <div class="inline-block mt-2 w-1/2 pr-1">
      <label class=" block text-sm text-gray-600" for="item_pic">Picture</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="item_pic" name="picture" type="text" required="" placeholder="🍕" aria-label="Picture">
    </div>
    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
      <label class=" block text-sm text-gray-600" for="item_price">Price</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="item_price"  name="price" type="text" required="" placeholder="Price" aria-label="Email">
    </div>
	</div>
    <div class="mt-4 flex">
      <button class="px-4 py-1 flex items-end justify-end justify-items-center ml-auto text-white font-light tracking-wider bg-green-500 rounded" type="submit">Add item</button>
    </div>
  </form>
</div>

    </ul>