   <div class="lg:flex">
			         <?php include('components/sidebar/sidebar.php') ?>	
	  
	  
	  
      <div id="content-wrapper" class="min-w-0 w-full flex-auto sm:px-6 xl:px-8 top-10 pb-16 lg:static lg:max-h-full lg:overflow-visible">

         <div class="">
            <section>


               <div class="bg-white ">
<?php
   /*Call our notification handling*/ include("../frontend/sitenotif.php");
   ?>
   
   
<div class="flex-1 ">

<div class="flex-1 flex flex-col">
<div class="mx-auto bg-no-repeat md:rounded-l-sm rounded-b-none md:rounded-t-3xl bg-cover bg-center relative w-full" style="background-image:url('https://images.unsplash.com/photo-1517639191054-4d31c81e0cc0?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1350&amp;q=80'); height: 25vh; max-height:460px;">

<div class="flex flex-shrink p-2 text-white text-xs sm:text-sm antialiased sm:subpixel-antialiased md:antialiased	md:text-base justify-center md:justify-end w-full backdrop border-t absolute bottom-0 select-none">
					<!-- join date-->
                        <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <path d="M15 12h5a2 2 0 0 1 0 4h-15l-3 -6h3l2 2h3l-2 -7h3z" transform="rotate(-15 12 12) translate(0 -1)"></path>
                                    <line x1="3" y1="21" x2="21" y2="21"></line>
                                </svg>
<!-- formatted version of timestamp, shares month and year of the users registration date --->
<p>Landed <?php  echo date('M Y', strtotime($reg_date));?></p>
</div>

<!-- divider -->
						<div class="flex mx-4 items-center">•</div>
<!-- activity status -->
<div class="flex items-center">
					<!-- color changes depending on users activity status (online, awy, offline, dnd) --->
			<span class="absolute animate-ping rounded-full h-2 w-2 bg-<?php if($status === "online"){echo "green";} elseif($status === "away"){echo "yellow";} elseif($status === "dnd"){echo "red";} else{echo "gray";}?>-500"></span>
			<span class="absolute rounded-full h-2 w-2 bg-<?php if($status === "online"){echo "green";} elseif($status === "away"){echo "yellow";} elseif($status === "dnd"){echo "red";} else{echo "gray";}?>-500"></span>
</div>
					<!-- zdaterelative from class.general.php allows us to convert unixtimestamp to relative timestamp --->
            <p class="ml-4">Last seen <?php echo zdateRelative($last_seen); ?></p>
			</div>
</div>


	<!-- sub menu -->
	<div class="mx-auto flex items-center bg-gray-100 w-full">

					<div class="flex justify-start w-1/2 text-sm">
						<ul class=" flex justify-between flex-1 md:flex-none items-center uppercase select-none items-baseline">
							<li class="mr-2">
								<a class="inline-block py-3 px-2 border-blue-600 border-b text-gray-800 no-underline font-medium leading-5 text-base cursor-default" href="post.html">Overview</a>
							</li>
							<li class="mr-2">
								<a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-2" href="#">About</a>
							</li>
							<li class="mr-2">
								<a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-2" href="#">Likes</a>
							</li>
					<!-- only show if profile belongs to user --->
					<?php if(User::isLoggedIn()): ?>
					<?php if($usersprofile): ?>								
							<li class="mr-2">
								<a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:underline py-2 px-2" href="#">Settings</a>
							</li>
					<?php endif; ?>
					<?php endif; ?>				  
						</ul>
					</div>


					<div class="flex w-1/2 justify-end mr-1">
					   <form action="../profile/<?php echo $profile;?>" method="post">
				  <!-- are they mutual followers, and not yet invited? -->
				  <?php if($isFollowing && $isMutual): ?>
                     <button type="submit" name="unfollow" value="Unfollow" class="text-blue-700 mr-1  font-bold focus:outline-none">
                     Unfollow
                     </button>
					 <?php endif; ?>					 

						</form>
					</div>
				</div>


<div class="">
			<div class="w-full">

				<!--Lead Card-->
		<!-- profile picture, profile name, username, follow button, full name, bio, link -->
         <div class="flex w-full p-6 bg-white">
               <!-- Avatar -->
			   <div class="flex w-5/6">
			   <div class="flex justify-start">
					<div class="flex">
					<div class="flex flex-row">
					  <div class="w-10 h-10 font-bold text-center transition text-white bg-gray-700 bg-center border-4 border-gray-500 rounded-full cursor-pointer select-none hover:bg-gray-400">
						 <div class="my-1">?</div>
					  </div>
					  </div>
				  </div>
               <!-- Profile Name -->
			   <div class="flex ml-3">
				<div class="flex flex-col">
                  <div class="flex flex-row items-baseline">
				  					<!-- show users profile name --->
                     <h1 class="text-xl font-bold flex"><?php echo $profile; ?></h1>
				  					<!-- show users username --->					 
                     <h2 class="ml-1 text-xs text-gray-400 transition hover:text-gray-500">@<?php echo $profile;?></h2>
					 <?php //if user is verified, list that the user is verified
					 if($verified):?> <div class="ml-1 text-xs p-1 text-gray-400 uppercase bg-gray-100 text-center"><span><?php echo 'verified'; ?></span></div><?php endif; ?>
                  </div>
				  <?php if($isFollowingMe && $isMutual && !$isTheirContact && $invitedMe): ?>
			                       <div class="mb-1 select-none">
				  					   <form action="../profile/<?php echo $profile;?>" method="post">									   
<div class="flex md:items-center flex-col md:flex-row">
 <div> 
                    <p class="text-gray-600 text-sm md:items-center">
                       wants to lock you in as a contact
                    </p>		
</div>						
					 <div class="flex md:ml-auto no-select md:items-center">
					<button type="submit" name="accept" value="Accept" class="text-green-500 font-semibold focus:outline-none"> Y </button>
					<div class="text-gray-400 font-semibold rounded-lg"> / </div>
					<button type="submit" name="decline" value="Decline" class="text-red-500 font-semibold focus:outline-none"> N </button>
					</div>	
					</div>		
				</form>
									   </div>
				  <?php endif; ?>					  
				  
                  <!-- Username -->
				  <div class="flex flex-col">
				  					<div class="flex text-xs">
					<div class="flex flex-row space-x-4">
					<div><span class="font-bold mr-1"><?php if($followers == 0){echo "0";} else{echo $followers;}?></span>Followers</div>
					<div><span class="font-bold mr-1"><?php if($following == 0){echo "0";} else{echo $following;}?></span>Following</div>
					</div>
				  </div>
				  				  					<!-- Let user know if they are following you. --->
				  <?php if(User::isLoggedIn()): ?>
				  <?php if(!$usersprofile): ?>				  
				  <?php if($isFollowingMe && !$isMutual): ?>
				                       <div class="mt-1 select-none"><span class="p-1 text-xs bg-gray-100 text-gray-800 font-semibold transition hover:text-gray-700">Follows you</span></div>
				  <?php endif; ?>
				  <?php if($isFollowingMe && $isMutual && !$isInvited && !$isTheirContact && !$isContact && !$invitedMe): ?>
				                       <div class="mt-1 select-none"><span class="p-1 text-xs bg-gray-100 text-gray-800 font-semibold transition hover:text-gray-700">Mutual followers</span></div>
				  <?php endif; ?>
				  <?php if($isFollowingMe && $isMutual && !$isInvited && $isTheirContact && !$isContact && !$invitedMe): ?>
				                       <div class="mt-1 select-none"><span class="p-1 text-xs bg-gray-100 text-gray-800 font-semibold transition hover:text-gray-700">Their contact</span></div>
				  <?php endif; ?>
				  <?php if($isFollowingMe && $isMutual && !$isInvited && $isTheirContact && $isContact && !$invitedMe): ?>
				                       <div class="mt-1 select-none"><span class="p-1 text-xs bg-gray-100 text-gray-800 font-semibold transition hover:text-gray-700">Mutual Contacts</span></div>
				  <?php endif; ?>				  
				  <?php if($isFollowingMe && $isMutual && !$isInvited && !$isTheirContact && $isContact): ?>
				                       <div class="mt-1 select-none"><span class="p-1 text-xs bg-gray-100 text-gray-800 font-semibold transition hover:text-gray-700">Your contact</span></div>
				  <?php endif; ?>				  
				  <?php if($isFollowingMe && $isMutual && $isInvited && !$isContact): ?>
				                       <div class="mt-1 select-none"><span class="p-1 text-xs bg-gray-100 text-gray-800 font-semibold transition hover:text-gray-700">Invited to contacts</span></div>
				  <?php endif; ?>				  
				  <?php endif; ?>
				  <?php endif; ?>
                  <div class="text-gray-600 text-sm antialiased break-words sm:subpixel-antialiased md:antialiased mt-3">
				  
                     <p class="text-xs text-gray-800 font-semibold transition hover:text-gray-700">Daiyaan Ijaz</p>
                     <p class="text-xs text-gray-500 transition hover:text-gray-600">Live life now, we can only learn from mistakes</p>
                     <a href="" class="text-xs text-blue-400 transition hover:text-blue-500">https://www.linkedin.com/in/daiyaanijaz/</a>
		
                  </div>
				  </div>
				  </div>
				</div>
				</div>
				</div>
               <!-- Follow -->
					<div class="flex w-1/6 justify-end ">
				<div class="flex flex-col items-baseline">					
					<div class="flex flex-row">
					<?php if(User::isLoggedIn()): ?>
					<?php if(!$usersprofile): ?>					
                  <form action="../profile/<?php echo $profile;?>" method="post">
				  <!-- is the user following them but not a mutual follower? -->
				  <?php if($isFollowing && !$isMutual): ?>
                     <button type="submit" name="unfollow" value="Unfollow" class="text-blue-700 font-bold focus:outline-none">
                     Unfollow
                     </button>
					 <?php endif; ?>
				  <!-- are they mutual followers, and not yet invited? -->
				  <?php if($isFollowing && $isMutual && !$isInvited && !$isContact): ?>
                     <button type="submit" name="invite" value="Invite" class="text-blue-700 font-bold focus:outline-none">
                     Lock
                     </button>
					 <?php endif; ?> 

				  <!-- are they already invited and not yet contacts? -->
				  <?php if($isFollowing && $isMutual && $isInvited && !$isContact): ?>
                     <button type="submit" name="uninvite" value="Uninvite" class="text-blue-700 font-bold focus:outline-none">
                     Unlock Invite
                     </button>
					 <?php endif; ?>

				  <!-- are they already invited and not yet contacts? -->
				  <?php if($isFollowing && $isMutual && !$isInvited && $isContact): ?>
                     <button type="submit" name="unlock" value="unlock" class="text-blue-700 font-bold focus:outline-none">
                     Unlock Contact
                     </button>
					 <?php endif; ?>
					 
					<!-- are they not following? -->
				  <?php if(!$isFollowing): ?>
                     <button type="submit" name="follow" value="Follow" class="text-blue-700 font-bold focus:outline-none">
                     Follow
                     </button>
					 <?php endif; ?>					 
                  </form>
				  <?php endif; ?>							  
				  <?php endif; ?>				  
				<?php if(!User::isLoggedIn()): ?>
                    <a href="../login" class="text-blue-700 font-bold focus:outline-none">Follow</a>			
				  <?php endif; ?>
				  </div>				  
				  </div>

					  
				  </div>	  
         </div>

<!-- menu -->	  
<div class="">
         <nav class="flex justify-center select-none border-b border-gray-100 mb-2">
                     <form method="get" class="<?php if($result == "overview"){ echo "px-3 py-1 text-base font-medium leading-5 border-b-2 border-blue-500 focus:outline-none cursor-default";} else { echo "px-3 py-2 text-base border-b-2 border-white hover:border hover:border-b hover:border-gray-100 font-normal leading-5 text-gray-500 focus:outline-none transition duration-150 ease-in-out"; }?>">
                        <button type="submit" name="tab" value="overview" class=" focus:outline-none">Overview</button>
                     </form>
                     <form method="get" class="<?php if($result == "feed1"){ echo "px-3 py-1 text-base font-medium leading-5 border-b-2 border-blue-500 focus:outline-none cursor-default";} else { echo "px-3 py-2 text-base border-b-2 border-white hover:border hover:border-b hover:border-gray-100 font-normal leading-5 text-gray-500 focus:outline-none transition duration-150 ease-in-out"; }?>">
                        <button type="submit" name="tab" value="feed1" class="focus:outline-none">Feed 1</button>
                     </form>
					 <!-- only show to contact -->
					 <?php if($isTheirContact || $usersprofile || $nopermission): ?>
                     <form method="get" class="<?php if($result == "feed2"){ echo "px-3 py-1 text-base font-medium leading-5 border-b-2 border-blue-500 focus:outline-none cursor-default";} else { echo "px-3 py-2 text-base border-b-2 border-white hover:border hover:border-b hover:border-gray-100 font-normal leading-5 text-gray-500 focus:outline-none transition duration-150 ease-in-out"; }?>">
                        <button type="submit" name="tab" value="feed2" class="focus:outline-none">Feed 2</button>
                     </form>
					<?php endif; ?>
         </nav>
      </div>
	  
		</div>


	</div>


	</div>

<?php include_once('components/post/post.php'); ?>	


</div>


	<!-- dev mode -->
			<?php if($GLOBALS['devmode'] === 1): ?>	
<?php if(User::isAdmin($userid)): ?>			
<div class="md:px-32 py-8 w-full">
  <div class="shadow overflow-hidden md:rounded border-b border-gray-200">
    <table class="min-w-full bg-white">
      <thead class="bg-gray-800 text-white">
        <tr>
          <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">id</th>
          <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Username</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">email</th>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">verified</td>
          <th class="text-left py-3 px-4 uppercase font-semibold text-sm">usersprofile</td>		  
        </tr>
      </thead>
    <tbody class="text-gray-700">
      <tr>
        <td class="w-1/3 text-left py-3 px-4"><?php echo $user_id; ?></td>
		<td class="w-1/3 text-left py-3 px-4"><?php echo $profile; ?></td>
		<td class="w-1/3 text-left py-3 px-4"><?php echo User::getUserEmail($profile); ?></td>			
		<td class="w-1/3 text-left py-3 px-4"><?php if($verified==true){echo"Yes";}else{echo"No";} ?></td>
		<td class="w-1/3 text-left py-3 px-4"><?php if($usersprofile==true){echo"Yes";}else{echo"No";} ?></td>			
      </tr>
    </tbody>
    </table>
  </div>
</div>
           <?php endif;?>
           <?php endif;?>

		 
			   </div>
            </section>
         </div>
      </div>
	  
	  
	  
   </div>
   









