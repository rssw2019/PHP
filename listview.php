<tr>
    <td> 
        <form action="propertydetails.php" method = "POST">
        <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>">
        <button type="submit" class="btn btn-outline-primary btn-sm" name = "detail"> <img src="purnim_logo1.png" alt="Property Image" class="h-15 d-inline-block" style="width: 80px;"></img> 
        </button> 

    </form> 
    <td> <?php echo $rows['area']." ".$rows['unit']." ".$rows['proptype']." for ".$rows['selltype']." ";
    ?>
    </td>
    <td> <?php echo "Rs. ".$rows['price'];?></td>
    <td> <?php echo $rows['city'].", ".$rows['district'];?></td>
    <td> <?php echo $rows['name'].", Phone: ".$rows['phone1'].", Email: ".$rows['email'];?></td>
    <td> <?php echo $rows['date'];?></td>
    <td>                         
        <form action="propertydetails.php" method = "POST">
            <input type="hidden" name ="id"  value ="<?php echo $rows['id']; ?>"> 
            <button type="submit" class="btn btn-outline-primary btn-sm" name = "detail"> Detail
            </button>
        </form> 
    </td>
</tr>  