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
  <title>Manage Properties</title>
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
    <?php
            $q1 ="select * from prop_listing_tble where verification = '0'";
            //$q1="select * from prop_listing_tble where published='0'";
            $query1 =mysqli_query($conn, $q1);
            $unverified=mysqli_num_rows($query1);
            //echo "Unverified Properties = ".$unverified;

            if($unverified>0){        
                ?>
    
                <form action ="agentunverifiedproperty.php" method="POST">
                <button type="submit" class="btn btn-danger"> Unverified Properties: <?php echo $unverified; ?></button>
    
                <?php 
            }
            ?>

    <!--- Recent List --->
    <div class="card">
        <div class ="card-header">
            <h5> Manage Properties</h5>
        </div>

        
        <div class="card-body">
            <p class ="card-body-text">
            <table class="table table-striped">
            <tr> 
                <th>ID</th>
                <th> Date </th>
                <th>Name</th>
                <th>Username</th>
                <th>Type</th>
                <th>More</th>
                <th>Verification</th>
                <th> Verify (Enter 1)</th>
                <th> Notes</th>
            </tr>
                <?php
                    $q ="select * from prop_listing_tble where verification='0' ORDER BY date DESC";
                    $query =mysqli_query($conn, $q);
                    while($rows = mysqli_fetch_array($query)){
                        ?>                         
                        <tr>
                        <td>
                            <?php echo $rows['id']; ?>
                        </td>
                        <td>
                            <?php echo $rows['date']; ?>
                        </td>
                        <td>
                            <?php echo $rows['name']; ?>
                        </td>
                        <td>
                            <?php echo $rows['username']; ?>
                        </td>
                        <td>
                            <?php echo $rows['proptype']; ?>
                        </td>
                        <td>
                            <form action="agentpropertydetails.php" method = "POST">
                            <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>">
                                <button type="submit" class="btn btn-info" name = "detail"> Details </button>
                            </form> 
                        </td>
                        <td>
                            <?php echo $rows['verification']; ?>
                        </td>
                        <td>
                            <form action="agentpropertyverification.php" method = "POST">
                            <input type="number" min="0" max="1" id="verification" name="verification" maxlength="4" size="4" required>
                            <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>"><button type="submit" class="btn btn-info" name = "release">Submit </button>
                            </form> 
                        </td>
                        <td>
                            <form action="agentpropertynotes.php" method = "POST">
                            <textarea class="form-control" name="agentnotes" id="agentnotes" rows="1"></textarea>
                            <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>"><button type="submit" class="btn btn-info" name = "release">Submit </button>
                            </form> 
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                
                </table>
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