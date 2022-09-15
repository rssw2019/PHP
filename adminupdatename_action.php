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
if($user=='prop_admin1'){
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
        //Get the current values
        $sql_old = "select * from prop_listing_tble WHERE id=$admin_id";
        $query1 =mysqli_query($conn, $sql_old);
        while($rows = mysqli_fetch_array($query1)){

    // collecting data from the user
        //$statusvalue =  htmlspecialchars($_POST['status']);
        $admin_id =  htmlspecialchars($_POST['id']);
        //echo $admin_id;
        // collecting data from the user
        $user=htmlspecialchars($_SESSION["username"]);
        $new_name =  htmlspecialchars($_POST['name']);
        //echo $name;
        
        }
        echo $new_email;

        $sql = "UPDATE prop_listing_tble SET name='$new_name', WHERE id=$admin_id";

        //$sql = "UPDATE prop_listing_tble SET name='$name' WHERE id=$admin_id";
          
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