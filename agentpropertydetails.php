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
  <title>Agent Property Details</title>
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
if($user=='admin1' or $user=='admin2' or $user=='admin3'){
    include 'adminmenu.php';
    
}
else{
    include 'agentmenu.php';
}
?> 

<div class="container-fluid mt-4">

<div class="card">
    <div class="card-header">
        Property Details
    </div>
    <div class="card-body">
    <p class="card-text">
        <table>
    
    <?php 

    // collecting data from the user
        $statusvalue =  htmlspecialchars($_POST['status']);
        $admin_id =  htmlspecialchars($_POST['id']);

        $sql = "SELECT * FROM prop_listing_tble WHERE id=$admin_id";
          
        $query =mysqli_query($conn, $sql);
        while($rows = mysqli_fetch_array($query)){
            ?>
            <b>Verification Status:</b>
                <?php echo $rows['verification']; ?>
            <br>  
            <b>Release Status:</b>
                <?php echo $rows['status']; ?>
            <br>                        
            <b>ID:</b>
                <?php echo $rows['id']; ?>
            <br>
            <b>Submitted Date:</b>
                <?php echo $rows['date']; ?>
            <br>
            <b>User Name:</b>
                <?php echo $rows['username']; ?>
            <br>
            <b>Seller's Full Name:</b>
                <?php echo $rows['name']; ?>
            <br>
            <b>Seller's Email Address:</b>
            <?php echo $rows['email']; ?>
                        <br>
                        <b>Seller's Phone 1: </b>
            <?php echo $rows['phone1']; ?>
                        <br>
                        <b>Seller's Phone 2:</b> 
            <?php echo $rows['phone2']; ?>
                        <br>
                        <b>Is this property for sell or for rent?:</b> 
            <?php echo $rows['selltype']; ?>
                        <br>
                        <b>Is this land or a house or an apartment/flat/room?</b>
            <?php echo $rows['proptype']; ?>
                        <br>
                        <b>District:</b> 
            <?php echo $rows['district']; ?>
                        <br>
                        <b>Municipality/VDC:</b>
            <?php echo $rows['vdc']; ?>
                        <br>
                        <b>Ward Number:</b>
            <?php echo $rows['ward']; ?>
                        <br>
                        <b>City/Tol:</b>
            <?php echo $rows['city']; ?>
                        <br>
                        <b>Size/Area:</b> 
            <?php echo $rows['area']; ?>
                        <br>
                        <b>Unit: </b>
            <?php echo $rows['unit']; ?>
                        <br>
                        <b>Price: </b>
            <?php echo $rows['price']; ?>
                        <br>
                        <b>Additional Information: </b>
            <?php echo $rows['name']; ?>
                        <br>
                    <?php
                    }
                    ?>
                <p>
                <a href="agentmanageproperty.php">Back to Manage Proerties</a>
            </p>
</div>


</div>

<?php
fclose($myfile);
?>
</div>
<br>


</body>
</html>

<?php
include '../footer.php';
?>