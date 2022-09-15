<div class="col-sm-12 col-md-4">                
    <div class="card">
        <div class="card-header">
            <b>FOR <?php echo strtoupper($rows['selltype']);?></b>
        </div>
        <div class="card-body">
                                 
            <!-- Display views and likes -->
            <span style="text-align: right; color:blue;">
                <?php 
                    $visitnumber=$rows['visitnumber']; 
                    $likednumber=$rows['likednumber']; 
                    if($visitnumber>0){
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rows['visitnumber']. " views";
                    }
                    if($likednumber>0){
                        echo "&nbsp;|&nbsp;".$rows['likednumber']. " likes";
                        echo " <br>";
                    }                                    
                ?>  
            </span>
            <p class="card-text">   
            <?php
                echo $rows['area']." ".strtoupper($rows['unit'])." ".strtoupper($rows['proptype']);
            ?>
            <!-- ------------>
            <form action="propertydetails.php" method = "POST">
                <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>">
                <button type="submit" class="btn btn-light btn-sm" name = "detail"> <img src="house1.png" width="250px"></img> 
                </button> 
            </form> 
                
            <form action="propertydetails.php" method = "POST">
                <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>"> 
                <?php
                echo "<b> Price: </b> Rs. ". $rows['price']." <br>";
                echo "Address: ".$rows['city'].", ".$rows['district']."<br>";
                echo "Contact: ".$rows['name']. "<br> Phone:  ".$rows['phone1']."<br>Email: ".$rows['email']."<br>";
                //Usage :
                $difference = timeDiff($rows['date'],date("Y-m-d H:i:s"));
                $years = abs(floor($difference / 31536000));
                $days = abs(floor(($difference-($years * 31536000))/86400));
                $days =365*$years+$days;
                //echo $days;
                echo "Listed ".$days." days ago <br>";                                    
                ?>
                <button type="submit" class="btn btn-outline-primary btn-sm" name = "detail"> View more information
                </button>
            </form>
        </div>
    </div>
    <br>
</div> 
<br>  