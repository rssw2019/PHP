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
  <title>All Properties</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Vanukas, the leading Nepalese properties, houses, buy, sell house in Nepal, buy land in Nepal - commercial plots, lands and markets - villas - apartments - bungalows - home buying and villa rentals."/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
    include 'adminmenu.php';
?> 

<div class="container-fluid mt-4">
    <p> 
        <br>
        Hello and welcome to the Vanukas Real Estate page where you can buy and sell houses or land, or rent apartments all over Nepal.  If you are a buyer, please contact the sellers directly. We cannot verify any information about the sellers or their properties here. Please use this information at your own risk.  If you want to list your house, land or apartment on our website, please submit your information <a href="listyourproperties.php"> here.</a> 
    </p>

    <!--- Recent List --->
    <div class="card">
        <div class ="card-header">
            <h5> All Properties</h5>
        </div>
        <div class="card-body">
            <p class ="card-body-text">
                <?php
                    $q ="select * from prop_listing_tble WHERE status='1' ORDER BY date DESC";
                    $query =mysqli_query($conn, $q);
                    while($rows = mysqli_fetch_array($query)){
                ?>      
                        <table class="table table-striped">
                            <tr><td>
                                Listed Date: <?php echo $rows['date']; ?><br>
                                Property Type: <?php echo $rows['proptype']; ?> <br>
                                Transaction Type: <?php echo $rows['selltype']; ?><br>
                                Contact Name: <?php echo $rows['name']; ?> <br>
                                Email: <?php echo $rows['email']; ?><br>
                                Phone1: <?php echo $rows['phone1'];?> <br>
                                Phone2: <?php echo $rows['phone2'];?> <br>
                            </td>
                            <td>
                                District: <?php echo $rows['district']; ?> <br>
                                Municipality/VDC: <?php echo $rows['vdc']; ?><br>
                                Ward Number: <?php echo $rows['ward'];?> <br>
                                Area: <?php echo $rows['area']." ". $rows['unit']; ?> <br>
                                Price: Rs. <?php echo $rows['price']; ?> <br>
                                <b>More Information</b> <p> <?php echo $rows['message']; ?></p>
                            </td></tr>
                        </table>

                 <?php
                    }
                ?>
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