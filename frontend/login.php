<main class="bg-white max-w-md mx-auto p-8 md:p-12 md:my-10 rounded lg:shadow-2xl md:shadow-lg sm:shadow-sm">
        <section>
		<div class="pb-8">
            <h3 class="font-bold text-2xl text-center">Log In</h3>
<?php
/*Call our notification handling*/ include("../frontend/sitenotif.php");
?>
<?php if(isset($success)): ?>
			<div class="pt-8">	
           <div class="bg-green-200 border-l-4 border-green-300 text-green-800 p-4">
  <p class="font-bold">Success!</p>
  <p>You have logged in.</p>
  <p>Loading...<?php header('Refresh: 0;');?></p>
</div>
</div>
<?php endif; ?>
</div>
        </section>
        <section>
            <form class="flex flex-col" method="POST">
                <div class="mb-6 pt-3 rounded">
                    <label class="block text-gray-400 text-small font-bold mb-2 ml-3" for="emailoruser">Email / Username</label>
                    <input type="text" id="emailoruser" name="login_emailoruser" value="" class="w-full text-gray-700 focus:outline-none border-b-4 border-gray-200 focus:border-red-600 transition duration-500 px-3 pb-3"/>
                </div>
				
				
                <div class="mb-6 pt-3 rounded ">
                    <label class="block text-gray-400 text-small font-bold mb-2 ml-3" for="password">Password</label>
                    <input type="text" id="password" name="login_password" value="" class="w-full text-gray-700 focus:outline-none border-b-4 border-gray-200 focus:border-red-600 transition duration-500 px-3 pb-3"/>
                </div>
				
				


                <div class="flex justify-end">
                    <a href="./reset" class="text-sm hover:underline underline-none mb-6">Forgot Password?</a>
                </div>
                <input type="hidden" name="form_type" value="user_login">                
                <button name="login" class="border" type="submit">Log In</button>
            </form>
        </section>			
                <br>
                <hr>
			<section>
                <div class="flex flex-col max-w-lg mx-auto text-center mt-12">

                <a href="./signup" class="text-red-500 font-bold py-2 focus:outline-none rounded shadow-md hover:shadow-xl transition duration-200">Create An Account</a>
                </div>
			</section>
    </main>