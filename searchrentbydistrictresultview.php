<?php
//File name: searchresultrentview.php
?>

<?php
   //Connect the the database 
   require_once "../config.php";
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
<!--Data part begins -->
<?php
    //Title for the search result
    $searchtitle="";
?>

<?php 
    //get data from the searchrentbycity.php form
    if(isset($_GET['searchrentbydistrictsubmit'])){
        $renttype=$_GET['proptype'];
        $district=$_GET['district'];
        $filter="where district = "."'$district'"." and proptype ="."'$renttype' and selltype='rent'";
        $searchtitle=$renttype." For Rent in ". $district;
    }
//echo $filter;
?>
        

<?php
//sql querry to get data from the mysql database
    $prop_querry="select status, date, id, selltype, proptype, name, email, phone1, phone2, district, city, area, unit, price, visitnumber, likednumber from prop_listing_tble ".$filter;
    $prop_data=mysqli_query($conn,$prop_querry);

    //close the database connectin
    mysqli_close($conn);
?>
        
<?php
    //Convert MySQL Result Set to PHP Array
    $prop_array=array();
    while($row =mysqli_fetch_assoc($prop_data))
        {
            $prop_array[] = $row;
        }
        //print_r($prop_array);
 ?>
    
<?php
    //total number of arrays in prop data
    $prop_array_length=count($prop_array);
?>

<?php
//creating the day column
    for($i=0;$i<$prop_array_length;$i++){
        $difference = timeDiff($prop_array[$i]['date'],date("Y-m-d H:i:s"));
        $years = abs(floor($difference / 31536000));
        $days = abs(floor(($difference-($years * 31536000))/86400));
        $days =365*$years+$days;
        $prop_array[$i]['days']=$days;
    }
?>
    
<?php
    //sorting function
    $pricecol = array_column($prop_array, 'price');
    $dayscol = array_column($prop_array, 'days');
    $ratingcol = array_column($prop_array, 'likednumber');

    if(isset($_POST['sortbyprice'])) {
        array_multisort($pricecol, SORT_ASC, $prop_array);
    }
    if(isset($_POST['sortbydays'])) {
        array_multisort($dayscol, SORT_ASC, $prop_array);
    }
    if(isset($_POST['sortbyrating'])) {
        array_multisort($ratingcol, SORT_DESC, $prop_array);
    }
?>


<?php
//<html> tab and <head> tags
    include 'head.php';
?>

<body style="background-color:cream;">
    <div class="container">
        <?php
            include "menu1.php";
        ?>
        
    </div>
    
    <div class="container">
            <?php
            include "menu2rent.php";
            ?> 
    </div>

    <div class="container">
        <div class="row">    
            <div class="col-sm-12 col-md-12">
                <?php 
                    //include 'search.php';           
                ?>
            </div>
    
    <!--<div class="row">-->
    
    <div class="container">
                       <!---  Search Result Title--->
        <div class="row">
            <div class="container">
                <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-9 col-sm-12">
                            <p class="text-capitalize"><b> <?php echo $searchtitle; ?> </b></p>
                        </div>
                        <div class="col col-md-3 col-sm-12">
                            <span style="text-align:right;">
                    <p>
        <?php
            echo "<span class=\"box1\">".$prop_array_length." Listings </span>   ";
        ?>
        </p>

                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <br>
        
        <br>
        <!-- Writing stats -->
            <?php
                //calculating stats
                //generating price column
                $price_col=array();
                for($i=0;$i<$prop_array_length;$i++){
                    $price_col[]=$prop_array[$i]['price'];
                }
                
                $averageprice=array_sum($price_col)/$prop_array_length;
                $maxprice=max($price_col);
                $minprice=min($price_col);
            
            ?>
            
 
            <!--Sorting dropdown button DIV begins-->
        <div class="row">
            <div class="col-sm-12 col-md-6">  
                <div class="dropdown">
                    
                    <button class="btn btn-warning dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Sort
                    </button>
                    <ul class="dropdown-menu">
                        <form method="POST">
                            <li> <button type='link' class='btn btn-outline-primary bt-sm' name="sortbyprice">Sort by Price</button> 
                            <li> <button type='link' class='btn btn-outline-primary bt-sm' name="sortbydays">Sort by Date</button> 
                            <li> <button type='link' class='btn btn-outline-primary bt-sm' name="sortbyrating">Sort by Rating</button>
                        </form>
                    </ul>
                </div>         
            </div> 
            <!--sorting dropodown menu div ends-->
        
        <!--Toggle grid and list view div begins-->
        <div class="col-sm-12 col-md-6" style="text-align:right;"> 
            <span style="text-align:right;">
                <span id="grid_view_button" style="text-align:right;">
                    <button class="btn btn-primary btn-sm" onClick="gridViewButton()">Grid View</button>
                
                </span>
                <span id="list_view_button" style="text-align:right;">
                    <button class="btn btn-primary btn-sm" onClick="listViewButton()">List View</button>
                </span>
            </span>
        </div>
        </div>
        
            <script>
                function gridViewButton() {
                    document.getElementById("grid_view").style.display = "block";
                    document.getElementById("list_view").style.display = "none";
                    document.getElementById("grid_view_button").style.display = "none";
                    document.getElementById("list_view_button").style.display = "block";
                }
                function listViewButton() {
                    document.getElementById("grid_view").style.display = "none";
                    document.getElementById("list_view").style.display = "block";
                    document.getElementById("grid_view_button").style.display = "block";
                    document.getElementById("list_view_button").style.display = "none";
                }
            </script>
        </div>
        <!--Toggle grid and list view div ends-->
        
        <!--Displaying the total number of listing-->
        
        
        
        <br>

        <!-- List View div starts --->
        <div id="list_view" style="display:none;">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Address</th>
                    <th scope="col">Date</th>
                    <th scope="col">Views</th>
                    </tr>
                </thead>
                <?php
        
            for($i=0;$i<$prop_array_length;$i++){
                echo "<tr>";
                ?>
                <td> 
                <form action="propertydetails.php" method = "POST">
                <input type="hidden" name ="id"  value ="<?php echo $prop_array[$i]['id']; ?>">
                <button type="submit" class="btn btn-outline-primary btn-sm" name = "detail"> <img src="purnim_logo1.png" alt="Property Image" class="h-15 d-inline-block" style="width: 100px;"></img>
                </button> 
                <?php
                echo "<td> <b>Rs. ".$prop_array[$i]['price']."</b></td>";
                echo "<td>".$prop_array[$i]['area']." ".$prop_array[$i]['unit']." ".$prop_array[$i]['proptype']." for ".$prop_array[$i]['selltype']. " in ".$prop_array[$i]['city'].", ".$prop_array[$i]['district']. " ";
                //echo "<td>";
                    echo "<form action='propertydetails.php' method = 'POST'>";
                    echo "<input type='hidden' name ='id'  value =".$prop_array[$i]['id'].">"; 
                    echo "<button type='link' class='btn btn-primary bt-sm' name = 'detail'> see more </button>";
                    echo "</form>";
                echo "</td>";
                echo "<td>".$prop_array[$i]['days']. " days ago</td>";
                echo "<td> <span style=\"color:blue;\">".$prop_array[$i]['visitnumber']. " views ".$prop_array[$i]['likednumber']. " likes </span>";
                                
                echo "</tr>";
            }
            ?>
            </table>
        </div>
        <!-- List View div ends --->
                
        <!-- Grid view div begins -->
        <div id="grid_view">
            <div class="row">
                <?php 
                for ($i=0;$i<$prop_array_length;$i++){
                    ?>
                    <!-- Col div begins -->
                    <div class="col-sm-12 col-md-4">  
                    <!-- Card div begins -->
                    <div class="card">
                        <form action="propertydetails.php" method = "POST">
                            <input type="hidden" name ="id"  value ="<?php echo $prop_array[$i]['id']; ?>">
                            <button type="submit" class="btn btn-light btn-sm" name = "detail">
                                <!-- Property Image begins -->
                                <img src="purnim_logo1.png" class="card-img-top" alt="Property Image">
                                <!--<div class="img-fluid">-->
                                <!--    <img src="purnim_logo1.png" width="300px">-->
                                <!--    </img>-->
                                <!--</div>-->
                                <!-- Property Image ends --> 
                            </button> 
                        </form>
                        <div class="card-body">
                            <h5><?php echo "<b> Rs. ". $prop_array[$i]['price']." </b>"; ?></h5>
                            <p class="card-text">
                            <?php echo $prop_array[$i]['area']." ".$prop_array[$i]['unit']." ".$prop_array[$i]['proptype']; ?> - for <?php echo $prop_array[$i]['selltype']."</b>"; ?> <br>
                                <?php echo $prop_array[$i]['city'].", ",$prop_array[$i]['district'] ?> </b> <br>
                                Contact: <?php echo $prop_array[$i]['name']. " -  ".$prop_array[$i]['phone1'] ?> <br>
                                <?php echo "<td> Listed ".$prop_array[$i]['days']." days ago <br>";
                                ?>
                                <span style="color:blue;"> <?php echo $prop_array[$i]['visitnumber']. " views &nbsp;&nbsp;".$prop_array[$i]['likednumber']. " likes"; ?>
                                </span>
                                <form action="propertydetails.php" method = "POST">
                                    <input type="hidden" name ="id"  value ="<?php echo $prop_array[$i]['id']; ?>"> 
                                    <button type="submit" class="btn btn-outline-primary btn-sm" name = "detail"> More information 
                                    </button>
                                </form>
                            </p>
                        </div>
                    </div>
                    <!-- Card div ends -->
                    <br>
                </div>
                <!-- Col div begins -->
                                
            <?php
                }
            ?>
        </div>
    </div>
            <!-- Grid view div ends -->
        <p>
            <?php
                include '../footer.php';
            ?>
        </p>
    </div>
</div>

</body>
</html>
