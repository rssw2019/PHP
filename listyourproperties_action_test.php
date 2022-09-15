<?php
//Connecting to the database
require_once "../config.php";

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Submission Message</title>
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
if($user=='admin1' or 'admin2' or 'admin3'){
    include 'adminmenu.php';
    
}
else{
    include 'userlistingmenu.php';
}
?> 

<div class="container-fluid mt-4">

<div class="card">
    <div class="card-header">
        Submission Message
    </div>
    <div class="card-body">
    <p class="card-text">
    
    <?php 

    // collecting data from the user
        $user=htmlspecialchars($_SESSION["username"]);
        $selltype =  htmlspecialchars($_POST['selltype']);
        $proptype =  htmlspecialchars($_POST['proptype']);
        $name =  htmlspecialchars($_POST['name']);
        $email =  $_POST['email'];
        $phone1 =  $_POST['phone1'];
        $phone2 =  $_POST['phone2'];
        $district =  $_POST['district'];
        $municipality =  htmlspecialchars($_POST['municipality']);
        $ward =  $_POST['ward'];
        $city =  htmlspecialchars($_POST['city']);
        $housenumber=$_POST['housenumber'];
        $street=htmlspecialchars($_POST['street']);
        $area = $_POST['area'];
        $unit =  $_POST['unit'];
        $storynumber=$_POST['storynumber'];
        $bedroomnumber=$_POST['bedroomnumber'];
        $age=$_POST['age'];
        $price =  $_POST['price'];
        $message =  htmlspecialchars($_POST['message']);
        $date =date("F j, Y, g:i a");
        $confirmation =htmlspecialchars($_POST['confirmation']);
        $image1=$_FILES['image1']["name"];
        $image2=$_FILES['image2']["name"];
        $image3=$_FILES['image3']["name"];
        $image4=$_FILES['image4']["name"];
        $image5=$_FILES['image5']["name"];
        
        $uploadfilelimit=2000000;
        $uploaddir = "images/purnim/";
        $uploadfile1 = $uploaddir.basename($_FILES["image1"]["name"]);
        $uploadfile2 = $uploaddir.basename($_FILES["image2"]["name"]);
        $uploadfile3 = $uploaddir.basename($_FILES["image3"]["name"]);
        $uploadfile4 = $uploaddir.basename($_FILES["image4"]["name"]);
        $uploadfile5 = $uploaddir.basename($_FILES["image5"]["name"]);
        
        //upload image file to the server
        move_uploaded_file($_FILES['image1']['tmp_name'], $uploadfile1);
        move_uploaded_file($_FILES['image2']['tmp_name'], $uploadfile2);
        move_uploaded_file($_FILES['image3']['tmp_name'], $uploadfile3);
        move_uploaded_file($_FILES['image4']['tmp_name'], $uploadfile4);
        move_uploaded_file($_FILES['image5']['tmp_name'], $uploadfile5);


       //echo "Confirmation code is ".$confirmation;
        
        $sql = "INSERT INTO prop_listing_tble (date, id, selltype, proptype, username, name, email, phone1, phone2, district, municipality, ward, city,housenumber, street, area, unit, storynumber, bedroomnumber, age, price, message, confirmation, image1, image2, image3, image4, image5) VALUES ('$date','','$selltype','$proptype','$user','$name','$email','$phone1','$phone2','$district','$municipality','$ward','$city','$housenumber','$street','$area','$unit','$storynumber','$bedroomnumber','$age','$price','$message','$confirmation', '$image1', '$image2', '$image3', '$image4', '$image5')";
        
          
        if(mysqli_query($conn, $sql)){
            echo "<p> Hello ".$name.",<br> Your property listing information has been submitted successfully. Your confirmation code is ".$confirmation.". Please save this code and use this code whenever you need to communicate with us.We will review your information as soon as possible. We will contact you via email or phone before publishing the property. If you need to make any changes to your submission, please email us your informaiton at contactus@purnimonline.com. </p>"; 
        } else{
            echo "ERROR: Your message could not be submitted at this time. Please try again later. " 
                . mysqli_error($conn);
        }
          
        //updating user submission number
        $oldnumberofsub="select number_of_submissions from users where username='$user'";
        if(mysqli_query($conn, $oldnumberofsub)){
            $updated_number_of_submissions=$oldnumberofsub+1;
        }
        
        $sql2="UPDATE users SET number_of_submissions='$updated_number_of_submissions', WHERE username='$user'";
        mysqli_query($conn, $sql2);
        
            
        // Close connection
        mysqli_close($conn);


    ?>
    <p> 
    <form action='uploadimage.php' method='POST'> <input type='hidden' name="confirmation" value="<?php echo '$confirmation'; ?>" >
        <button type='submit' name='submit' class="btn-primary"> 
            Upload your property images 
        </button> 
    </form>
    </p>
    
    <p>
        <a href =\"listyourpropertiesform.php\">Submit another listing information.</a>
    </p>
    
    <?php
        include '../footer.php';
    ?>
    
</div>
</div>

</body>
</html>

