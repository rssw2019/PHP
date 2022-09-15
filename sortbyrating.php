<?php
            //Convert MySQL Result Set to PHP Array
            $prop_array=array();
            while($row =mysqli_fetch_assoc($prop_data))
                {
                    $prop_array[] = $row;
                }
//Order 2d array by decreasing rating
    usort($prop_array, function($a, $b) {return $b['likednumber'] - $a['likednumber'];}); 
?>