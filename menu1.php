<?php
    // Initialize the session
    session_start();
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        include 'listingmenu.php';
    }
    else{
        $user=htmlspecialchars($_SESSION["username"]);

        //If the user is admin user, give access to admin page
        if($user=='admin2'){
            include 'adminmenu.php';
            
        }
        elseif($user=='agent1' or $user=='agent2' or $user=='agent3'){
            include 'agentmenu.php';
        }
        else{
            include 'userlistingmenu.php';
        }
    }  
    ?> 