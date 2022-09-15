
<?php
    // Sorting function by user choice $_GET['col']
    function sortByCol($x, $y) {
        return $x[$_GET['col']] - $y[$_GET['col']];
    }
    usort($prop_array, 'sortByCol');

    // echo "raw data <br>";
    // for ($i=0;$i<20;$i++){
    //     echo $prop_array[$i][$col]."<br>";
    // }
?>

<?php
    //total number of arrays in prop data
    $prop_array_length=count($prop_array);
?>

<!-- List View div starts --->
<div id="list_view" style="display:none;">
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

    for($i=0;$i<$prop_array_length;$i++){
        echo "<tr>";
        ?>
        <td> 
        <form action="propertydetails.php" method = "POST">
        <input type="hidden" name ="id"  value ="<?php echo $prop_array[$i]['id']; ?>">
        <button type="submit" class="btn btn-outline-primary btn-sm" name = "detail"> <img src="purnim_logo1.png" alt="Property Image" class="h-15 d-inline-block" style="width: 80px;"></img> 
        </button> 
        <?php
        echo "<td>".$prop_array[$i]['area']." ".$prop_array[$i]['unit']." ".$prop_array[$i]['proptype']." for ".$prop_array[$i]['selltype']."</td>";
        echo "<td>".$prop_array[$i]['price']."</td>";
        echo "<td>".$prop_array[$i]['city'].", ".$prop_array[$i]['district']." </td>";
        echo "<td>"."Contact: ".$prop_array[$i]['name'].", Phone: ".$prop_array[$i]['phone1'].", Email: ".$prop_array[$i]['email']." </td>";
        echo "<td>";
            //Calculating number of days :
                $difference = timeDiff($prop_array[$i]['date'],date("Y-m-d H:i:s"));
                $years = abs(floor($difference / 31536000));
                $days = abs(floor(($difference-($years * 31536000))/86400));
                $days =365*$years+$days;
                //echo $days;
                echo $days." days ago";
        echo "</td>";
        echo "<td".$prop_array[$i]['date']."</td>";
        echo "<td>";
            echo "<form action='propertydetails.php' method = 'POST'>";
            echo "<input type='hidden' name ='id'  value =".$prop_array[$i]['id'].">"; 
            echo "<button type='submit' class='btn btn-outline-primary bt-sm' name = 'detail'> View more information </button>";
            echo "</form>";
        echo "</td>";
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
                
                <!-- Card header div begins -->
                <div class="card-header">
                    <?php echo "<b>FOR ".strtoupper($prop_array[$i]['selltype'])."</b> -". $prop_array[$i]['area']." ".$prop_array[$i]['unit']." ".$prop_array[$i]['proptype']; ?>
                </div>
                <!-- Card header div ends -->
                
                <!-- Card body div begins -->
                <div class="card-body">
                    <p class="card-text">
                        <!-- Display views and likes -->
                        <span style="text-align: right; color:blue;">
                        <?php
                            echo $prop_array[$i]['visitnumber']. " view &nbsp;&nbsp;".$prop_array[$i]['likednumber']. " likes";
                                    echo " <br>";
                                    ?>  
                                </span>
                                
                                <!-- ------------>
                                <form action="propertydetails.php" method = "POST">
                                    <input type="hidden" name ="id"  value ="<?php echo $prop_array[$i]['id']; ?>">
                                    <button type="submit" class="btn btn-light btn-sm" name = "detail"> <img src="house1.png" width="250px"></img> 
                                    </button> 
                                </form> 
                                    
                                <form action="propertydetails.php" method = "POST">
                                    <input type="hidden" name ="id"  value ="<?php echo $prop_array[$i]['id']; ?>"> 
                                    <?php
                                    echo "<b> Price: Rs. ". $prop_array[$i]['price']." </b> <br>";
                                echo $prop_array[$i]['city'].", ",$prop_array[$i]['district']." <br>";
                                    echo "Contact: ".$prop_array[$i]['name']. "<br> Phone:  ".$prop_array[$i]['phone1']."<br>";
                                    //Usage :
                                    $difference = timeDiff($prop_array[$i]['date'],date("Y-m-d H:i:s"));
                                    $years = abs(floor($difference / 31536000));
                                    $days = abs(floor(($difference-($years * 31536000))/86400));
                                    $days =365*$years+$days;
                                    //echo $days;
                                    echo "Listed ".$days." days ago <br>";                                    
                                    ?>
                                    <button type="submit" class="btn btn-outline-primary btn-sm" name = "detail"> View more information
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
