<?php
// mySQLi or PDO 
//connect to database
	$conn = mysqli_connect('localhost','root','abc123','ninja_pizza');
	
	//check connection_aborted
	if(!$conn){
	echo 'Connection error:'.mysqli_connect_error();	
	}
?>