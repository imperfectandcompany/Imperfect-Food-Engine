<!-- navbar -->
<header>
  <nav class="shadow items-center  md:pl-48 p-3 bg-green-500 text-white">
    <div x-data="{ open: false }" class="flex-1 md:flex">
      <div class="flex items-center flex-1">
        <a href="./">
          <div class=" md:flex-1 mr-2 text-white select-none font-bold">Food Engine - Admin</div>
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
      <div x-bind:class="! open ? 'hidden' : 'block'" class="md:flex mt-1 md:mt-0 space-y-2 md:space-y-0 flex-row md:pr-48">
		<div>
        <a href="./home">
          <div class="text-center md:ml-2 md:text-left bg-green-400 transition hover:bg-green-700 hover:text-green-600 select-none cursor-pointer px-4 py-2 rounded text-white"> Back </div>
        </a>
		</div>
      </div>
    </div>
  </nav>
</header>
   <div class="lg:flex">
   
<main class="flex w-full h-screen">

 <aside class="w-80 h-screen bg-gray shadow-md w-fulll hidden sm:block">
  <div class="flex flex-col justify-between h-screen p-4 bg-green-800">
      <div class="text-sm">
        <a href="./admin"><div class="bg-green-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-green-700 hover:text-blue-300">Home</div></a>
        <a href="?menu"><div class="bg-green-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-green-700 hover:text-blue-300">Menu</div></a>
        <a href="?orders"><div class="bg-green-900 text-white p-2 rounded mt-2 cursor-pointer hover:bg-green-700 hover:text-blue-300">Orders</div></a>
      </div>

      <div class="flex p-3 text-white bg-green-500 rounded cursor-pointer text-center text-sm">
        <a href="./logout" class="rounded inline-flex items-center">
          <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fillRule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clipRule="evenodd" /></svg>
          <span class="font-semibold">Logout</span>
        </a>
      </div>
  </div>
</aside>
<section class="w-full p-4">
  <div class="w-full border-dashed border-4 p-4 text-md">
  <?php  include_once($currentView); ?>
  </div>
  </section>
</main>
   </div>



