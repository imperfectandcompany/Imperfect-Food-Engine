
<!-- navbar -->
<header>
  <nav class="shadow items-center  md:pl-48 p-3 bg-green-500 text-white">
    <div x-data="{ open: false }" class="flex-1 md:flex">
      <div class="flex items-center flex-1">
        <a href="./">
          <div class=" md:flex-1 mr-2 text-white select-none font-bold">Food Engine - Log Out</div>
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
        <a href="./logout">
          <div class="text-center md:ml-2 md:text-left bg-green-400 transition hover:bg-green-700 hover:text-green-600 select-none cursor-pointer px-4 py-2 rounded text-whitetext-center md:ml-2 md:text-left bg-green-400 transition hover:bg-green-700 hover:text-green-600 select-none cursor-pointer px-4 py-2 rounded text-white"> Log out </div>
        </a>
		</div>
		<div>
        <a href="./">
          <div class="text-center md:ml-2 md:text-left bg-green-400 transition hover:bg-green-700 hover:text-green-600 select-none cursor-pointer px-4 py-2 rounded text-white"> Home </div>
        </a>
		</div>
      </div>
    </div>
  </nav>
</header>
<main class="bg-white max-w-md mx-auto p-8 md:p-12 md:my-10 rounded lg:shadow-lg md:shadow-md sm:shadow-sm">
<div class="flex flex-col text-center">
<h1 class="font-bold ">Log out of your account?</h1>
<p>Are you sure you'd like to log out?</p>
<section>	
            <form class="flex flex-col" method="post">
            <div class="flex items-center space-x-2 py-4 mt-6 justify-end">
<input type="checkbox" class="bg-red-500" name="alldevices" value="alldevices"></input>
<span>Logout of all devices?</span>
</div>
                <button type="submit" name="confirm" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 focus:outline-none rounded shadow-md hover:shadow-xl transition duration-200">Log out</button>
            </form>
			<br>
			<hr>			
			<section>
                <div class="flex flex-col max-w-lg mx-auto text-center mt-12">

                <a href="./" class="border border-green-600 bg-white hover:bg-gray-100 hover:border-green-300 hover:text-green-400 text-green-500 font-bold py-2 focus:outline-none rounded shadow-sm hover:shadow-md transition duration-200">Go back</a>
                </div>
			</section>	

</div>
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
        <div class="px-5 py-2"> <a href="logout" class="text-base leading-6 text-gray-500 hover:text-gray-900">
          Log out
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


