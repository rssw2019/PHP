<?php
//File name: searchresultbuyview.php
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
    if(isset($_GET['searchbuybydisctrictsubmit'])){
        $proptype=$_GET['proptype'];
        $district=$_GET['district'];
        $filter="where district = "."'$district'"." and proptype ="."'$proptype' and selltype='sale'";
        $searchtitle=$proptype." For Sale in ". $district;
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
//calculating average of the data array
$a=array(1,2,3,4,5);
echo max($a);
echo array_sum($a);
if($prop_array_length) {
    $average = array_sum($a)/$prop_array_length;
    echo "Average=".$average;
}

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
// Sorting function by user choice $_GET['col']
    if(isset($_GET['sorttype'])){
        $sorttype=$_GET['sorttype'];
        if($sorttype==0){
            $sort=SORT_ASC;
        }
        else{
           $sort=SORT_DESC; 
        }
        $columns = array_column($prop_array, $_GET['sortby']);
        array_multisort($columns, $sort, $prop_array);
        }
    else{
        $columns = array_column($prop_array, 'days');
        array_multisort($columns, SORT_ASC, $prop_array);
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
            include "menu2buy.php";
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

            <!---  Sorting dropdown Menu div begins--->
            <!--<div class="col-sm-12 col-md-6">  -->
            <!--    <div class="dropdown">-->
            <!--        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">-->
            <!--         Sort-->
                     
            <!--        </button>-->
            <!--        <ul class="dropdown-menu">-->
            <!--            <li> </li><a href="searchresltview.php?sortby=price&sorttype=0">Sort By Price </a><br>-->
            <!--            <li> <a href="searchresltview.php?sortby=days&sorttype=0">Sort By Date </a><br>-->
            <!--            <li> <a href="searchresltview.php?sortby=likednumber&sorttype=1">Sort By Rating </a>-->
            <!--        </ul>-->
            <!--    </div>         -->
            <!--</div> -->
            <!--sorting dropodown menu div ends-->
        

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
                    <button class="btn btn-link" onClick="gridViewButton()">Grid View</button>
                    <button class="btn btn-link" onClick="listViewButton()">List View 

                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <br>
        
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
        
        <!-- List View div starts --->
        <div id="list_view" style="display:none;">
            <br>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Picture</th>
                    <th scope="col">Type</th>
                    <th scope="col">Price</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Time</th>
                    <th scope="col"> Likes</th>
                    <th scope="col">More</th>
                    </tr>
                </thead>
                <?php
        
            for($i=0;$i<$prop_array_length;$i++){
                echo "<tr>";
                ?>
                <td> 
                <form action="propertydetails.php" method = "POST">
                <input type="hidden" name ="id"  value ="<?php echo $prop_array[$i]['id']; ?>">
                <button type="submit" class="btn btn-outline-primary btn-sm" name = "detail"> <img src="purnim_logo1.png" alt="Property Image" class="h-15 d-inline-block" style="width: 80px;"></img><br> <?php echo $prop_array[$i]['area']." ".$prop_array[$i]['unit']." ".$prop_array[$i]['proptype'];?>
                </button> 
                <?php
                echo "<td> For ".$prop_array[$i]['selltype']."</td>";
                echo "<td> <b>Rs. ".$prop_array[$i]['price']."</b></td>";
                echo "<td>".$prop_array[$i]['city'].", ".$prop_array[$i]['district']." </td>";
                echo "<td>".$prop_array[$i]['phone1']."</dt>";
                if($prop_array[$i]['days']<1){
                    echo "<td> Today </td>";
                }
                else{
                    echo "<td>".$prop_array[$i]['days']." days ago </td>";
                }
                echo "<td>".$prop_array[$i]['likednumber']."</td>";
                echo "<td>";
                    echo "<form action='propertydetails.php' method = 'POST'>";
                    echo "<input type='hidden' name ='id'  value =".$prop_array[$i]['id'].">"; 
                    echo "<button type='submit' class='btn btn-outline-primary bt-sm' name = 'detail'> More Information </button>";
                    echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
            </table>
        </div>
        <!-- List View div ends --->
                
        <!-- Grid view div begins -->
        <br>
        <div id="grid_view">
            <div class="row">
                <br>
                <?php 
                for ($i=0;$i<$prop_array_length;$i++){
                    ?>
                    <!-- Col div begins -->
                    <div class="col-sm-12 col-md-4">  
                    <!-- Card div begins -->
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                        
                        <!-- Card header div begins -->
                        <!--<div class="card-header">-->
                            <?php echo "<b>FOR ".strtoupper($prop_array[$i]['selltype'])."</b> - ". $prop_array[$i]['area']." ".$prop_array[$i]['unit']." ".$prop_array[$i]['proptype']."<br>";  ?>
                        <!--</div>-->
                        <!-- Card header div ends -->
                        
                        <!-- Card body div begins -->
                        
                            
                                <!-- Display views and likes -->
                                <?php
                                    echo "<td> Listed ".$prop_array[$i]['days']." days ago <br>";
                                    ?>
                                    <span style="text-align:right; color:blue;">
                                    <?php 
                                    echo $prop_array[$i]['visitnumber']. " views &nbsp;&nbsp;".$prop_array[$i]['likednumber']. " likes";
                                            echo " <br>";
                                            ?>  
                                        </span>
                                        
                                        
                                        <!-- ------------>
                                        <form action="propertydetails.php" method = "POST">
                                            <input type="hidden" name ="id"  value ="<?php echo $prop_array[$i]['id']; ?>">
                                            <button type="submit" class="btn btn-light btn-sm" name = "detail"> <img src="purnim_logo1.png" width="150px"></img> 
                                            </button> 
                                        </form> 
                                            
                                        <form action="propertydetails.php" method = "POST">
                                            <input type="hidden" name ="id"  value ="<?php echo $prop_array[$i]['id']; ?>"> 
                                            <?php
                                            echo "<b> Price: Rs. ". $prop_array[$i]['price']." </b> <br>";
                                        echo $prop_array[$i]['city'].", ",$prop_array[$i]['district']." <br>";
                                            echo "Contact: ".$prop_array[$i]['name']. "<br> Phone:  ".$prop_array[$i]['phone1']."<br>";
                                            ?>
                                            <button type="submit" class="btn btn-outline-primary btn-sm" name = "detail"> More information 
                                            </button>
                                        </form>
                            </p>
                        </div>
                        <!-- Card body div ends -->
                        
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


    
