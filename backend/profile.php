<?
$profile = "";
$usersprofile = false;
$verified = false;
$isFollowing = User::isUserFollowing(User::getUserId($GLOBALS['url_loc'][2]), User::isLoggedIn());
$isFollowingMe = User::isUserFollowing(User::isLoggedIn(), User::getUserId($GLOBALS['url_loc'][2]));
$isMutual = User::isUserFollowingMutual(User::getUserId($GLOBALS['url_loc'][2]), User::isLoggedIn());
$followers = User::countUserFollowers(User::getUserId($GLOBALS['url_loc'][2]));
$following = User::countUserFollowing(User::getUserId($GLOBALS['url_loc'][2]));
$isInvited = User::isUserInvited(User::getUserId($GLOBALS['url_loc'][2]), User::isLoggedIn());
$isContact = User::isUserContact(User::getUserId($GLOBALS['url_loc'][2]), User::isLoggedIn());
$invitedMe = User::isUserInvited(User::isLoggedIn(), User::getUserId($GLOBALS['url_loc'][2]));
$isTheirContact = User::isUserContact(User::isLoggedIn(), User::getUserId($GLOBALS['url_loc'][2]));

try {
    //if profile wasnt given...
    if (!$GLOBALS['url_loc'][2]) {
        //Check to see if user is logged in, if so... load his profile otherwise ask user to provide a profile
        if (User::isLoggedIn()) {
            echo "user is logged in";
            $profile = User::getUsername($userid);
            header("location: ./profile/$profile");
        } else {
            throw new Exception('Error: Please provide a profile!');
        }
    }
    
    //if profile was specified
    if (isset($GLOBALS['url_loc'][2])) {
        //check to see if it was a numerical value, if so translate it to the users profile.
        if (is_numeric($GLOBALS['url_loc'][2])) {
            //throw error if the userid does not exist
            if (!User::getUsername($GLOBALS['url_loc'][2])) {
                throw new Exception('Error: User does not exist!');
            }
            
            $profile = User::getUsername($GLOBALS['url_loc'][2]);
            header("location: $profile");
        }
        
        
        //uses get method to grab information
        if (is_string($profile)) {
            if (User::getUserId($GLOBALS['url_loc'][2])) {
                $username = User::getUsername(User::isLoggedIn());
                $profile  = $GLOBALS['url_loc'][2];
            } else {
                throw new Exception('Error: User does not exist!');
            }

	
			
            
            //get the id of the user we are trying to follow
            $user_id= User::getUserId($GLOBALS['url_loc'][2]);
			//retrieve users post
				
			
			//get id of the user that is logged in
            $followerid = User::isLoggedIn();
            $inviterid = User::isLoggedIn();
            $contactid = User::isLoggedIn();
            $verified = User::getUserVerified($GLOBALS['url_loc'][2]);
            $reg_date = User::getUserDate($GLOBALS['url_loc'][2]);			
			$last_seen = User::getUserLastSeen($GLOBALS['url_loc'][2]);
			$status = User::getUserStatus($GLOBALS['url_loc'][2]);
			
			if ($user_id === $followerid) {
			$usersprofile = true;
			}
			
			//different tabs / views			
			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				if(isset($_REQUEST['tab'])){
				$result = htmlspecialchars($_REQUEST['tab']);				
				} else {
				$result = "overview";	
				}
			}

			if($result == "overview"){
				if($isTheirContact || $usersprofile){		
					$dbposts = posts::fetch_userBothPosts("DESC", $user_id);									
				} else {
					$dbposts = posts::fetch_userPublicPosts("DESC", $user_id);	
				}
			}

			if($result == "media"){

			}

			if($result == "feed1"){
					$dbposts = posts::fetch_userPublicPosts("DESC", $user_id);	
			}

			if($result == "feed2"){
				if($isTheirContact || $usersprofile){		
					$dbposts = posts::fetch_userPrivatePosts("DESC", $user_id);									
				} else {
					$noPermission = true;							
				}
			}			


            //check if follow button was hit
            if (isset($_POST['follow'])) {
              
                //check if user is trying to follow himself
                if ($usersprofile != true) {
                   
                    //check if the user is not following that user
                    if (!DatabaseConnector::query('SELECT follower_id FROM followers WHERE user_id=:userid AND follower_id=:followerid', array(
                        ':userid' => $user_id, ':followerid' => $followerid
                    ))) 
					{
				 
                        //insert query to follow the user
                        DatabaseConnector::query('INSERT INTO followers (user_id, follower_id) VALUES (:userid, :followerid)', array(
                            ':userid' => $user_id,
                            ':followerid' => $followerid
                        ));

						
						//checks to see if the person following is from the verified account, if so verify the user.. 
						if ($followerid == 18) {
						 DatabaseConnector::query('UPDATE users SET verified=1 WHERE id=:userid', array(':userid'=>$user_id));
						}
						//prevent resubmit form submission
					header('Location: '.$GLOBALS['url_loc'][2].'');						
                    } else {
					header('Location: '.$GLOBALS['url_loc'][2].'');							
					throw new Exception('Error: Already following!');
                    }
                    $isFollowing = User::isUserFollowing(User::getUserId($GLOBALS['url_loc'][2]), User::isLoggedIn());
                }
            }
            
            //check if invite button was hit
            if (isset($_POST['invite'])) {
                
                //check if user is trying to invite himself        
                if ($usersprofile != true) {
                    
                    //check if they are mutually following each-other
                    if ($isMutual) {
						//check to see if user is already invited
					    if (!$isInvited) {	
                        //insert query to invite the user
                        DatabaseConnector::query('INSERT INTO invites (user_id, inviter_id) VALUES (:userid, :inviterid)', array(
                            ':userid' => $user_id,
                            ':inviterid' => $inviterid
                        ));
					header('Location: '.$GLOBALS['url_loc'][2].'');							
					} else {
					header('Location: '.$GLOBALS['url_loc'][2].'');							
					throw new Exception('Error: User is already invited!');
					}
						//prevent resubmit form submission
					header('Location: '.$GLOBALS['url_loc'][2].'');						
                    } else {
					header('Location: '.$GLOBALS['url_loc'][2].'');							
					throw new Exception('Error: You must mutual followers!');
                    }
					$isInvited = User::isUserInvited(User::getUserId($GLOBALS['url_loc'][2]), User::isLoggedIn());
                }
            }

            //check if invite button was hit
            if (isset($_POST['accept'])) {
        
                //check if user is trying to accept himself        
                if ($usersprofile != true) {
                    //make sure you aren't already their contact
                    if (!$isTheirContact) {
						//check to see if user is invited
					    if ($invitedMe) {
			
						//remove the invite
                        DatabaseConnector::query('DELETE FROM invites WHERE user_id=:userid AND inviter_id=:inviterid', array(
                            ':userid' => $inviterid,
                            ':inviterid' => $user_id
                        ));		
							
                        //insert query to add contact
                        DatabaseConnector::query('INSERT INTO contacts (user_id, contact_id) VALUES (:userid, :contactid)', array(
                            ':userid' => $contactid,
                            ':contactid' => $user_id
                        ));
						
					header('Location: '.$GLOBALS['url_loc'][2].'');							
					} else {
					header('Location: '.$GLOBALS['url_loc'][2].'');							
					throw new Exception('Error: User did not invite you!');
					}
						//prevent resubmit form submission
					header('Location: '.$GLOBALS['url_loc'][2].'');						
                    } else {
					header('Location: '.$GLOBALS['url_loc'][2].'');							
					throw new Exception('Error: You are already their contact!');
                    }
					$isInvited = User::isUserInvited(User::getUserId($GLOBALS['url_loc'][2]), User::isLoggedIn());
                }
            }				
			
            //check if unfollow button was hit
            if (isset($_POST['unfollow'])) {
                
                //check if user is trying to unfollow himself        
                if ($usersprofile != true) {
                    
                    //check if the user is following that user
                    if (DatabaseConnector::query('SELECT follower_id FROM followers WHERE user_id=:userid AND follower_id=:followerid', array(
                        ':userid' => $user_id, ':followerid' => $followerid
                    ))) {
					
						
                        //insert query to unfollow the user
                        DatabaseConnector::query('DELETE FROM followers WHERE user_id=:userid AND follower_id=:followerid', array(
                            ':userid' => $user_id,
                            ':followerid' => $followerid
                        ));
						
						//if one of them unfollowers, remove them from all related invites and contacts
						
						//check to see if user is invited
					    if ($isInvited) {	
                        //insert query to uninvite the user
                        DatabaseConnector::query('DELETE FROM invites WHERE user_id=:userid AND  inviter_id=:inviterid', array(
                            ':userid' => $user_id,
                            ':inviterid' => $inviterid
                        ));		
						}

						//check to see if user invite me
					    if ($invitedMe) {	
                        //insert query to remove the invite
                        DatabaseConnector::query('DELETE FROM invites WHERE user_id=:userid AND  inviter_id=:inviterid', array(
                            ':userid' => $inviterid,
                            ':inviterid' => $user_id
                        ));		
						}						

						//check to see if user is my contact
					    if ($isContact) {	
                        //insert query to unlock the contact
                        DatabaseConnector::query('DELETE FROM contacts WHERE user_id=:userid AND contact_id=:contactid', array(
                            ':userid' => $user_id,
                            ':contactid' => $contactid
                        ));					
						}			
						
						//check to see if im their contact
					    if ($isTheirContact) {	
                        //insert query to unlock the contact
                        DatabaseConnector::query('DELETE FROM contacts WHERE user_id=:userid AND contact_id=:contactid', array(
                            ':userid' => $contactid,
                            ':contactid' => $user_id
                        ));	
						}	
						
						
						//checks to see if the person unfollowing is from the verified account, if so unverify the user.. 
						if ($followerid == 18) {
						 DatabaseConnector::query('UPDATE users SET verified=0 WHERE id=:userid', array(':userid'=>$user_id));
						}
						//prevent resubmit form submission
					header('Location: '.$GLOBALS['url_loc'][2].'');						
                    } else {
					header('Location: '.$GLOBALS['url_loc'][2].'');							
					throw new Exception('Error: Already unfollowed!');
                    }
                    $isFollowing = User::isUserFollowing(User::getUserId($GLOBALS['url_loc'][2]), User::isLoggedIn());
                }
            }
			

            //check if uninvite button was hit
            if (isset($_POST['uninvite'])) {
                
                //check if user is trying to uninvite himself        
                if ($usersprofile != true) {
                    
                    //check to see if user is in fact invited
                    if ($isInvited) {
						//check to see if user is already a contact
					    if (!$isContact) {
                        //insert query to uninvite the user
                        DatabaseConnector::query('DELETE FROM invites WHERE user_id=:userid AND inviter_id=:inviterid', array(
                            ':userid' => $user_id,
                            ':inviterid' => $inviterid
                        ));
					header('Location: '.$GLOBALS['url_loc'][2].'');							
					} else {
					header('Location: '.$GLOBALS['url_loc'][2].'');							
					throw new Exception('Error: User is already a contact. You cannot uninvite!');
					}
						//prevent resubmit form submission
					header('Location: '.$GLOBALS['url_loc'][2].'');						
                    } else {
					header('Location: '.$GLOBALS['url_loc'][2].'');							
					throw new Exception('Error: Invite to this user does not exist!');
                    }
                    $isInvited = User::isUserInvited(User::getUserId($GLOBALS['url_loc'][2]), User::isLoggedIn());
                }
            }
			

            //check if unlock (contact) button was hit
            if (isset($_POST['unlock'])) {
                
                //check if user is trying to unlock himself        
                if ($usersprofile != true) {
                    
                    //check to see if user is in fact a contact
                    if ($isContact) {
						//check to see if user is already a contact
                        //insert query to uninvite the user
                        DatabaseConnector::query('DELETE FROM contacts WHERE user_id=:userid AND contact_id=:contactid', array(
                            ':userid' => $user_id,
                            ':contactid' => $contactid
                        ));
					header('Location: '.$GLOBALS['url_loc'][2].'');							
						//prevent resubmit form submission
					header('Location: '.$GLOBALS['url_loc'][2].'');						
                    } else {
					header('Location: '.$GLOBALS['url_loc'][2].'');							
					throw new Exception('Error: User is not your contact!');
                    }
                    $isContact = User::isUserContact(User::getUserId($GLOBALS['url_loc'][2]), User::isLoggedIn());
                }
            }
			
			
			
			
        }
    }
}
catch (Exception $e) {
    $GLOBALS['errors'][] = $e->getMessage();
}


 include_once('components/post/post.php'); 

?>