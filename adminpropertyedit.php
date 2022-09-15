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
    $title ="Purnim Realty -Admin Property Edit";
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

    <!--- Recent List --->
    <div class="card">
        <div class ="card-header">
            <h5> Edit Property Data</h5>
        </div>
        <div class="card-body">
            <p class ="card-body-text">
            <table class="table table-striped">
            <tr> 
                <th>Title</th>
                <th>Value</th>
            </tr>
            <form action="adminpropertyedit_action.php" method = "POST"> 
        
        <?php
        $admin_id =  htmlspecialchars($_POST['id']);

        $sql = "SELECT * FROM prop_listing_tble WHERE id=$admin_id";
        ?>
        

        <?php
        $query =mysqli_query($conn, $sql);
        while($rows = mysqli_fetch_array($query))
        {
            ?>
            <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>">  
            
            <tr>
                <td>Property Verification Status (1=verified, 0=unverified):</td>
                <td> <?php echo $rows['verification']; ?> </td>
            </tr>
            
            <tr>
                <td>Published Status (1 published, 0 uppublished):</td>
                <td> <?php echo $rows['published']; ?> </td>
            </tr>
            
            <tr>
                <td>Sale Status (1=active, 0=sold):</td>
                <td> <?php echo $rows['status']; ?> </td>
            </tr>
            
            <tr>
                <td>Submitted Date:</td><td>
                <?php echo $rows['date']; ?>
                </td>
            </tr>
            
            <tr>                        
                <td>Property ID:</td><td>
                <?php echo $rows['id']; ?>
                </td>
            </tr>
            
                        <tr>
                <td>Sale Type(sale, rent, lease):</td>
                <td>
                    <input type="tex" id="selltype" name="selltype" value="<?php echo $rows['selltype']; ?>"> 
                </td>
            </tr>
            
                 <tr>
                <td>Property Type(house, land, apartment, flat, rooms):</td>
                <td>
                    <input type="tex" id="proptype" name="proptype" value="<?php echo $rows['proptype']; ?>"> 
                </td>
            </tr>
            
            <tr>
                <td>User Name:</td>
                <td>
                    <input type="tex" id="username" name="username" value="<?php echo $rows['username']; ?>"> 
                </td>
            </tr>

            <tr>
                <td>Contact Name:</td>
                <td>
                    <input type="tex" id="name" name="name" value="<?php echo $rows['name']; ?>"> 
                </td>
            </tr>
            
            <tr>
                <td>Email Address:</td>
                <td>
                    <input type="tex" id="email" name="email" value="<?php echo $rows['email']; ?>"> 
                </td>
            </tr>
            <tr>
                <td>Mobile Phone 1: </td>
                <td>
                    <input type="tex" id="phone1" name="phone1" value="<?php echo $rows['phone1']; ?>"> 
                </td>
            </tr>
            <tr>
                <td>Landline Phone 2:</td><td>
                    <input type="tex" id="phone2" name="phone2" value="<?php echo $rows['phone2']; ?>"> 
                </td>
            </tr>

       
            <tr>
                <td>District:</td>
                <td>
                    <input type="tex" id="district" name="district" value="<?php echo $rows['district']; ?>"> 
                </td>
            </tr>
            <tr>
                <td>Municipality:</td>
                <td>
                    <input type="tex" id="vdc" name="vdc" value="<?php echo $rows['vdc']; ?>"> 
                </td>
            </tr>
            <tr>
                <td>Ward Number:</td>
                <td>
                    <input type="tex" min="1" max="50" id="ward" name="ward" value="<?php echo $rows['ward']; ?>"> 
                </td>
            </tr>
            
            <tr>
                <td>City:</td>
                <td>
                    <input type="tex" id="city" name="city" value="<?php echo $rows['city']; ?>"> 
                </td>
            </tr>
            
            <tr>
                <td>State:</td>
                <td>
                    <input type="tex" id="state" name="state" value="<?php echo $rows['state']; ?>"> 
                </td>
            </tr>
            
            <tr>
                <td>Street Address</td>
                <td>
                    <input type="tex" id="address" name="address" value="<?php echo $rows['address']; ?>"> 
                </td>
            </tr>
            
            <tr>
                <td>Size/Area:</td>
                <td>
                    <input type="tex" id="area" name="area" value="<?php echo $rows['area']; ?>"> 
                </td>
            </tr>
            <tr>
                <td>Unit: </td>
                <td>
                    <input type="tex" id="unit" name="unit" value="<?php echo $rows['unit']; ?>"> 
                </td>
            </tr>
            
                        <tr>
                <td>Story Number: </td>
                <td>
                    <input type="number" id="storynumber" min="1" max="100" name="storynumber" value="<?php echo $rows['storynumber']; ?>"> 
                </td>
            </tr>
            
                        <tr>
                <td>Number of Bedrooms </td>
                <td>
                    <input type="number" id="bedroomnumber" min="1" max="30" name="bedroomnumber" value="<?php echo $rows['bedroomnumber']; ?>"> 
                </td>
            </tr>
            
            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" id="price" name="price" min="1" max="999999999999" value="<?php echo $rows['price']; ?>"> 
                </td>
            </tr>
            
            <tr>
                <td>Additional Seller's Information: </td>
                <td>
                    <input type="tex" id="message" name="message" value="<?php echo $rows['message']; ?>"> 
                </td>
            </tr>
            
            <tr>
                <td>Agent's Note </td>
                <td>
                    <input type="tex" id="agentnotes" name="agentnotes" value="<?php echo $rows['agentnotes']; ?>"> 
                </td>
            </tr>
            
                        <tr>
                <td>Number of Views </td>
                <td>
                    <input type="number" id="visitnumber" name="visitnumber" min="0" max="9999999999" value="<?php echo $rows['visitnumber']; ?>"> 
                </td>
            </tr> 
            
            <tr>
                <td>Number of Likes </td>
                <td>
                    <input type="number" id="likednumber" min="0" max="999999999999999" name="likednumber" value="<?php echo $rows['likednumber']; ?>"> 
                </td>
            </tr>
            
                        <tr>
                <td>Number of Saves </td>
                <td>
                    <input type="number" id="savednumber" name="savednumber" value="<?php echo $rows['savednumber']; ?>"> 
                </td>
            </tr> 
            
            
                        
        <?php
        }
        ?>
            
        </table>
        <button type="submit" class="btn btn-info" name = "submit">Submit Changes</button>
        </form> 
                  
            </p>
        </div>
        
         <br>   

    </div>

    <?php
        fclose($myfile);
    ?>
</div>
</td></tr><tr>

<?php
    fclose($myfile);
?>
</div>
</div>

<?php
    include '../footer.php';
?>

</body>
</html>

