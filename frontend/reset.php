<main class="bg-white max-w-md mx-auto p-8 md:p-12 md:my-10 rounded lg:shadow-2xl md:shadow-lg sm:shadow-sm">
        <section>
		<div class="pb-8">
            <h3 class="font-bold text-2xl text-center">Reset your password</h3>
<?php
/*Call our notification handling*/ include("../frontend/sitenotif.php");
?>
<?php if(isset($success)): ?>
			<div class="pt-8">	
           <div class="bg-green-200 border-l-4 border-green-300 text-green-800 p-4">
  <p class="font-bold">Email sent!</p>
  <p>Please follow the instructions to finish recovery.</p>
  <a href="./redeem"><p>DEMO REDEEM PAGE HERE.</p></a>
  <p class="break-words"> <?php echo $token; ?></p>
</div>
</div>
<?php endif; ?>
</div>
        </section>
        <section>
            <form class="flex flex-col" name="resetpassword" method="POST">
                <div class="mb-6 pt-3 rounded">
                    <label class="block text-gray-400 text-small font-bold mb-2 ml-3" for="signup_email">Email</label>
                    <input type="email" name="email" aria-describedby="emailReset"  value="<?php echo htmlspecialchars($_POST['signup_email'], ENT_QUOTES); ?>"
                           class="w-full text-gray-700 focus:outline-none border-b-4 border-gray-200 focus:border-red-600 transition duration-500 px-3 pb-3" />
                </div>
                <input type="hidden" name="form_type" value="new_user"/>	
				<div class="g-recaptcha mb-6 mx-auto " data-sitekey="" 
                        data-callback='onSubmit' 
                        data-action='submit'></div>	        
                <button type="submit" name="resetpassword" value="Reset Password" class="border ">Send Email</button>
            </form>
        </section>			
                <br>
                <hr>
			<section>
                <div class="flex flex-col max-w-lg mx-auto text-center mt-12">
                    <p class="text-red-600 mb-6 font-bold">Need some help?<a href="./contact" class="font-normal text-red-500 pl-2 hover:text-red-700 hover:underline underline-none ml-1">Contact Us</a></p>
                <a href="./login" class="text-red-500 font-bold py-2 focus:outline-none rounded shadow-md hover:shadow-xl transition duration-200">Go back</a>
                </div>
			</section>
    </main>	