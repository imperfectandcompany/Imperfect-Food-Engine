             <!-- categories -->
          <div class="mt-5 flex flex-row px-5">
            <a href="./admin?menu=view"
              class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4"
            >
              View items
            </a>
            <a href="./admin?menu=additems" class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4">
              Add items
            </a>
            <a href="./admin?menu=removeitems" class="px-5 py-1 bg-green-500 rounded-2xl text-white text-sm mr-4">
              Remove Items
            </a>
          </div>
          <!-- end categories -->
  <ul class="flex flex-col p-4">

   <div class="grid grid-cols-3 gap-4 px-5 mt-5 overflow-y-auto h-3/4">
		  <?php $orders = order::fetchMenu();	?>
        <?php foreach($orders as $item): ?>  

            <form class="px-3 py-3 flex flex-col border border-gray-200 rounded-md h-36 justify-between" method="post">
				<input name="adminremove" type="hidden"> </input>
			<input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" name="id" value="<?php echo $item['id'];?>" type="hidden"   aria-label="Food Name">
              <div>
                <div class="font-bold text-gray-800"><?php echo $item['name'];?></div>

              </div>
              <div class="flex flex-row-reverse items-align justify-between items-center">
                      <button class="px-4 py-1 text-white font-light tracking-wider bg-green-500 rounded" type="submit">Remove</button>
                <img src="<?php echo $item['picture'];?>" class=" h-14 w-14 object-cover rounded-md" alt="">
              </div>
            </form>
          <?php endforeach; ?>     
          </div>

    </ul>