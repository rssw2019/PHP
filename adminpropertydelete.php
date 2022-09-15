<?php
//Connecting to the database
require_once "../config.php";

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
 <?php
    $title ="Purnim Realty -Agent Account";
?>

<?php
    include 'head.php';
?>

<body style="background-color:lightgray;">
<div class="container-fluid">
    <?php
        include "menu1.php";
    ?>
</div>
<div class="container">
    <br>

<div class="card">
    <div class="card-header">
        Submission Message
    </div>
    <div class="card-body">
    <p class="card-text">
    
    <?php 

    // collecting data from the user
        $admin_id =  htmlspecialchars($_POST['id']);
        //echo $admin_id;

        $sql = "DELETE FROM prop_listing_tble WHERE id=$admin_id";
          
        if(mysqli_query($conn, $sql)){
            echo "The row with id = ".$admin_id. " is successfully deleted. Go back to <a href='adminmanageproperties.php'>Manage Properties.</a>"; 
        } else{
            echo "ERROR: Your message could not be submitted at this time. Please try again later. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);


    ?>
    <?php
        include '../footer.php';
    ?>
</div>

</div>

</body>
</html>

