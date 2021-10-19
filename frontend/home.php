<?php
   /*Call our notification handling*/ include("../frontend/sitenotif.php");
   ?>

   <div class="lg:flex">

<main class="w-full flex justify-center">
    <div class="flex flex-col md:w-2/5 p-3 space-y-5 rounded-xl border border-black bg-white shadow-md">
        <section class="text-3xl font-bold">
			YO <?php echo $profile ?>,<br> what are we thinking?
        </section>
        <section class="font-normal text-md text-gray-700">
	<div class="flex flex-wrap m-auto">
		<button onclick="window.location.href='order?type=delivery'" class="rounded px-3 py-2 m-1 border-b-4 border-l-2 shadow-lg bg-blue-700 border-blue-800 text-white">
        Delivery
    </button>
		<button onclick="window.location.href='order?type=takeout'" class="rounded px-3 py-2 m-1 border-b-4 border-l-2 shadow-lg bg-blue-700 border-blue-800 text-white">
        Take-out
    </button>
		<button onclick="window.location.href='order?type=dine-in'" class="rounded px-3 py-2 m-1 border-b-4 border-l-2 shadow-lg bg-blue-700 border-blue-800 text-white">
        Dine-in
    </button>	
	</div>
        </section>

    </div>
</main>
	 

	  
	  
	  
   </div>
   