<?php if(count($GLOBALS['errors']) > 0): ?>
<?php foreach($GLOBALS['errors'] as $error): ?>  

<div x-data="{ open: true }" x-bind:class="! open ? 'hidden' : 'block'" class="relative flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md py-5 pl-6 pr-8 sm:pr-6">
    <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
        <div class="">
        <svg
           viewBox="0 0 24 24"
           class="text-red-600 w-6 sm:w-5 h-6 sm:h-5"
           >
        <path
              fill="currentColor"
              d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z"
              ></path>
      </svg>
         </div>
        <div class="text-sm font-medium ml-3">Uh oh.</div>
    </div>
    <div class="text-sm tracking-wide text-gray-500 mt-4 sm:mt-0 sm:ml-4"><?php echo $error; ?> </div>
    <div class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
    <button  @click="open = !open">    
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
</button>    
</div>
</div>




        <?php endforeach; ?>
<?php endif; ?>

