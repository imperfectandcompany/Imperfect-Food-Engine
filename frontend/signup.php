<main class="bg-white max-w-md mx-auto p-8 md:p-12 md:my-10 rounded lg:shadow-2xl md:shadow-lg sm:shadow-sm">
        <section>
		<div class="pb-8">
            <h3 class="font-bold text-2xl text-center">Sign up</h3>
<?php
/*Call our notification handling*/ include("../frontend/sitenotif.php");
?>
<?php if(isset($success)): ?>
			<div class="pt-8">	
           <div class="bg-green-200 border-l-4 border-green-300 text-green-800 p-4">
  <p class="font-bold">Success!</p>
  <p>Your account has been registered.</p>
</div>
</div>
<?php endif; ?>
</div>
        </section>
        <section>
            <form class="flex flex-col" method="POST">
                <div class="mb-6 pt-3 rounded">
                    <label class="block text-gray-400 text-small font-bold mb-2 ml-3" for="signup_email">Email                         <small id="emailHelp" class="text-xs text-gray-300">We'll never share your email with anyone else.</small>						   </label>
                    <input type="email" name="signup_email" aria-describedby="emailHelp"  value="<?php echo htmlspecialchars($_POST['signup_email'], ENT_QUOTES); ?>"
                           class="w-full text-gray-700 focus:outline-none border-b-4 border-gray-200 focus:border-red-600 transition duration-500 px-3 pb-3" />
                </div>

                <div class="mb-6 pt-3 rounded">

  <div class="relative w-full">
                      <label class="block text-gray-400 focus:text-gray-500 text-small font-bold mb-2 ml-3" for="password">Password</label>
	<input type="password" id="password" autocomplete="off" name="signup_password" class="w-full text-gray-700 focus:outline-none border-b-4 border-gray-200 focus:border-red-600 transition duration-500 px-3 pb-3"/>	
  </div>
                </div>
                <input type="hidden" name="form_type" value="new_user"/>	
       
                <button type="submit" name="createaccount" class="border">Sign Up</button>
            </form>
        </section>			
                <br>
                <hr>
			<section>
                <div class="flex flex-col max-w-lg mx-auto text-center mt-12">

                <a href="./login" class="text-red-500 font-bold py-2 focus:outline-none rounded shadow-md hover:shadow-xl transition duration-200">Sign in</a>
                </div>
			</section>
    </main>	