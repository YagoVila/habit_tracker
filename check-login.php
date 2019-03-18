<?php
session_start();
?>

<!doctype html>
<html lang="es">
	<head>
		<title>Check Login and create session</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		
			<?php
			// Connection info. file
			include 'database.php';	
			
			// data sent from form login.html 
			$usuario = $_POST['username']; 
			$password = $_POST['password'];
			
			// Query sent to database
			$result = mysqli_query($conn, "SELECT nombre_usuario, password FROM Usuarios WHERE nombre_usuario = '$usuario'");
			
			// Variable $row hold the result of the query
			$row = mysqli_fetch_assoc($result);
			
			// Variable $hash hold the password hash on database
			$hash = password_hash($password, PASSWORD_BCRYPT);
//			if ($hash == $row['password']){
			if (password_verify($password, $row['password']) ){
			echo "todo okey"; } else {echo "mal"; echo "<br>Pass introducida: " . $hash . "<br>Pass gardada: " . $row['password'];}
			
			/* 
			password_Verify() function verify if the password entered by the user
			match the password hash on the database. If everything is OK the session
			is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
			*/
			if (password_verify($_POST['password'], $hash)) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $row['username'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;						
				
				echo "<div class='alert alert-success mt-4' role='alert'><strong>Welcome!</strong> $row[username]			
				<p><a href='edit-profile.php'>Edit Profile</a></p>
				<p><a href='rexistro.php'> Tus Habitos </a></p>	
				<p><a href='logout.php'>Logout</a></p></div>";	
			
			} else {
				echo "<div class='alert alert-danger mt-4' role='alert'>User or Password are incorrects!
				<p><a href='login.html'><strong>Please try again!</strong></a></p></div>";			
			}	
			?>





