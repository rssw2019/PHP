<?php
   //Connect the the database 
   require "../config.php";
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
  <title>Purnim Real Estate</title>
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
 

<div class="container-fluid mt-3">
    <div >
            <p> 
                <b>Search Properties for Sale</b>

                <?php 
                    include 'searchbuy.php';
                ?>
            </p>
            <p> 
        <a href="searchbycity.php">Search More Cities</a>
    </p>
            
        </div>

    <!--- Recent List --->
    <div class="card">
        <div class ="card-header">
            <h5> List of Properties in Pokhara</h5>
        </div>
        <div class="card-body">
            <p class ="card-body-text">
                <div class="row">
                    
                <?php
                    $q ="select * from prop_listing_tble WHERE published='1' And city='pokhara' ORDER BY date DESC";
                    $query =mysqli_query($conn, $q);
                    while($rows = mysqli_fetch_array($query)){
                        echo "<div class=\"col-sm-12 col-md-4\">";
                        
                        echo "<div class='modal-header rounded-1' style='background-color: lightgray;'> ".$rows['area']." ".strtoupper($rows['unit'])." ".strtoupper($rows['proptype'])." FOR ".strtoupper($rows['selltype'])." </div>";
                        ?>
                        
                        <!-- Display views and likes -->
                        <p style="text-align: right;">
                                <?php 
                                    $visitnumber=$rows['visitnumber']; 
                                    $likednumber=$rows['likednumber']; 
                                    if($visitnumber>0){
                                        echo "&nbsp;".$rows['visitnumber']. " views ";
                                    }
                                    if($likednumber>0){
                                        echo " &nbsp; <img src='like.png'></img> ".$rows['likednumber']. " likes ";
                                        echo " <br>";
                                    }
                                ?>  
                            </p>
                            <!-- ------------>

                        <form action="propertydetails.php" method = "POST">
                            <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>">
                            <button type="submit" class="btn btn-info" name = "detail"> <img src="purnim_logo1.png"></img> 
                            </button> 
                        </form> <br> 
                        
                        <form action="propertydetails.php" method = "POST">
                        <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>"> 
                            <?php
                                echo "Rs. ". $rows['price']." <br>";
                                echo $rows['city'].", ".$rows['district']."<br>";
                                echo "Contact: ".$rows['name']. "<br> Phone:  ".$rows['phone1']."<br>Email: ".$rows['email']."<br>";
                                echo "Listed Date: ".$rows['date']."<br>";
                                
                            ?>
                            <button type="submit" class="btn btn-info" name = "detail"> View more information
                            </button>
                            </button>
                        </form> 
                        <br>  
                        <?php
                      
                        echo "<hr></div> ";
                    }
                ?>
                </div>
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