<!-- BEGIN ELEMENTS -->
<main class="bg-white max-w-md mx-auto p-8 md:p-12 md:my-10 rounded lg:shadow-2xl md:shadow-lg sm:shadow-sm">
        <section>
		<div class="pb-8">
            <h3 class="font-bold text-2xl text-center"><?php if($success == 0): ?><?php if(!$isTokenValid): ?>Redeem Your Token<?php endif; ?><?php if($isTokenValid): ?>Change Your Password<?php endif; ?><?php endif; ?><?php if($success == 1): ?>We're back baby.<?php endif; ?></h3>
<?php
/*Call our notification handling*/ include("../frontend/sitenotif.php");
?>

<?php if($tokenwarning == 1): ?>
			<div class="pt-8">	
           <div class="bg-yellow-200 border-l-4 border-yellow-300 text-yellow-800 p-4">
  <p class="font-bold">Bruh...</p>
  <p>You must fill in this field with a token found in your email upon reset.</p>
</div>
</div>
<?php endif; ?>

<?php if($success == 1): ?>
			<div class="pt-8">	
           <div class="bg-green-200 border-l-4 border-green-300 text-green-800 p-4">
  <p class="font-bold">Success!</p>
  <p>Successfully reset password.</p>
</div>
                <br>
                <hr>
			<section>
                <div class="flex flex-col max-w-lg mx-auto text-center mt-12">
				<p class="text-red-600 mb-6 font-bold">Need some help?<a href="./contact" class="font-normal text-red-500 pl-2 hover:text-red-700 hover:underline underline-none ml-1">Contact Us</a></p>
                <a href="./login" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 focus:outline-none rounded shadow-md hover:shadow-xl transition duration-200">Go back</a>
                </div>
			</section>
</div>				
<?php endif; ?>
        </section>
		<?php if($success == 0): ?>		
        <section>
		<?php if(!$isTokenValid): ?>		
            <form class="flex flex-col" method="GET">
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-400 text-small font-bold mb-2 ml-3" for="token">Token</label>
                    <input type="text" id="token" name="token" aria-describedby="accountToken"  value="<?php echo htmlspecialchars($_GET['token'], ENT_QUOTES); ?>"
                           class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3" />
                </div>      
                <button type="submit" class="border border-red-600 bg-white hover:bg-gray-100 hover:border-red-300 hover:text-red-400 text-red-500 font-bold py-2 focus:outline-none rounded shadow-sm hover:shadow-md transition duration-200">Redeem Token</button>
            </form>
			<br>
			<hr>			
			<section>
                <div class="flex flex-col max-w-lg mx-auto text-center mt-12">
				<p class="text-red-600 mb-6 font-bold">Need some help?<a href="./contact" class="font-normal text-red-500 pl-2 hover:text-red-700 hover:underline underline-none ml-1">Contact Us</a></p>
                <a href="./login" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 focus:outline-none rounded shadow-md hover:shadow-xl transition duration-200">Go back</a>
                </div>
			</section>			
		<?php endif; ?>
		<?php if($isTokenValid): ?>
            <form class="flex flex-col" method="POST">		
		<div class="mb-6 pt-3 rounded bg-gray-200">
  <div class="relative w-full">
	<label class="block text-gray-400 focus:text-gray-500 text-small font-bold mb-2 ml-3" for="newpassword">New Password</label>
  <div class="absolute inset-y-0 right-0 flex items-center px-2">
      <input class="hidden js-password-toggle" id="toggle" type="checkbox" />
      <label class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-password-label" for="toggle">Show</label>
	</div>
		<input type="password" id="newpassword" autocomplete="off" name="newpassword" value="<?php echo htmlspecialchars($_POST['newpassword'], ENT_QUOTES); ?>" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 js-password px-3 pb-3"/>	
  </div>
		</div>
		<div class="mb-6 pt-3 rounded bg-gray-200">
	<label class="block text-gray-400 focus:text-gray-500 text-small font-bold mb-2 ml-3" for="newpasswordrepeat">Confirm Password</label>
		<input type="password" id="newpasswordrepeat" autocomplete="off" name="newpasswordrepeat" value="<?php echo htmlspecialchars($_POST['newpasswordrepeat'], ENT_QUOTES); ?>" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3"/>	
		</div>	
                <button type="submit" value="Change Password" name="changepassword"class="border border-red-600 bg-white hover:bg-gray-100 hover:border-red-300 hover:text-red-400 text-red-500 font-bold py-2 focus:outline-none rounded shadow-sm hover:shadow-md transition duration-200">Change Password</button>
</form>
			<br>
			<hr>			
			<section>
                <div class="flex flex-col max-w-lg mx-auto text-center mt-12">
				<p class="text-red-600 mb-6 font-bold">Need some help?<a href="./contact" class="font-normal text-red-500 pl-2 hover:text-red-700 hover:underline underline-none ml-1">Contact Us</a></p>
                <a href="./login" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 focus:outline-none rounded shadow-md hover:shadow-xl transition duration-200">Go back</a>
			</section>	
                </div>
			<?php endif; ?>		
        </section>
			<?php endif; ?>	
    </main>