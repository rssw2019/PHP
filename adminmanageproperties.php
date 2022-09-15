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
        $q ="select * from prop_listing_tble ORDER BY date DESC";
        $query =mysqli_query($conn, $q);
    ?>

    <!--- Recent List --->
    <div class="card">
        <div class ="card-header">
            <h5> Manage Properties</h5>
        </div>
        <div class="card-body">

        <?php

        $unpublished="select * from prop_listing_tble where published='0'";
        $query1 =mysqli_query($conn, $unpublished);
        

        /* Get the number of rows in the result set */
        $row_cnt_unpublished = mysqli_num_rows($query1);
        if($row_cnt_unpublished>0){        
            ?>
            <form action ="adminunpublishedproperty.php" method="POST">
            <button type="submit" class="btn btn-danger"> Waiting for verification: <?php echo $row_cnt_unpublished; ?>
            </button>
        <?php 
        }
        ?>
        <p class ="card-body-text">
            <table class="table table-striped">
                <tr> 
                    <th>ID</th>
                    <th> Date </th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Type</th>
                    <th>Verification</th>
                    <th>Published</th>
                    <th> Release/Hide</th>
                    <th> Action1</th>
                    <th>Action2</th>
                    <th>Action3</th>
                </tr>
    
                <?php
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
                            <?php echo $rows['verification']; ?>
                        </td>
                        <td>
                            <?php echo $rows['published']; ?>
                        </td>
                        <td>
                            <form action="adminpropertyrelease.php" method = "POST">
                            <input type="number" min="0" max="1"id="release" name="published" maxlength="4" size="4">
                            <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>"><button type="submit" class="btn btn-info" name = "release">Submit </button>
                            </form> 
        
                        </td>
                        <td>
                            <form action="adminpropertydetails.php" method = "POST">
                            <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>">
                                <button type="submit" class="btn btn-info" name = "detail"> Details </button>
                            </form> 
                        </td>
                        <td> 
                            <form action="adminpropertyedit.php" method = "POST">
                            <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>">
                                <button type="submit" class="btn btn-primary" name = "edit"> Edit </button>
                            </form> 
                        </td>
                        <td>
                            <form action="admindeletealert.php" method = "POST">
                            <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>">
                            <button type="submit" class="btn btn-danger" name = "delete"> Delete </button>
                            </form>
                        
                        </td>
                    </tr>
                <?php
                    }
                ?>
                
            </table>
        </p>
        <?php
            include '../footer.php';
        ?>
    </div>


</div>

<?php
    /* Close the connection */
    mysqli_close($conn);
?>

</body>
</html>

