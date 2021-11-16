<?php
switch ($GLOBALS['url_loc'][1])
{
    case "/":
    break;
    case "signup":
        $PAGE_TITLE = "Sign up";
        $BACKEND = "signup";
        $FRONTEND = "signup";
    break;
    case "join":
        header("location:../public_html/signup");
    break;
    case "signin":
        header("location:../public_html/login");
    break;
    case "home":
        $PAGE_TITLE = "Home";
        $BACKEND = "home";
        $FRONTEND = "home";		
        $FOOTER = "home";
        $HEADER = "home";
    break;
    case "continue":
        $PAGE_TITLE = "Review your order";
        $BACKEND = "continue";
        $FRONTEND = "continue";		
        $FOOTER = "continue";
        $HEADER = "continue";
    break;  
    case "onboarding":
        $PAGE_TITLE = "Onboarding";
        $BACKEND = "onboarding";
        $FRONTEND = "onboarding";	
    break;
    case "admin":
        $PAGE_TITLE = "Admin";
        $BACKEND = "admin";
        $FRONTEND = "admin";	    
        $FOOTER = "admin";
        $HEADER = "admin";
    break;
    case "reset":
        $PAGE_TITLE = "Reset";
        $BACKEND = "reset";
        $FRONTEND = "reset";
    break;
    case "redeem":
        $PAGE_TITLE = "Redeem";
        $BACKEND = "redeem";
        $FRONTEND = "redeem";
    break;
    case "logout":
        $PAGE_TITLE = "Logout";
        $BACKEND = "logout";
        $FRONTEND = "logout";
        $FOOTER = "logout";
        $HEADER = "logout";
    break;
    case "login":
        $PAGE_TITLE = "Log In";
        $BACKEND = "login";
        $FRONTEND = "login";
    break;
    case "order":
        $PAGE_TITLE = "Make an Order";
        $BACKEND = "order";
        $FRONTEND = "order";
    break;	
    default:
        $BACKEND = "index";
        $FRONTEND = "index";
	break;
}
?>