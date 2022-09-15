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
        Job Application Submission Message
    </div>
    <div class="card-body">
    <p class="card-text">
    
    <?php 

    // collecting data from the user
        $date =date("F j, Y, g:i a");
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $name =  htmlspecialchars($_POST['name']);
        $citizenship =  $_POST['citizenship'];
        $citizenshipnumber =  $_POST['citizenshipnumber'];
        $citizenshipplace =  $_POST['citizenshipplace'];
        $fathername =  htmlspecialchars($_POST['fathername']);
        $address =  htmlspecialchars($_POST['address']);
        $phone =  $_POST['phone'];
        $email =  $_POST['email'];
        $experience =  $_POST['experience'];
        $education =  $_POST['education'];
        $district =  $_POST['district'];
        $city =  htmlspecialchars($_POST['city']);
        $smartphone=$_POST['smartphone'];
        $vibernumber =  $_POST['vibernumber'];
        $realestateagent =  $_POST['realestateagent'];
        $computerskills =  $_POST['computerskills'];
        $internetskills =  $_POST['internetskills'];
        $socialmediatype =  $_POST['socialmediatype'];
        $socialmediaact =  $_POST['socialmediaact'];
        $ipaddress =  $geoplugin_ip_address;
        $applicationcity=$geoplugin_city;
        $applicationcountry=$geoplugin_countryName;
        $confirmation =htmlspecialchars($_POST['confirmation']);
        
        $sql = "INSERT INTO `job_application_tble`(`id`, `date`, `age`, `gender`, `name`, `citizenship`, `citizenshipnumber`, `citizenshipplace`, `fathername`, `address`, `phone`, `email`, `experience`, `education`, `district`, `city`, `smartphone`, `vibernumber`, `realestateagent`, `computerskills`, `internetskills`, `socialmediatype`, `socialmediaact`, `ipaddress`, `applicationcity`, `applicationcountry`, `confirmation`) VALUES (' ', '$date', '$age', '$gender', '$name', '$citizenship', '$citizenshipnumber', '$citizenshipplace', '$fathername', '$address', '$phone', '$email', '$experience', '$education', '$district', '$city', '$smartphone', '$vibernumber', '$realestateagent', '$computerskills', '$internetskills', '$socialmediatype', '$socialmediaact', '$ipaddress', '$applicationcity', '$applicationcountry', '$confirmation')";
        
          
        if(mysqli_query($conn, $sql)){
            echo "<p> Hello ".$name.",<br> Your loan application has been submitted successfully. Your confirmation code is ".$confirmation.". Please save this code and use this code whenever you need to communicate with us. We will review your information and get back to you as soon as possible. We may need additiona documents to verify your information. If you need to make any changes to your submission, please email us your informaiton at contactus@purnimonline.com. </p>"; 
        } else{
            echo "ERROR: Your message could not be submitted at this time. Please try again later. " 
                . mysqli_error($conn);
        }
        
        echo "<p> Below is your information that you submitted.</p>";
        
        echo "Date: ".$date."<br>";
        echo "Age: ".$age."<br>";
        echo "What is your gender? ".$gender."<br>";
        echo "Full Name: ".$name."<br>";
        echo "Citizenship Status: ".$citizenship."<br>";
        echo "Citizenship Number/Passport Number: ".$citizenshipnumber."<br>";
        echo "Citizenship/Passport issued place: ".$citizenshipplace."<br>";
        echo "Father's Name: ".$fathername."<br>";
        echo "Address: ".$address."<br>";
        echo "Mobile Phone: ".$phone."<br>";
        echo "Email Address: ".$email."<br>";
        echo "Have you done any job before?: ".$experience."<br>";
        echo "What is your education level?: ".$education."<br>";
        echo "In which district do you want to work?: ".$district."<br>";
        echo "In which city do you want to work?: ".$city."<br>";
        echo "Do you have a smart phone (Android/Apple)?: ".$smartphone."<br>";
        echo "What is your Viber/WhatsApp number?: ".$vibernumber."<br>";
        echo "Have you worked as a real estate agent before?: ".$realestateagent."<br>";
        echo "Do you have basic computer skills?: ".$computerskills."<br>";
        echo "Do you have basic internet skills?: ".$internetskills."<br>";
        echo "Which social media do you use the most? ".$socialmediatype."<br>";
        echo "What is your social media account name? ".$socialmediaact."<br>";
        echo "IP Address: ".$ipaddress."<br>";
        echo "Application City: ".$applicationcity."<br>";
        echo "Application Country: ".$applicationcountry."<br>";
        echo "Confirmation: ".$confirmation."<br>";
            
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