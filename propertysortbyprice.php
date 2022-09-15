<?php
   //Connect the the database 
   require "../config.php";
?>
<?php
    $title ="Purnim Realty -Test";

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

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title ?> </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Vanukas, the leading Nepalese properties, houses, buy, sell house in Nepal, buy land in Nepal - commercial plots, lands and markets - villas - apartments - bungalows - home buying and villa rentals."/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <?php
        include "menu1.php";
    ?>
    <br>
    <?php
        include "menu2.php";
    ?> 
    <div class="row ">
            <div class="col" >
            <p>
                <?php 
                    include 'search.php';            
                ?>
            </p>
            </div>
    </div>   

    <!--- Recent list of Properties --->   
    <div class="row">
        <div class="col">        
            <h5> Recent Listings</h5>
        </div>
    </div>

    <!---  Sort --->
    <div class="row">
        <div class="col-sm-12 col-md-6">            
            <!--- Dropdown List -->
            <a  href="propertysortbyprice.php">Sort by price</a>
            <a  href="index.php">Sort by date</a>
            <a  href="propertysortbypopularity.php">Sort by popularity</a>           
        </div>   
 
        <!--- List View ---->
        <div class="col-sm-12 col-md-6">
            <p style="text-align: right;"> 
                <a href="propertylistview.php">List View </a>
            </p>
        </div>
        </div>
        
            <div class="row">
                    
                <?php
                    $q ="select * from prop_listing_tble WHERE published='1' ORDER BY price ASC limit 6";
                    $query =mysqli_query($conn, $q);
                    while($rows = mysqli_fetch_array($query)){
                        echo "<div class=\"col-sm-12 col-md-4\">";
                        
                        echo "<div class='modal-header rounded-1' style='background-color: gray;'> ".$rows['area']." ".strtoupper($rows['unit'])." ".strtoupper($rows['proptype'])." FOR ".strtoupper($rows['selltype'])." </div>";
                        ?>
                        
                        <!-- Display views and likes -->
                        <p style="text-align: right;">
                                <?php 
                                    $visitnumber=$rows['visitnumber']; 
                                    $likednumber=$rows['likednumber']; 
                                    if($visitnumber>0){
                                        echo "&nbsp;".$rows['visitnumber']. " views ";
                                    }
                                    if($likednumber>0){
                                        echo " &nbsp; <img src='like.png'></img> ".$rows['likednumber']. " likes ";
                                        echo " <br>";
                                    }
                                ?>  
                            </p>
                            <!-- ------------>

                        <form action="propertydetails.php" method = "POST">
                            <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>">
                            <button type="submit" class="btn btn-info" name = "detail"> <img src="purnim_logo1.png"></img> 
                            </button> 
                        </form> <br> 
                        
                        <form action="propertydetails.php" method = "POST">
                        <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>"> 
                            <?php
                                echo "Rs. ". $rows['price']." <br>";
                                echo $rows['city'].", ".$rows['district']."<br>";
                                echo "Contact: ".$rows['name']. "<br> Phone:  ".$rows['phone1']."<br>Email: ".$rows['email']."<br>";
                                echo "Listed Date: ".$rows['date']."<br>";
                                
                            ?>
                            <button type="submit" class="btn btn-info" name = "detail"> View more information
                            </button>
                            </button>
                        </form> 
                        <br>  
                        <?php
                      
                        echo "<hr></div> ";
                    }
                ?>
            </div>
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