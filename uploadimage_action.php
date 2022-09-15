<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
 <?php
    $title ="Purnim Realty -File Upload";
?>

<?php
    include 'head.php';
?>

<body style="background-color:lightgray;">
<div class="container-fluid">
    <?php
        include "menu1.php";
    ?>
</div>
<div class="container">
        <br>
    <?php
    $user=htmlspecialchars($_SESSION["username"]);
    if(isset($_POST['submit'])){
        $user_minprice= $_POST['id'];
    ?>
    <!--- Recent list of Properties --->   
<div class="row">
    <div class="container">
        <div class="w-auto p-3" style="background-color:white;">    
    <p>
        You are signed in as admin <b><?php echo $user; ?>.</b>

    <div class="card">
        <div class ="card-header">
            <h5> File Upload Message</h5>
        </div>
        <div class="card-body">
            <p class ="card-body-text">

<?php
//retrieve the username
$user=htmlspecialchars($_SESSION["username"]);
//create a unique id for each image
$unikid=randString(5),PHP_EOL;
$uploadfilelimit=2000000;
$uploaddir = "image/$user/";
$uploadfile = $uploaddir.$prop_id.$unikid."_".basename($_FILES["image"]["name"]);
$fileType = pathinfo($uploadfile,PATHINFO_EXTENSION);
echo $uploadfile;
if(isset($_POST["submit"]) && !empty($_FILES["image"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    $imagesize = $_FILES['image']['size'];
    //echo $imagesize;
    if($imagesize>$uploadfilelimit){
        echo "Your file is bigger than the allowed size. Please upload an image that is less than 1.5 MB";
    }
    else{
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
                echo '<pre>';
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    echo "Your file was successfully uploaded. Upload another <a href='uploadimage.php'>file</a>.\n";
                } else {
                    echo "The file type is not allowed. You can only upload the following file types: jpg, png, PNG, jpeg, gif,'pdf'!\n";
                }
                print "</pre>";
        }
    }

    
}

?>
        </div>


</div>

</div>
<br>

<?php
include '../footer.php';
?>

</p>

</div>


</body>
</html>