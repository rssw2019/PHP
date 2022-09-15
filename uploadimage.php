<?php
//Connecting to the database
require_once "../config.php";

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Upload Image</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

<?php
//Getting confirmirmation code from the property listing submission page
$confirmation =  htmlspecialchars($_POST['confirmation']);
echo "Confirmation ".$confirmation;
?>

<div class="container">
    <br>

    <div class="card">
        <div class="card-header">
            <h5>Image Upload Form For <?php echo "$confirmation"; ?></h5>
        </div>
        <div class="card-body">
            <p class="card-text">
             <p> Upload your property images here. You can only upload the following file types: 'jpg', jpeg, 'png', and 'gif'. The file size must be less than 1.5 MB.</p>
            <form action ="uploadimage_action.php"  method = "POST" enctype="multipart/form-data"> 
                <input type="file" name="image">
                <br> 
                <br> 

                <p> <button type="submit" class="btn btn-primary" name = "submit"> Submit </button> </p>
            </form>


</div>
</div>

<?php
    include '../footer.php';
?>

</body>
</html>