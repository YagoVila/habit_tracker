<?php

	 
	 include './database.php';

	 $tbl_name = "Usuarios";
	  

	 $form_pass = $_POST['password'];
	 $hash = password_hash($form_pass, PASSWORD_BCRYPT);

	 $conn = new mysqli($servername, $username, $password, $database);

	 

	 if ($conn->connect_error) {

	 die("La conexion falló: " . $conn->connect_error);
	
	}	 

	 $buscarUsuario = "SELECT * FROM $tbl_name

	 WHERE nombre_usuario = '$_POST[username]' ";
	 
	 $result = $conn->query($buscarUsuario);
	 $count = mysqli_num_rows($result);
 
	 if ($count == 1) {
	 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";
	 echo "<a href='index.html'>Por favor escoga otro Nombre</a>";
	 }

	 else{

	 $query = "INSERT INTO Usuarios (nombre_usuario, password)
	           VALUES ('$_POST[username]', '$hash')";
	 if ($conn->query($query) === TRUE) { 
	 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
	 echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";
	 echo "<h5>" . "Hacer Login: " . "<a href='login.html'>Login</a>" . "</h5>";
	 }

	 else {
	 echo "Error al crear el usuario." . $query . "<br>" . $conn->error;
	   }

	 }
	 mysqli_close($conexion);
	?>
