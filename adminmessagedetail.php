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

        // Get message id from the form
        $message_id =  $_POST['id'];
        //echo $message_id;
    ?>
    

    <?php
    //change the message status into read
        $sql = "UPDATE prop_message_tble SET status='1', WHERE id='$message_id'";
    ?>

    <!-- Message display begins -->

        <div class="card">
            <div class="card-header">
                 Message detail for message ID <?php echo $message_id; ?>
            </div>
        <div class="card-body">
        <p class="card-text">
        <table>
        <?php

        $sql = "SELECT * FROM prop_message_tble WHERE id='$message_id'";
        $query =mysqli_query($conn, $sql);
        while($rows = mysqli_fetch_array($query)){
            ?>
            Date: <?php echo $rows['date']; ?>
            <br>
            Name: <?php echo $rows['name']; ?> 
            <br>
            Phone: <?php echo $rows['phone']; ?>
            <br>
            Email: <?php echo $rows['email']; ?>
            <p>
            Message: <?php echo $rows['message']; ?> </p>
            <?php
                }
            ?>
        <p>
            <a href="adminnewmessage.php">Back to new messages</a>
        </p>
        <p>
            <a href="adminmessages.php">Back to all messages</a>
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

