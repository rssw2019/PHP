<?php
//Connecting to the database
require_once "../config.php";
?>

<?php
    //writing visitor's log
    
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

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Purnim Realty</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Vanukas Real Estate, Vanukas, the leading Nepalese properties, houses, buy, sell house in Nepal, buy land in Nepal - commercial plots, lands and markets - villas - apartments - bungalows - home buying and villa rentals."/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
// Initialize the session
session_start();

//If the user is logged in, give access to the user account
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    include 'userlistingmenu.php';
    
}
else{
    include 'listingmenu.php';
}
    
?> 

<div class="container-fluid mt-4">

<div class="card">
    <div class="card-header">
        Message Submission Confirmation
    </div>
    <div class="card-body">
    <p class="card-text">
    
    <?php 
    //if(issset($_POST['prop_question_submit'])){
    // collecting data from the user
        $name =  $_POST['name'];
        $email =  $_POST['email'];
        $phone =  $_POST['phone'];
        $subject=$_POST['subject'];
        $message =  $_POST['message'];
        $prop_id =  $_POST['id'];
        $date =date("F j, Y, g:i a");
        
        $sql = "INSERT INTO prop_message_tble  VALUES ('new','$date','','$name','$email','$phone','$prop_id','$subject','$message','$geoplugin_city','$geoplugin_countryName','$geoplugin_ip_address',' ')";
        if(mysqli_query($conn, $sql)){
            echo "Hello ".$name.",<br>";
            echo "Thank you for contacting us regarding the property with id: ".$prop_id.". We will respond to your question as soon as possible. If you need further assistance, please email us at contactus@purnimonline.com. Thank you."; 
        } else{
            echo "ERROR: Your message could not be submitted at this time. Please try again later. " 
                . mysqli_error($conn);
        }
          
        // Close connection
       mysqli_close($conn);
    //fclose($myfile);

    echo "<p> <a href =\"https://www.purnimonline.com/realty\">Go back to the main page.</a></p>";
    ?>
</div>
<?php
    include '../footer.php';
?>
</div>

</body>
</html>

