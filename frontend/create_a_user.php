<main class="bg-white max-w-md mx-auto p-8 md:p-12 md:my-10 rounded lg:shadow-2xl md:shadow-lg sm:shadow-sm">
        <section>
		<div class="pb-8">
            <h3 class="font-bold text-2xl text-center"><?php if($success == 0): ?><?php if(!$success): ?>Create A Username<?php endif; ?><?php endif; ?><?php if($success === "username"): ?>What's up <?php echo $username; ?>.<?php endif; ?></h3>
<?php
/*Call our notification handling*/ include("../frontend/sitenotif.php");
?>

<?php if($userwarning == 0): ?>
			<div class="pt-8">	
           <div class="bg-yellow-200 border-l-4 border-yellow-300 text-yellow-800 p-4">
  <p class="font-bold">Welcome...</p>
  <p>Choose a username to continue.</p>
</div>
</div>
<?php endif; ?>

<?php if($success === "username"): ?>
			<div class="pt-8">	
           <div class="bg-green-200 border-l-4 border-green-300 text-green-800 p-4">
  <p class="font-bold">Success!</p>
  <p>You have logged in.</p>
  <p>Loading...<?php header('Refresh: 1; URL=https://postogon.com/schoolproj/public_html/home');?></p>
</div>
</div>				
<?php endif; ?>
        </section>
		<?php if($success == 0): ?>		
        <section>	
            <form class="flex flex-col" method="post">
                <div class="mb-6 pt-3 rounded">
                    <label class="block text-gray-400 text-small font-bold mb-2 ml-3" for="username">Username</label>
                    <input type="text" id="username" type="username" name="username" value="<?php echo htmlspecialchars($username, ENT_QUOTES); ?>""
                           class="w-full text-gray-700 focus:outline-none border-b-4 border-gray-200 focus:border-red-600 transition duration-500 px-3 pb-3" <?php if($success === "username"): ?>readonly<?php endif; ?>/>
                </div>      
                <button type="submit" name="changeusername" class="border border-red-600 bg-white hover:bg-gray-100 hover:border-red-300 hover:text-red-400 text-red-500 font-bold py-2 focus:outline-none rounded shadow-sm hover:shadow-md transition duration-200" <?php if($success === "username"): ?>disabled<?php endif; ?>>Continue</button>
            </form>
			<br>
			<hr>			
			<section>
                <div class="flex flex-col max-w-lg mx-auto text-center mt-12">
                    <p class="text-red-600 mb-6 font-bold">Need some help?<a href="./contact" class="font-normal text-red-500 pl-2 hover:text-red-700 hover:underline underline-none ml-1">Contact Us</a></p>
                <a href="./logout" class="text-red-500 font-bold py-2 focus:outline-none rounded shadow-md hover:shadow-xl transition duration-200">log Out</a>
                </div>
			</section>		
        </section>
			<?php endif; ?>	
    </main>
<?php password(); ?> 	  