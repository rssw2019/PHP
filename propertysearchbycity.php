<?php
   //Connect the the database 
   require_once "../config.php";
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
  <title>Search Properties </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Vanukas, the leading Nepalese properties, houses, buy, sell house in Nepal, buy land in Nepal - commercial plots, lands and markets - villas - apartments - bungalows - home buying and villa rentals."/>
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
<br>

    <p> Please use the filters below to search the properties that best meet your needs.</p>

    <div class="wrapper">

    <p> Search by Major City </p>
    <form action="searchbycity_action.php" method="POST">  
        <div class="input-group mb-3">            
            <select class="form-select"  name="city">
                <option value="Select">  </option>
                <option value = "Kathmandu" name = "Kathmandu"> Kathmandu </option>
                <option value = "Pokhara" name = "Pokhara"> Pokhara </option>
                <option value = "Bharatpur" name = "Bharatpur"> Bharatpur </option>
                <option value = "Lalitpur" name = "Lalitpur"> Lalitpur </option>
                <option value = "Birgunj" name = "Birgunj"> Birgunj </option>
                <option value = "Biratnagar" name = "Biratnagar"> Biratnagar </option>
                <option value = "Biratnagar" name = "Biratnagar"> Biratnagar </option>
                <option value = "Dhangadhi" name = "Dhangadhi"> Dhangadhi </option>
                <option value = "Ghorahi" name = "Ghorahi"> Ghorahi </option>
                <option value = "Itahari" name = "Itahari"> Itahari </option>
                <option value = "Hetauda" name = "Hetauda"> Hetauda </option>
                <option value = "Janakpur" name = "Janakpur"> Janakpur </option>
                <option value = "Butwal" name = "Butwal"> Butwal </option>
                <option value = "Tulsipur" name = "tulsipur"> tulsipur </option>
                <option value = "Dharan" name = "Dharan"> Dharan </option>
                <option value = "Nepalgunj" name = "Nepalgunj"> Nepalgunj </option>
                <option value = "Birendranagar" name = "Birendranagar"> Birendranagar </option>
                <option value = "Kalaiya" name = "Kalaiya"> Kalaiya </option>
                <option value = "Gaighat" name = "Gaighat"> Gaighat </option>
                <option value = "Bhaktapur" name = "Bhaktapur"> Bhaktapur </option>
                <option value = "Rajbiraj" name = "Rajbiraj"> Rajbiraj </option>
                <option value = "Malangawa" name = "Malangawa"> Malangawa </option>
                <option value = "Besisahar" name = "Besisahar"> Besisahar </option>
                <option value = "Gaur" name = "Gaur"> Gaur </option>
                <option value = "Dhulikhel" name = "Dhulikhel"> Dhulikhel </option>
                <option value = "Tansen" name = "Tansen"> Tansen </option>
                <option value = "Panauti" name = "Panauti"> Panauti </option>
                <option value = "Bidur" name = "Bidur"> Bidur </option>
                <option value = "Dhankuta" name = "Dhankuta"> Dhankuta </option>
                <option value = "Khandbari" name = "Khandbari"> Khandbari </option>
                <option value = "Dipayal Silghadhi" name = "Dipayal Silghadhi"> Dipayal Silghadhi </option>
                <option value = "Ilam" name = "Ilam"> Ilam </option>
                <option value = "Bhadrapur" name = "Bhadrapur"> Bhadrapur </option>
                <option value = "Tokha" name = "Tokha"> Tokha </option>
                <option value = "Khalanga" name = "Khalanga"> Khalanga </option>
                <option value = "Bhadrapur" name = "Bhadrapur"> Bhadrapur </option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary" name = "submit"> Submit </button>
    </form>
   
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