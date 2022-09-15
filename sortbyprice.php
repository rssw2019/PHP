<?php
            //Convert MySQL Result Set to PHP Array
            $prop_array=array();
            while($row =mysqli_fetch_assoc($prop_data))
                {
                    $prop_array[] = $row;
                }
?>
<?php 
    //sorting functions
    //Order 2d array by increasing price
    usort($prop_array, function($a, $b) {return $a['price'] - $b['price'];});
?>