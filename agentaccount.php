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
        </div>
        <br>
    <?php
    $user=htmlspecialchars($_SESSION["username"]);
    ?>
    <!--- Recent list of Properties --->   
<div class="row">
    <div class="container">
        <div class="w-auto p-3" style="background-color:white;">    
    <p>
        You are signed in as agent <b><?php echo $user; ?>.</b>
        
        <h5>  <a href="http://www.stom2021.great-site.net/realestate/contact.php"> Submit new Listing</a> </h5>

        <!--- Agent's Submission List --->
        <h5> My Submissions </h5>
        <!---  Sort --->
        <div class="row">
            <div class="col-sm-12 col-md-6">  
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Sort
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="propertysortbyprice.php">By Price</a></li>
                        <li><a href="main.php">By Date</a></li>
                        <li><a href="propertysortbypopularity.php">By Popularity</a></li>
                    </ul>
                </div>         
            </div>   
            <!--- List View ---->        
            <div class="col-sm-12 col-md-6">
                <p style="text-align: right;"> 
                    <a href="propertylistview.php">List View </a>
                </p>
            </div>
        </div>
        <!-- property Grid View --->    
        <div class="row">              
            <?php
            $q ="select * from prop_listing_tble WHERE username='$user' ORDER BY date DESC";
            $query =mysqli_query($conn, $q);
            while($rows = mysqli_fetch_array($query)){

                ?>
                <?php
                    include 'gridview.php';
                ?>
                <?php                    
            }
                ?>                    
        </div> 
        <p>
            <?php
                include '../footer.php';
            ?>
        </p>
    </div>
</div>

</body>
</html>
