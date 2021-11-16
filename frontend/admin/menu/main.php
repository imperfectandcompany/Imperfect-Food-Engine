             <!-- categories -->
          <div class="mt-5 flex flex-row px-5">
            <a href="./admin?menu=view"
              class="px-5 py-1 bg-green-500 rounded-2xl text-white text-sm mr-4"
            >
              View items
            </a>
            <a href="./admin?menu=additems" class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4">
              Add items
            </a>
            <a href="./admin?menu=removeitems" class="px-5 py-1 rounded-2xl text-sm font-semibold mr-4">
              Remove Items
            </a>
          </div>
          <!-- end categories -->
   <div class="grid grid-cols-3 gap-4 px-5 mt-5 overflow-y-auto h-3/4">
		  <?php $orders = order::fetchMenu();	?>
        <?php foreach($orders as $item): ?>  

            <div class="px-3 py-3 flex flex-col border border-gray-200 rounded-md h-36 justify-between">
              <div>
                <div class="font-bold text-gray-800"><?php echo $item['name'];?></div>
                <span class="font-light text-sm text-gray-400">Item ID: <?php echo $item['id'];?></span>
              </div>
              <div class="flex flex-row justify-between items-center">
                <span class="self-end font-bold text-lg text-yellow-500">$<?php echo $item['price']; ?></span>
                <img src="<?php echo $item['picture'];?>" class=" h-14 w-14 object-cover rounded-md" alt="">
              </div>
            </div>
          <?php endforeach; ?>     
          </div>