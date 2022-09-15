<?php
//Connecting to the database
require_once "../config.php";

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
?>
 
 <?php
    $title ="Purnim Realty -Admin Account";
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
    $user=htmlspecialchars($_SESSION["username"]);
    ?>  

    <div class="w-auto p-3" style="background-color:white;">    
    <p>
        You are signed in as admin <b><?php echo $user; ?>.</b>
        
     <!-- Unpublished Alert begins-->
     <?php 
        $unpublished="select * from prop_listing_tble where published='0'";
        $query1 =mysqli_query($conn, $unpublished);
        /* Close the connection */
        mysqli_close($conn);
        /* Get the number of rows in the result set */
        $row_cnt_unpublished = mysqli_num_rows($query1);
        if($row_cnt_unpublished>0){        
    ?>

    <form action ="adminunpublishedproperty.php" method="POST">
        <button type="submit" class="btn btn-warning"> Properties waiting for verification: <?php echo $row_cnt_unpublished; ?>
        </button>
    </form>

    <?php 
}
?>
</p>
<p>
<!-- Unpublished Alert Ends -->

<!-- New Message Alert begins -->
<p>
<?php 
    $newmessage ="select * from prop_message_tble where status='new' ";
    $query2 =mysqli_query($conn, $newmessage);
    /* Close the connection */
    mysqli_close($conn);
    /* Get the number of rows in the result set */
    $row_cnt_newmessage = mysqli_num_rows($query2);
    if($row_cnt_newmessage>0){        
?>
    <form action ="adminnewmessage.php" method="POST">
        <button type="submit" class="btn btn-warning"> New Messages: <?php echo $row_cnt_newmessage; ?>
        </button>
    </form>

<?php 
    }
?>
</p>
<!-- New Message Alert Ends-->

<p>
    <a href="agentregister.php">Create a new agent account</a>
</p>
</div>
<br>

<?php
    include '../footer.php';
?>

    




</body>
</html>