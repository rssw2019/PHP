<?php
	include('config/db_connect.php');
	$title=$email=$ingredients='';
	$errors=array('email'=>'','title'=>'','ingredients'=>'');
	
	if(isset($_POST['submit'])){
		// check email
		if(empty($_POST['email'])){
			$errors['email']='An email is required <br />';
		}else{
			$email=$_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email']='email must be a valid email address';
			}
		}
	}
	
	// check title
	if(empty($_POST['title'])){
		$errors['title']='A title is required <br />';
	} else {
		$title =$_POST['title'];
		if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
			$errors['title']='Title must be letters and spaces only';
		}
	}
	// check email
	if(empty($_POST['ingredients'])){
		$errors['ingredients']='At least one ingredient is required <br />';
	}else{
		$ingredients=$_POST['ingredients'];
		if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
			$errors['ingredients']='Ingredients must be a comma separated list';
		}
	}
	if(array_filter($errors)){
		//echo 'errors in the form';
	}else{

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
		
		//create sql
		$sql ="INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')"; 
		
		//save to db_connect
		if(mysqli_query($conn, $sql)){
			// success
			echo 'success';
		}else{
			//error 
			echo 'query error: '.mysqli_error($conn);
		}
		//echo 'form is valid';
	}
	//end of post check
	?>
	
	<!DOCTYPE html>
	<html>
	<h3> Add a Pizza</h3>
	<form action="index.php" method="POST">
	<label> Your Email: </label>
	<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
	<div><?php echo $errors['email']; ?> </div>
	<label> Pizza Title: </label>
	<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
	<label> Ingredients (comma separated): </label>
	<input type ="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
	<div> <?php echo $errors['ingredients']; ?></div>
	<div>
	<p>
		<input type="submit" name="submit" value="submit">
		</p>
	</div>
	</form>
	
	
	</html>
	