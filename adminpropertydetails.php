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
 
 <?php
    $title ="Purnim Realty -Agent Account";
?>
<?php 

//Calculating Total days from posting
function timeDiff($firstTime,$lastTime){
    // convert to unix timestamps
    $firstTime=strtotime($firstTime);
    $lastTime=strtotime($lastTime);

    // perform subtraction to get the difference (in seconds) between times
    $timeDiff=$lastTime-$firstTime;

    // return the difference
    return $timeDiff;
    }
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
<div class="container-fluid">
    <br>

    <?php 

    // collecting data from the user
        $statusvalue =  htmlspecialchars($_POST['status']);
        $admin_id =  htmlspecialchars($_POST['id']);
        ?>

        <div class="card">
            <div class="card-header">
                 Property Details For ID <?php echo $admin_id; ?>
            </div>
        <div class="card-body">
        <p class="card-text">
        <table>
        <?

        $sql = "SELECT * FROM prop_listing_tble WHERE id=$admin_id";
          
        $query =mysqli_query($conn, $sql);
        while($rows = mysqli_fetch_array($query)){
            ?>
            <b>Verification Status:</b>
                <?php echo $rows['verification']; ?>
            <br>  
            <b>Release Status:</b>
                <?php echo $rows['status']; ?>
            <br>                        
            <b>ID:</b>
                <?php echo $rows['id']; ?>
            <br>
            <b>Submitted Date:</b>
                <?php echo $rows['date']; ?>
            <br>
            <b>User Name:</b>
                <?php echo $rows['username']; ?>
            <br>
            <b>Seller's Full Name:</b>
                <?php echo $rows['name']; ?>
            <br>
            <b>Seller's Email Address:</b>
            <?php echo $rows['email']; ?>
                        <br>
                        <b>Seller's Phone 1: </b>
            <?php echo $rows['phone1']; ?>
                        <br>
                        <b>Seller's Phone 2:</b> 
            <?php echo $rows['phone2']; ?>
                        <br>
                        <b>Is this property for sell or for rent?:</b> 
            <?php echo $rows['selltype']; ?>
                        <br>
                        <b>Is this land or a house or an apartment/flat/room?</b>
            <?php echo $rows['proptype']; ?>
                        <br>
                        <b>District:</b> 
            <?php echo $rows['district']; ?>
                        <br>
                        <b>Municipality/VDC:</b>
            <?php echo $rows['vdc']; ?>
                        <br>
                        <b>Ward Number:</b>
            <?php echo $rows['ward']; ?>
                        <br>
                        <b>City/Tol:</b>
            <?php echo $rows['city']; ?>
                        <br>
                        <b>Size/Area:</b> 
            <?php echo $rows['area']; ?>
                        <br>
                        <b>Unit: </b>
            <?php echo $rows['unit']; ?>
                        <br>
                        <b>Price: </b>
            <?php echo $rows['price']; ?>
                        <br>
                        <b>Additional Information: </b>
            <?php echo $rows['message']; ?>
                        <br>
                        <b>Agent Notes: </b>
            <?php echo $rows['agentnotes']; ?>
                        <br>
                    <?php
                    }
                    ?>
                <p>
                <a href="adminmanageproperties.php">Back to Manage Proerties</a>
            </p>
</div>


</div>


</div>
<br>
</div>
                </div>
<?php
include '../footer.php';
?>

</body>
</html>

