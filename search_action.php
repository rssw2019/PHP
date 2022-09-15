<?php
   //Connect the the database 
   require "../config.php";
?>
<?php
    $title ="Purnim Realty -Search Result";
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
        <h5> Property Search Result</h5>

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
            <!--- List View ---->        
            <div class="col-sm-12 col-md-6">
                <p style="text-align: right;"> 
                    <a href="propertylistview.php">List View </a>
                </p>
            </div>
        </div>

    <!--Displaying Search Results --->
    <?php
        if(isset($_POST['submit'])){
            $rowCount=0;
            $user_minprice= $_POST['minprice'];
            $user_maxprice= $_POST['maxprice'];
            $user_district= $_POST['district'];
            $user_proptype= $_POST['proptype'];
            $user_selltype= $_POST['selltype'];
        if($user_minprice>=$user_maxprice){
            echo "The minimum price must be less than the maximum price. Please <a href=\"main.php\">search again</a>.";
        }
        else{

            $q ="select * from prop_listing_tble WHERE published='1' AND price >= '$user_minprice' AND price <= '$user_maxprice' AND district='$user_district' AND proptype= '$user_proptype' AND selltype= '$user_selltype' ORDER BY date DESC";
            
            $query =mysqli_query($conn, $q);
                
            $rowCount = mysqli_num_rows($query);

            if($rowCount>0){
                
                echo "<div class =\"card\">";
                echo "<div class=\"card-header\">";
                    echo "<b> Properties for ".$user_selltype." in ".$user_district." </b>";
                echo "</div>";
                echo "<br>";
                echo "<div class=\"row\">";
            
                while($rows = mysqli_fetch_array($query))
                {
                    ?>
                        <?php
                        if($rowCount<2){
                            echo "<p> We found ".$rowCount." record with your criteria.</p>";
                        }
                        else{
                            echo "<p> We found ".$rowCount." records with your criteria.</p>";
                        }
                            include 'gridview.php';
                        ?>
                    <?php   
                }
                echo "</div>";
            }
            else{
                echo "<p>There are no records with your criteria. Please modify your selections and <a href=\"main.php\">search again.</a>";
            }
                
        }
        }
 
    ?>

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

