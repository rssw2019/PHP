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

$user=htmlspecialchars($_SESSION["username"]);

//If the user is admin user, give access to admin page
if($user=='admin1' or 'admin2' or 'admin3'){
    include 'adminmenu.php';
    
}
else{
    include 'userlistingmenu.php';
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
        //$statusvalue =  htmlspecialchars($_POST['status']);
        $admin_id =  htmlspecialchars($_POST['id']);
        $user=htmlspecialchars($_SESSION["username"]);
        $new_selltype =  htmlspecialchars($_POST['selltype']);
        $new_proptype =  htmlspecialchars($_POST['proptype']);
        $new_name =  htmlspecialchars($_POST['name']);
        $new_email =  htmlspecialchars($_POST['email']);
        $new_phone1 =  htmlspecialchars($_POST['phone1']);
        $new_phone2 =  htmlspecialchars($_POST['phone2']);
        $new_district =  htmlspecialchars($_POST['district']);
        $new_vdc =  htmlspecialchars($_POST['vdc']);
        $new_ward =  htmlspecialchars($_POST['ward']);
        $new_city =  htmlspecialchars($_POST['city']);
        $new_area = htmlspecialchars($_POST['area']);
        $new_unit =  htmlspecialchars($_POST['unit']);
        $new_price =  htmlspecialchars($_POST['price']);
        $new_message =  htmlspecialchars($_POST['message']);
        $new_date =date("F j, Y, g:i a");

        $sql = "UPDATE prop_listing_tble SET name='$new_name', email='$new_email', phone1='$new_phone1', phone2='$new_phone2', district='$new_district', vdc='$new_vdc', ward='$new_ward', city='$new_city', area='$new_area', unit='$new_unit', price='$new_price', message='$new_message' WHERE id=$admin_id";
          
        if(mysqli_query($conn, $sql)){
            echo "Information for the property with ID = ". $admin_id. " has been updated."; 
        } else{
            echo "ERROR: Your message could not be submitted at this time. Please try again later. " 
                . mysqli_error($conn);
        }
        
        // Close connection
        mysqli_close($conn);

    fclose($myfile);

    ?>

    
</div>
</div>

</body>
</html>

<?php
    include '../footer.php';
?>