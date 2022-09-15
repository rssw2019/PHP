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

<?php
    include 'head.php';
?>

<body>
    <div class="container">
        <?php
            include "menu1.php";
        ?>
    </div>
    <br>

    <div class="container">
            <?php
            include "search.php";
            ?> 
    </div>
    </div>
    
    <div class="container">
        <br>
        
        <?php 
        // collecting data from the user
            $statusvalue =  htmlspecialchars($_POST['status']);
            $id =  htmlspecialchars($_POST['id']);
    
            $sql = "SELECT * FROM prop_listing_tble WHERE id=$id";
            ?>
            <div class ="row">
                <?php
                $query =mysqli_query($conn, $sql);
                while($rows = mysqli_fetch_array($query)){
                    ?>
                    
    
                    <div class="col-sm-12 col-md-6" >
                        <div class="card">
                            <div class="card-header">
                                <?php
                                
                                    echo $rows['area']." ".strtoupper($rows['unit'])." ".strtoupper($rows['proptype'])." FOR ".strtoupper($rows['selltype'])."<br>";
                                ?> 
                            </div>
                        </div>
                        
        
                        <!-- Display views and likes -->
                        <p>
                            <?php 
                                $visitnumber=$rows['visitnumber']; 
                                $likednumber=$rows['likednumber']; 
                                if($visitnumber>0){
                                    echo " <span style=\"color:blue;\"> &nbsp;".$rows['visitnumber']. " views ";
                                }
                                if($likednumber>0){
                                    echo " &nbsp;  ".$rows['likednumber']. " likes ";
                                    echo " <br> </span>";
                                }
                            ?>  
                        </p>
                        <!-- ---Left Image begins--------->
                        <!-- Banner Picture Slider begins-->

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active img-fluid">
                    <img src='<?php echo "images/purnim/".htmlspecialchars($rows['image1']); ?>' class="d-block w-100" height="300px" alt="Image1">
                </div>
                <div class="carousel-item img-fluid">
                    <img src='<?php echo "images/purnim/".htmlspecialchars($rows['image2']); ?>' class="d-block w-100" height="300px"  alt="Image2">
                </div>
                <div class="carousel-item img-fluid">
                    <img src='<?php echo "images/purnim/".htmlspecialchars($rows['image3']); ?>' class="d-block w-100" height="300px" alt="Image3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    <!-- Banner Picture Slider ends-->
 
                        <form action="propertylikes.php" method = "POST">
                            <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>">
                            <br>
                            <!--<img src="like.png"></img></img>-->
                            <button type="submit" class="btn btn-info my-2" name = "detail"> Like it
                            </button>
                        </form>
            
        </div>
        <!--Left col Div ends-->
                    
                    <!-- Righ side div starts -->
                    <div class="col-sm-12 col-md-6" >
                        <div class="card">
                            <div class="card-header">
                                <h5> Details </h5>  
                            </div>
                        </div>
                        <b> Property ID:</b>
                        <?php echo $rows['id']; ?>
                        <br>
                        <b>Posted Date:</b>
                        
                        <?php echo $rows['date']; ?>
                        <p>
                            <?php if($rows['selltype']=="rent"){
                                ?>
                                <p> <span class="box1">
                                <b>Price: </b> Rs. 
                                <?php echo $rows['price']; ?> per month
                                </span></p>
                            <?php 
                            } 
                            else{
                            ?>
                            <p><span class="box1">
                        <b>Price: </b> Rs. 
                        <?php echo $rows['price']; ?>
                        </span></p>
                        <?php 
                            }
                            ?>
                        <b>Property Type: </b>
                        <?php echo $rows['proptype']; ?>
                        <br>
                        
                        <b>Transaction Type:</b> 
                        <?php echo $rows['selltype']; ?>
                        <br>
                        <b>Size:</b> 
                        <?php echo $rows['area']. " ".$rows['unit']; ?>
                        <hr>
                
                        <h5>Property Address:</h5>
                        <b>District:</b> 
                        <?php echo $rows['district']; ?>
                        <br>
                        <b>Municipality:</b>
                        <?php echo $rows['vdc']; ?>
                        <br>
                        <b>Ward Number:</b>
                        <?php echo $rows['ward']; ?>
                        <br>
                        <b>City:</b>
                        <?php echo $rows['city']; ?>
                        <br>
                            
                        <b>Additional Information: </b>
                        <?php echo $rows['message']; ?>
                        <hr>
                        
                        <h5> Contact Information </h5>
                        <b>Name:</b>
                            <?php echo $rows['name']; ?>
                        <br>
                        <b>Email Address:</b>
                        <?php echo $rows['email']; ?>
                        <br>
                        <b>Mobile Phone: </b>
                        <?php echo $rows['phone1']; ?>
                        <br>
                        <b>Landline Phone:</b> 
                        <?php echo $rows['phone2']; ?>
                        <hr>
    
                        <?php
                        $updated_visitnumber=$rows['visitnumber']+1;
                        //echo "new visit number = ".$updated_visitnumber;
                        //echo "Number of likes = ".$$rows['likenumber'];
    
                        //updating the number of visits
                        $sql_visitnumber = "UPDATE prop_listing_tble SET visitnumber='$updated_visitnumber' WHERE id=$id";
                    
                        if(!mysqli_query($conn, $sql_visitnumber)){
                            echo "Your request cannot be processed at this time. ". mysqli_error($conn);
                        }
                }
                ?>
                
            <!--Property details question begins        -->
            <div class="card ">
                    
                <div class="card-body">
                    <p class ="card-body-text">
                        <span class="box1">Ask a Question About This Property</h</span>
                        <form id="contact" action ="prop_detail_message_action.php"  method = "POST"> 
                        <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value ="<?php echo $id; ?>">
                            </div>
                            <div class="form-group my-2">
                                <input placeholder="Name" type="text" class="form-control" id="name" name ="name" required>
                            </div>
                
                            <div class="form-group my-2">
                                <input placeholder="Email" type="email" class="form-control" id="email" name ="email" required>
                            </div>
                
                            <div class="form-group my-2">
                                <input placeholder="Phone Number" type="text" class="form-control" id="phone" name ="phone" >
                            </div>
                            
                            <div class="form-group my-2">
                                <input placeholder="Subject" type="text" class="form-control" id="subject" name ="subject" >
                            </div>
                
                            <div class="form-group my-2">
                                <textarea name="message" id="message" class="form-control" placeholder="Please type your question here..." required></textarea>
                            </div>
                
                            <p> 
                                <button type="submit" class="btn btn-primary my-2" name = "submit"> Submit 
                                </button> 
                            </p>
                        </form>
                    </p>
                </div>
            </div>
            <!--Property details question ends        -->
                    
            </div>
            <!--// Righ side div ends-->

              <hr>
        <div class="container">
              <h5> Comments</h5>
              
             <?php
             //echo "Recent Comments";
                $sql_comments="select * from prop_message_tble where prop_id=$id";
                $msg_data =mysqli_query($conn, $sql_comments);
                
                //Convert MySQL Result Set to PHP Array
                $msg_array=array();
                while($rows =mysqli_fetch_assoc($msg_data))
                    {
                        $msg_array[] = $rows;
                    }
                    //print_r($prop_array);
             ?>
        
            <?php
                //total number of arrays in prop data
                $msg_array_length=count($msg_array);
                echo "<p class=\"box1\">".$msg_array_length." comments</p>";
            ?>
        
            <?php
            //creating the day column
                for($i=0;$i<$$msg_array_length;$i++){
                    $difference = timeDiff($msg_array[$i]['date'],date("Y-m-d H:i:s"));
                    $years = abs(floor($difference / 31536000));
                    $days = abs(floor(($difference-($years * 31536000))/86400));
                    $days =365*$years+$days;
                    $msg_array[$i]['days']=$days;
                }
                
                for($i=0;$i<$msg_array_length;$i++){
                    if($msg_array[$i]['days']<1){
                       $message_time="today"; 
                    }
                    else{
                        $message_time=$msg_array[$i]['days']." ago";
                    }
                    ?>
                    <div class="row my-2">
                        <!--User name-->
                        <div class="col-sm-12 col-md-1">
                          <?php
                            echo "<b>".$msg_array[$i]['name'].":</b><br>"; 
                            echo $message_time;
                        ?>
                        </div>
                        <!--User Question-->
                        <div class="col-sm-12 col-md-11">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">
                                    <?php 
                                        echo $msg_array[$i]['message'];
                                    ?>
                                    </p>
                                </div>
                            </div>
                            <?php 
                            if(is_null($msg_array[$i]['reply'])){
                                echo "";
                            }
                            else{
                            echo "<p class=\"my-1\"><b> Purnim Realty: </b> ".$msg_array[$i]['reply']."</p>";
                            }
                            ?>
                        </div>
                    </div>
              <?php
                }
            
            ?>
            
            </div>
            </div>
            <br>
        <?php
            include '../footer.php';
        ?>
        
            
        </div>

    
    </div>
    <br>


</body>
</html>

