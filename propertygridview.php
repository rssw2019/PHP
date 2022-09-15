                        <?php
                        echo "<div class=\"col-sm-12 col-md-4\">";                        
                        echo "<div class='modal-header rounded-1' style='background-color: lightgray;'> ".$rows['area']." ".strtoupper($rows['unit'])." ".strtoupper($rows['proptype'])." FOR ".strtoupper($rows['selltype'])." </div>";
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
                        ?>