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
  <title>Search Properties Vanukas Real Estate</title>
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
    if($user=='prop_admin1'){
        include 'adminmenu.php';
        
    }
    else{
        include 'userlistingmenu.php';
    }
}
?> 

<div class="container-fluid mt-4">
    <h5> Vanukas Real Estate </h5>

    <!--Displaying Filered Results --->
    <?php
        if(isset($_POST['submit'])){
            $rowCount=0;
            $user_district=$_POST['district'];
            //echo $user_price;
            //echo $user_city;
            //echo $user_district;
            //echo $user_prop_type;
            //echo $user_sale_type;


            if (isset($user_district)) {
                //$q ="select * from prop_listing_tble WHERE price < $user_price ORDER BY date DESC";
                //$q ="select * from prop_listing_tble WHERE city= '$user_city' ORDER BY date DESC";
                $q ="select * from prop_listing_tble WHERE status='1' AND district='$user_district' ORDER BY date DESC";  
                //$q ="select * from prop_listing_tble WHERE prop_type= '$user_prop_type' ORDER BY date DESC";                    
                //$q ="select * from prop_listing_tble WHERE sale_type='$user_sale_type' ORDER BY date DESC";
                //$q ="select * from prop_listing_tble WHERE price < $user_price OR city='$user_city' OR district='$user_district' OR prop_type= '$user_prop_type' OR sale_type='$user_sale_type ORDER BY date DESC";
                //$q_min="SELECT MIN(price) AS SmallestPrice FROM prop_listing_tble"; 
                $query =mysqli_query($conn, $q);
                
                //echo $SmallestPrice;
                $rowCount = mysqli_num_rows($query);
                //$rowCount = 10;
                //echo $rowCount;
                if($rowCount>0){
                    if($rowCount<2){
                        echo "<p> We found ".$rowCount." record with your criteria.</p>";
                    }
                    else{
                        echo "<p> We found ".$rowCount." records with your criteria.</p>";
                    }
                    echo "<div class =\"card\">";
                        echo "<div class=\"card-header\">";
                            echo "<b> Your Search Result </b>";
                        echo "</div>";
                    
                    while($rows = mysqli_fetch_array($query)){
    ?>      
                        <div class ="card-body">
                            <p class ="card-body-text">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            Listed Date: <?php echo $rows['date']; ?><br>
                                            <?php echo $rows['proptype']; ?>  for <?php echo $rows['selltype']; ?><br>
                                            Contact Name: <?php echo $rows['name']; ?> <br>
                                            Email: <?php echo $rows['email']; ?><br>
                                            Phone1: <?php echo $rows['phone1'];?> <br>
                                            Phone2: <?php echo $rows['phone2'];?> <br>
                                        </div>
                                    </div>
                                    <div class ="col">
                                        <div class="input-group">
                                            <b>Property Address </b> <?php echo $rows['district']; ?> discrict, <?php echo $rows['vdc']; ?> Municipality/VDC, Ward number <?php echo $rows['ward'];?> <br>
                                            Property Size/Area: <?php echo $rows['area']." ". $rows['unit']; ?> <br>
                                            <?php 
                                            if($rows['selltype']=='Rent'){
                                                echo "Rent: ".$rows['price']." Per Month";
                                            } 
                                            else {
                                                echo "Price: Rs. ".$rows['price']; 
                                            }
                                            ?> 
                                            <br>
                                            <b> More Information </b><br>
                                            <p> <?php echo " ".$rows['message']; ?></p>
                                        </div>
                                </div>
                            </p>
                        </div>
                    <hr>
                    
    <?php
                    }
                    echo "</div>";






                }
                else{
                    echo "<p>There are no records with your criteria.";
                }
                
            }
            
        
        
        
        
        
        
        
        
        }
    ?>

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