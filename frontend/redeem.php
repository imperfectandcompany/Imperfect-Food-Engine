<!-- navbar -->
<header>
  <nav class="shadow items-center  md:pl-48 p-3 bg-green-500 text-white">
    <div x-data="{ open: false }" class="flex-1 md:flex">
      <div class="flex items-center flex-1">
        <a href="./">
          <div class=" md:flex-1 mr-2 text-white select-none font-bold">Food Engine - Redeem</div>
        </a>
        <button @click="open = ! open" class="md:hidden ml-auto rounded px-4 py-2 focus:outline-none bg-green-400">
          <template x-if="!open">
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" /> </svg>
            </div>
          </template>
          <template x-if="open">
            <div>X</div>
          </template>
        </button>
      </div>
      <div x-bind:class="! open ? 'hidden' : 'block'" class="md:flex mt-1 md:mt-0 space-y-2 md:space-y-0 flex-row-reverse md:pr-48">
	  <div class="pt-4 md:pt-0">
        <a href="./login">
          <div class="text-center md:ml-2 md:text-left bg-green-400 transition hover:bg-green-700 hover:text-green-600 select-none cursor-pointer px-4 py-2 rounded text-white"> Log In </div>
        </a>
		</div>
		<div>
        <a href="./signup">
          <div href="signup" class="text-center md:text-left bg-white transition hover:bg-gray-700 hover:text-gray-600 select-none cursor-pointer px-4 py-2 rounded text-green-500"> Register </div>
        </a>
		</div>
      </div>
    </div>
  </nav>
</header>
<main class="bg-white max-w-md mx-auto p-8 md:p-12 md:my-10 rounded lg:shadow-lg md:shadow-md sm:shadow-sm">
        <section>
		<div class="pb-8">
            <h3 class="font-medium pb-4 text-2xl text-center"><?php if($success == 0): ?><?php if(!$isTokenValid): ?>Redeem Your Token<?php endif; ?><?php if($isTokenValid): ?>Change Your Password<?php endif; ?><?php endif; ?><?php if($success == 1): ?>We're back baby.<?php endif; ?></h3>
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
				<p class="text-green-600 mb-6 font-bold">Need some help?<a href="./contact" class="font-normal text-green-500 pl-2 hover:text-green-700 hover:underline underline-none ml-1">Contact Us</a></p>
                <a href="./login" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 focus:outline-none rounded shadow-md hover:shadow-xl transition duration-200">Go back</a>
                </div>
			</section>
</div>				
<?php endif; ?>
        </section>
		<?php if($success == 0): ?>		
        <section>
		<?php if(!$isTokenValid): ?>		
            <form class="flex flex-col" method="GET">
                <div class="mb-6 pt-3 rounded">
                    <label class="block text-gray-400 text-small font-bold mb-2 ml-3" for="token">Token</label>
                    <input type="text" id="token" name="token" aria-describedby="accountToken"  value="<?php echo htmlspecialchars($_GET['token'], ENT_QUOTES); ?>"
                           class="rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-green-600 transition duration-500 px-3 pb-3" />
                </div>      
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 focus:outline-none rounded shadow-md hover:shadow-xl transition duration-200
				">Redeem Token</button>
            </form>
			<br>
			<hr>			
			<section>
                <div class="flex flex-col max-w-lg mx-auto text-center mt-12">
                <a href="./reset" class="border border-green-600 bg-white hover:bg-gray-100 hover:border-green-300 hover:text-green-400 text-green-500 font-bold py-2 focus:outline-none rounded shadow-sm hover:shadow-md transition duration-200">Go back</a>
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
		<input type="password" id="newpassword" autocomplete="off" name="newpassword" value="<?php echo htmlspecialchars($_POST['newpassword'], ENT_QUOTES); ?>" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-green-600 transition duration-500 js-password px-3 pb-3"/>	
  </div>
		</div>
		<div class="mb-6 pt-3 rounded bg-gray-200">
	<label class="block text-gray-400 focus:text-gray-500 text-small font-bold mb-2 ml-3" for="newpasswordrepeat">Confirm Password</label>
		<input type="password" id="newpasswordrepeat" autocomplete="off" name="newpasswordrepeat" value="<?php echo htmlspecialchars($_POST['newpasswordrepeat'], ENT_QUOTES); ?>" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-green-600 transition duration-500 px-3 pb-3"/>	
		</div>	
                <button type="submit" value="Change Password" name="changepassword"class="border border-green-600 bg-white hover:bg-gray-100 hover:border-green-300 hover:text-green-400 text-green-500 font-bold py-2 focus:outline-none rounded shadow-sm hover:shadow-md transition duration-200">Change Password</button>
</form>
			<br>
			<hr>			
			<section>
                <div class="flex flex-col max-w-lg mx-auto text-center mt-12">
				<p class="text-green-600 mb-6 font-bold">Need some help?<a href="./contact" class="font-normal text-green-500 pl-2 hover:text-green-700 hover:underline underline-none ml-1">Contact Us</a></p>
                <a href="./login" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 focus:outline-none rounded shadow-md hover:shadow-xl transition duration-200">Go back</a>
			</section>	
                </div>
			<?php endif; ?>		
        </section>
			<?php endif; ?>	
    </main>
    <footer>
  <!-- Foooter -->
  <section class="bg-white">
    <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
      <nav class="flex border md:border-none flex-col text-center md:flex md:flex-row flex-wrap justify-center -mx-5 -my-2 ">
        <div class="px-5 py-2"> <a href="./" class="text-base leading-6 text-gray-500 hover:text-gray-900">
          Home
        </a> </div>
        <div class="md:hidden">
          <hr>
        </div>
        <div class="px-5 py-2"> <a href="login" class="text-base leading-6 text-gray-500 hover:text-gray-900">
        Login
        </a> </div>
        <div class="md:hidden">
          <hr>
        </div> 
        <div class="px-5 py-2"> <a href="signup" class="text-base leading-6 text-gray-500 hover:text-gray-900">
          Register
        </a> </div>
        <div class="md:hidden">
          <hr>
        </div>
        <div class="px-5 py-2"> <a href="reset" class="text-base leading-6 text-gray-500 hover:text-gray-900">
          Reset Password
        </a> </div>
        <div class="md:hidden">
          <hr>
        </div>
      </nav>
      <div class="flex justify-center mt-8 space-x-6">
        <a href="https://github.com/cheesea3" class="text-gray-400 hover:text-gray-500"> <span class="sr-only">GitHub</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
      <p class="mt-8 text-base leading-6 text-center text-gray-400"> © 2021 Food Engine, Inc. All rights reserved. </p>
    </div>
  </section>
</footer>


