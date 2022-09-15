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
<div class="container">
    <?php
        include "menu1.php";
    ?>
</div>
<br>
<div class="container">
        <?php
        include "menu2.php";
        ?> 
</div>

<div class="container">
    <div class="row">    
        <div class="col-sm-12 col-md-12">
            <?php 
                include 'search.php';           
            ?>
    <br>
    <?php
            $q1 ="select * from prop_listing_tble where verification = '0'";
            //$q1="select * from prop_listing_tble where published='0'";
            $query1 =mysqli_query($conn, $q1);
            $unverified=mysqli_num_rows($query1);
            //echo "Unverified Properties = ".$unverified;

            if($unverified>0){        
                ?>
                    <p>
    
                <form action ="agentunverifiedproperty.php" method="POST">
            
                <button type="submit" class="btn btn-danger"> Unverified Properties: <?php echo $unverified; ?></button>
            </p>
    
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
                    $q ="select * from prop_listing_tble ORDER BY date DESC";
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