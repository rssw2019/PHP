<?php
   //Connect the the database 
   require "../config.php";
?>
<?php
    $title ="Purnim Realty";
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
<!--- Recent list of Properties --->   
<div class="row">
    <div class="container">
        <div class="w-auto p-3" style="background-color:white;">    
        <h5> Recent Real Estate Listings</h5>

        <!---  Sort --->
        <div class="row">
            <div class="col-sm-12 col-md-6">  
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Sort
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="propertysortbyprice.php">By Price</a></li>
                        <li><a href="index.php">By Date</a></li>
                        <li><a href="propertysortbypopularity.php">By Popularity</a></li>
                    </ul>
                </div>         
            </div>   
        <!--- Grid View ---->
        <div class="col-sm-12 col-md-6">
            <p style="text-align: right;"> 
                <a href="index.php">Grid View </a>
            </p>
        </div>
    </div>

    <!-- List View --->
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Picture</th>
            <th scope="col">Type</th>
            <th scope="col">Price</th>
            <th scope="col">Address</th>
            <th scope="col">Contact</th>
            <th scope="col">Listed Date</th>
            <th scope="col">More</th>
            </tr>
        </thead>
            
        <?php
            $q ="select * from prop_listing_tble WHERE published='1' ORDER BY date DESC limit 6";
            $query =mysqli_query($conn, $q);
            while($rows = mysqli_fetch_array($query)){
                ?>

                <?php
                    include 'listview.php'; 

                ?>

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

</body>
</html>

