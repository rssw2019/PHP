<?php
//Connecting to the database
require_once "../config.php";

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: home.php");
    exit;
}
?>

<?php 
//loging the result    
    $myfile = fopen("listing_log.php","a") or die("Unable to open file!");
    $ip_add = $_SERVER['REMOTE_ADDR'];
    $current_time=time(); //timestamp
    $hour = date('H');
    //user location data
    $data=unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
    $geoplugin_ip_address = $data["geoplugin_request"];
    $geoplugin_city = $data["geoplugin_city"];
    $geoplugin_region = $data["geoplugin_region"];
    $geoplugin_countryName = $data["geoplugin_countryName"];
    $geoplugin_continentName = $data["geoplugin_continentName"];
    $geoplugin_latitude = $data["geoplugin_latitude"];
    $geoplugin_longitude = $data["geoplugin_longitude"];

    fwrite($myfile,"listin_insert.php from: ".$geoplugin_city.", ip address:".$ip_add); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Submission Message</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
// Initialize the session
session_start();

// Check if the user is logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    include 'listingmenu.php';
}
else{
    $user=htmlspecialchars($_SESSION["username"]);

    //If the user is admin user, give access to admin page
    if($user=='admin1' or $user=='admin2' or $user=='admin3'){
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

<div class="container-fluid mt-4">

<div class="card">
    <div class="card-header">
        Submission Message
    </div>
    <div class="card-body">
    <p class="card-text">
    
    <?php 

    // collecting data from the user
        $verification_value =  $_POST['verification'];
        echo "Hi ".$user.", <br>".$verifiction_value;
        $agent_id =  htmlspecialchars($_POST['id']);

        $sql = "UPDATE prop_listing_tble SET verification='$verification_value' WHERE id=$agent_id";
          
        if(mysqli_query($conn, $sql)){
            echo "Verification status of the property with ID = ". $agent_id. " has been changed into ".$verification_value."."; 
        } else{
            echo "ERROR: Your message could not be submitted at this time. Please try again later. " 
                . mysqli_error($conn);
        }
        
 
    ?>

    
</div>


<?php
$q1 ="select * from prop_listing_tble where verification = '0'";
//$q1="select * from prop_listing_tble where published='0'";
$query1 =mysqli_query($conn, $q1);
$unverified=mysqli_num_rows($query1); 
//echo $unverified;
    if($unverified>0){        
        ?>
        <p> 
            Go back to <a href="agentunverifiedproperty.php">
                Unverified Properties </a>
        </p>
        <?php 
            }
            else{
                ?>
                Go back to <a href="agentmanageproperty.php">
                Manage Properties </a>
            <?php

            }
                   // Close connection
        mysqli_close($conn);

        fclose($myfile);
    
        ?>
</div>
</body>
</html>

<?php
    include '../footer.php';
?>