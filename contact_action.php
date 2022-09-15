<?php
   //Connect the the databse and the table voicequiz1_tble
    $server ="sql108.epizy.com";
    $username ="epiz_30725269";
    $password ="wkNee0C9ZlrE";
    $dbase ="epiz_30725269_database1";


    $conn = mysqli_connect($server, $username, $password, $dbase);
    if($conn){
        //echo"connection established";
    }
    else{
        echo"Connection error:".mysqli_error($conn);
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

    //Writing location info in the log file
    fwrite($myfile,date("m/d/Y H:i:s", $current_time)."listingview.php from: ".$geoplugin_city.", ip address:".$ip_add."<br>"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vanukas Real Estate</title>
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

    // collecting data from the user
        $name =  $_POST['name'];
        $email =  $_POST['email'];
        $phone =  $_POST['phone'];
        $subject =  $_POST['subject'];
        $message =  $_POST['message'];
        $date =date("F j, Y, g:i a");
        
        $sql = "INSERT INTO prop_message_tble  VALUES ('new','$date','','$name','$email','$phone','$subject','$message','$geoplugin_city','$geoplugin_countryName','$geoplugin_ip_address')";
          
        if(mysqli_query($conn, $sql)){
            echo "Dear ".$name.",<br>";
            echo "Thank you for contacting us. We will respond to your question as soon as possible. If you need immediate assistance, please email us at vanukas2022@gmail.com. Thank you."; 
        } else{
            echo "ERROR: Your message could not be submitted at this time. Please try again later. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);

    fclose($myfile);

    echo "<p> <a href =\"http://www.stom2021.great-site.net/realestate/main.php\">Go back to Vanukas Real Estate Home.</a></p>";
    ?>
</div>
</div>

</body>
</html>

<?php
    include '../footer.php';
?>