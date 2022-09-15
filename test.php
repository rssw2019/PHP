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

<?php
    //writing visitor's log

    $myfile = fopen("visitorslog.php", "a") or die("Unable to open file!");
    $ip_add = $_SERVER['REMOTE_ADDR'];
    $current_time=time(); //timestamp
    $hour = date('H');
    //user location data
    $data=unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
    $geoplugin_ip_address = $data["geoplugin_request"];
    $geoplugin_city = $data["geoplugin_city"];
    $geoplugin_region = $data["geoplugin_region"];
    $geoplugin_countryName = $data["geoplugin_countryName"];
    $geoplugin_continentName = $data["geoplugin_continentName"];
    $geoplugin_latitude = $data["geoplugin_latitude"];
    $geoplugin_longitude = $data["geoplugin_longitude"];

    fwrite($myfile, date("m/d/Y H:i:s", $current_time)."-");
    fwrite($myfile, $geoplugin_city.", ".$geoplugin_countryName. ", ip address: ".$ip_add."<br>"); 
    
    fclose($myfile);

?> 

<body style="background-color:cream;">
    <div class="container">
        <?php
            include "menu1.php";
        ?>
 
    </div>
    
    <div class="container">
            <?php
            //include "menu2.php";
            ?> 
    </div>
    <div class="container">
        <a href="https://www-purnimonline-com.translate.goog/realty/index.php?_x_tr_sl=auto&_x_tr_tl=ne&_x_tr_hl=en-US&_x_tr_pto=wapp"> नेपाली भाषामा </a>
    </div>

    <div class="container">
        <div class="row">    
            <div class="col-sm-12 col-md-12">
                <?php 
                    include 'search.php';           
                ?>
            </div>
    
            <!-- Banner Picture Slider begins-->
            
    
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active img-fluid">
                    <img src="kathmandu1.png" class="d-block w-100" height="300px" alt="...">
                </div>
                <div class="carousel-item img-fluid">
                    <img src="pokhara1.png" class="d-block w-100" height="300px"  alt="...">
                </div>
                <div class="carousel-item img-fluid">
                    <img src="chitwan1.png" class="d-block w-100" height="300px" alt="...">
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
    <!-- Banner Picture Slider ends->
    
    <!--- Recent list of Properties --->   
    <div class="row">
    
    <div class="container">
       <!---  Sorting dropdown Menu div begins--->
       <br>
       
       <!--Main row begins-->
       <div class="row">
           <!--left news div begins-->
           <div class="col-sm-12 col-md-4">
               <div class="card">
                  <div class="card-body">
                      <h5> Job Opening !</h5>
                      <p class="card-text">
                          We are currently taking applications for real estate agents from all major cities of Nepal. This is a commissionWe  based job and you can earn as much as you work. You will need to have basic internet skills. College students and recent college graduates are encouraged to apply. We will provide you trainings required for this job. If you are interested in joining our team, please email us your short bio-data/resume at contactus@purnimonline.com or send us message to our Facebook messenger.
                      </p>
                      <p class="card-text">
                          <h5>जागिरको अवसर !</h5>
                            हामी हाल नेपालका सबै प्रमुख शहरहरूबाट घर जग्गा एजेन्टहरूको लागि आवेदन लिइरहेका छौं। यो कमिशनमा आधारित काम हो र तपाईले काम गरे जति कमाउन सक्नुहुन्छ। तपाईंसँग आधारभूत इन्टरनेट सीपहरू हुन आवश्यक छ। कलेज विद्यार्थीहरू र भर्खरका कलेज स्नातकहरूलाई आवेदन दिन प्रोत्साहित गरिन्छ। हामी तपाईंलाई यो कामको लागि आवश्यक तालिमहरू प्रदान गर्नेछौं। यदि तपाइँ हाम्रो टोलीमा सामेल हुन इच्छुक हुनुहुन्छ भने, कृपया हामीलाई contactus@purnimonline.com मा तपाइँको छोटो बायोडेटा/रिजुमे इमेल गर्नुहोस् वा हामीलाई हाम्रो फेसबुक मेसेन्जरमा सन्देश पठाउनुहोस्।होस्।ाउनुहोस्।
                      </p>
                  </div>
              </div> 
           </div>
           <!--left news div ends-->
           
           <!--right property listing div begins-->
           <div class="col-sm-12 col-md-8">
              
        <div class="row">
            
            <h5> Selected Recent Real Estate Listings</h5>
            
            <!--Sorting dropdown button DIV begins-->
            <div class="col-sm-12 col-md-6">  
                <div class="dropdown">
                    <button class="btn btn-warning dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Sort
                     
                    </button>
                    <ul class="dropdown-menu">
                        <li> </li><a href="index.php?sortby=price&sorttype=0">Sort By Price </a><br>
                        <li> <a href="index.php?sortby=days&sorttype=0">Sort By Date </a><br>
                        <li> <a href="index.php?sortby=likednumber&sorttype=1">Sort By Rating </a>
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
        
        <!--Data part begins -->
        <?php
           //Get data from top menu
            if(isset($_GET['databasecol'])){
                $databasecol=$_GET['databasecol'];
                $filterby=$_GET['filterby'];
                $filter="where ".$databasecol." = "."'$filterby'";
            }
        //echo $filter;
        ?>
        <?php 
            //get data from the middle menu
            if(isset($_GET['databasecol1'])){
                $databasecol1=$_GET['databasecol1'];
                $filterby1=$_GET['filterby1'];
                $databasecol2=$_GET['databasecol2'];
                $filterby2=$_GET['filterby2'];
                $filter="where ".$databasecol1." = "."'$filterby1'"." and ".$databasecol2." ="."'$filterby2'";
            }
        //echo $filter;
        ?>
        
        <?php 
            //get data from the middle menu
            if(isset($_GET['citysearchsubmit'])){
                $databasecol="city";
                $filterby=$_GET['city'];
                $filter="where ".$databasecol." = "."'$filterby'";
            }
        //echo $filter;
        ?>
        
        <?php
        //sql querry to get data from the mysql database
            //$prop_querry="select status, date, id, selltype, proptype, name, email, phone1, phone2, district, city, area, unit, price, visitnumber, likednumber from prop_listing_tble ".$filter." limit 50";
            $prop_querry="select status, date, id, selltype, proptype, name, email, phone1, phone2, district, city, area, unit, price, visitnumber, likednumber from prop_listing_tble limit 50";
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
                <form action="propertydetails.php" method = "POST">
                <td> 
                
                <input type="hidden" name ="id"  value ="<?php echo $prop_array[$i]['id']; ?>">
                <button type="link" class="btn btn-outline-primary btn-sm" name = "detail"> <img src="purnim_logo1.png" alt="Property Image" class="h-15 d-inline-block" style="width: 100px;"></img>
                <!--</button> -->
                <?php
                echo "<td> <b>Rs. ".$prop_array[$i]['price']."</b></td>";
                echo "<td>".$prop_array[$i]['area']." ".$prop_array[$i]['unit']." ".$prop_array[$i]['proptype']." for ".$prop_array[$i]['selltype']. " in ".$prop_array[$i]['city'].", ".$prop_array[$i]['district']. " ";
                echo "</td>";
                echo "<td>".$prop_array[$i]['days']. " days ago</td>";
                echo "<td> <span style=\"color:blue;\">".$prop_array[$i]['visitnumber']. " views ".$prop_array[$i]['likednumber']. " likes </span>";
                                
                echo "</button></form></tr>";
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
                    <div class="col-sm-12 col-md-6">  
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
    </div>
</div>
<!--Main row ends-->
        <p>
            <?php
                include '../footer.php';
            ?>
        </p>
    </div>
</div>

</body>
</html>


    
