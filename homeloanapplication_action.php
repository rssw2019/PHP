<?php
    //homeloanapplication_action.php
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
<?php
    include 'head.php';
?>
<body>
 <div class="container">
        <?php
            include "menu1.php";
        ?>
    </div>
    <br>
    <div class="container">
        <div class="container">
            <?php
            include "search.php";
            ?> 
        </div>
    </div>
    <br>   

<div class="container-fluid">

<div class="card">
    <div class="card-header">
        Application Submission Message
    </div>
    <div class="card-body">
    <p class="card-text">
    
    <?php 

    // collecting data from the user
        $date =date("F j, Y, g:i a");
        $name =  htmlspecialchars($_POST['name']);
        $citizenship =  $_POST['citizenship'];
        $address =  htmlspecialchars($_POST['address']);
        $phone =  $_POST['phone'];
        $email =  $_POST['email'];
        $proptype =  $_POST['proptype'];
        $propdistrict =  $_POST['propdistrict'];
        $propmunicipality =  htmlspecialchars($_POST['propmunicipality']);
        $propward =  $_POST['propward'];
        $propcity =  htmlspecialchars($_POST['propcity']);
        $income=$_POST['income'];
        $incomesource = $_POST['incomesource'];
        $ipaddress =  $geoplugin_ip_address;
        $applicationcity=$geoplugin_city;
        $applicationcountry=$geoplugin_countryName;
        $confirmation =htmlspecialchars($_POST['confirmation']);
        
        $sql = "INSERT INTO `loan_application_tble` ( `date`, `name`, `citizenship`, `address`, `phone`, `email`, `proptype`, `propdistrict`, `propmunicipality`, `propward`, `propcity`, `income`, `incomesource`, `ipaddress`, `applicationcity`, `applicationcountry`, `confirmation`) VALUES ('$date','$name','$citizenship','$address','$phone','$email','$proptype','$propdistrict','$propmunicipality','$propward','$propcity','$income','$incomesource','$ipaddress','$applicationcity','$applicationcountry','$confirmation')";
        
          
        if(mysqli_query($conn, $sql)){
            echo "<p> Hello ".$name.",<br> Your loan application has been submitted successfully. Your confirmation code is ".$confirmation.". Please save this code and use this code whenever you need to communicate with us. We will review your information and get back to you as soon as possible. We may need additiona documents to verify your information. If you need to make any changes to your submission, please email us your informaiton at contactus@purnimonline.com. </p>"; 
        } else{
            echo "ERROR: Your message could not be submitted at this time. Please try again later. " 
                . mysqli_error($conn);
        }
        
        echo "<p> Below is your information that you submitted.</p>";
        
        echo "Application Date: ".$date."<br>";
        echo "Name: ".$name."<br>";
        echo "Citizenship: ".$citizenship."<br>";
        echo "Address: ".$address."<br>";
        echo "Phone: ".$phone."<br>";
        echo "Email: ".$email."<br>";
        echo "Property Type: ".$proptype."<br>";
        echo "Property District: ".$propdistrict."<br>";
        echo "Property Municipality: ".$propmunicipality."<br>";
        echo "Property Ward Number: ".$propward."<br>";
        echo "Property City: ".$propcity."<br>";
        echo "Monthly Income: ".$income."<br>";
        echo "Income Source: ".$incomesource."<br>";
        //echo "Name: ".$ipaddress."<br>";
        //echo "Name: ".$applicationcity."<br>";
        //echo "Name: ".$applicationcountry."<br>";
        //echo "Confirmation Number: ".$confirmation."<br>";

            
        // Close connection
        mysqli_close($conn);


    ?>
    </div>
    </div>
    
    <?php
        include '../footer.php';
    ?>
    
</div>
</div>

</body>
</html>