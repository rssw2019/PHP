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
    $title ="Purnim Realty -Agent New Messages";
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
    <!--- Recent list of Properties --->   
<div class="row">
    <div class="container">
        <div class="w-auto p-3" style="background-color:white;">    
    <p>
        You are signed in as admin <b><?php echo $user; ?>.</b>

    <div class="card">
        <div class ="card-header">
            <h5> All Messages</h5>
        </div>
        <div class="card-body">
            <p class ="card-body-text">
            
                <?php
                    $q ="select * from prop_message_tble ORDER BY date ASC";
                ?>
                    <table class="table table-striped">
                <tr>
                <th>ID</th><th>Date</th><th>Name</th><th>Phone</th><th>Email</th><th><th>Prop ID</th></th>Message</th><th>Status</th>
                </tr>
               
                <?php
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
                                <?php echo $rows['phone']; ?>
                            </td>
                            <td>
                                <?php echo $rows['email']; ?>
                            </td>
                            <td>
                                <?php echo $rows['prop_id']; ?>
                            </td>
                            <td>
                                <form action ="adminmessagedetail.php" method="POST">
                                <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>">
                                    <button class= "btn btn-primary" type="submit" name="submit">open </button>
                            </td><td>
                                <?php 
                                $status= $rows['status'];
                                if($status==0){
                                    echo "New";
                                } 
                                else{
                                    echo "Read";
                                }                              
                                
                                ?>
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

<?php
    include '../footer.php';
?>

    </p>

</div>


</body>
</html>