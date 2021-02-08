<?php
	include('config/db_connect.php');
	// write query for all pizza
	$sql='SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
	
	//make querry and get result
	$result=mysqli_query($conn, $sql);
	
	// fetch the resulting rows as an array
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	//close connection	
	mysqli_free_result($result);
	
	//close connection
	mysqli_close($conn);
	
	//print_r($pizzas);
?>
<!DOCTYPE html>
<html>
	<!--<?php include('sidenav.html');?> -->
	<?php include('add.php');?>
	<h3 > Pizzas! </h3>
	<?php   foreach($pizzas as $pizza){?>
		<h4><?php echo htmlspecialchars($pizza['title']); ?> </h4>
		<div>
			<table border="1">
			<?php foreach(explode(',',$pizza['ingredients']) as $ing){?>
			<tr><td><?php echo htmlspecialchars($ing); ?> </td></tr>
			<?php } ?>
			</table>
			</ul>
		</div>
		<div> 
			<a href="#">more info </a> 
		</div>
	<?php } ?>
</html>