<html>
<head>
	<title> Hábitos </title>
</head>
<body>
	
	<?php
		// Credenciales base de datos
		 $servername = "localhost";
		 $username = "alan";
		 $password = "turing";		
	
		//Crear conection MySQL
 		$conn =mysqli_connect($servername, $username, $password, "ENIGMA");	
	
		//Comprobar conexion, se falla mostrar erro
 		if (!$conn) {
 		die('<p>Fallou a conexión coa base de datos: </p>'. mysqli_connect_error());
 		}
 		echo '<p>Conexión OK!</p>';


		if(isset($_POST["nome"])){
			$insert = "INSERT INTO Habitos (Nome) VALUES ('" . $_POST["nome"] . "');";
			$result = mysqli_query($conn, $insert);
			echo $result;			
			echo"<p>Hábito " . $_POST["nome"] . " creado </p>";	
		}
	?>

<h1> Hábitos</h1>
	Hábito 1 <br>
	Hábito 2 <br>
	<form name="habito" method="post" action="/habitos.php">
		<input type="text" id="nome" name="nome">
		<button id="gardar" type="submit">Gardar</button>
	</form>
</body>
</html>
