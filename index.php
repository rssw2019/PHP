<?php
	include('config/db_connect.php');
	// write query for all pizza
	$sql='SELECT email, title, ingredients, id FROM pizzas ORDER BY created_at';
	
	//make querry and get result
	$result=mysqli_query($conn, $sql);
	
	// fetch the resulting rows as an array
	$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	//close connection	
	mysqli_free_result($result);
	
	//close connection
	mysqli_close($conn);
	
	print_r($pizzas);
?>
<!DOCTYPE html>
<html>
	<!--<?php include('sidenav.html');?> -->
	<?php include('add.php');?>
	<h3 > Pizzas! </h3>
	<table border="1">
		<tr><th>Date</th><th>Email</th><th>Pizza Title</th><th>Ingredients</th></tr>
		<?php   foreach($pizzas as $pizza){?>
			<tr>
			<td><?php echo htmlspecialchars($pizza['id']); ?></td>
				<td><?php echo $pizza['email']; ?></td>
				<td><?php echo $pizza['title']; ?></td>
				<td><?php echo $pizza['ingredients']; ?></td>
			</tr>
		<?php } ?>
	</table>
	<a href="#">more info </a> 
</html>