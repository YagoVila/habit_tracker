<html>
<head>
	<title>Rexistro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
<body style="background-color:gray;">
	<?php
		include './database.php';

		// Crear novo rexistro (resposta a GET)
		if ( isset($_REQUEST['crear']) ) {
			$insertar = "INSERT INTO Rexistro (id_habito, dia, valor) VALUES (" . $_REQUEST['crear'] . ",'" . $_REQUEST['data'] . "',1);";
			$result = mysqli_query($conn, $insertar);
		}

		// Borrar rexistro
		if (isset($_REQUEST['borrar']) ) {
		$delete = "UPDATE Rexistro SET valor=0 WHERE id_habito=" . $_REQUEST['borrar'] . " AND dia='" . $_REQUEST['data'] . "';";
		$result = mysqli_query($conn, $delete);
		}

		//Modificar rexistro
		if (isset($_REQUEST['modificar']) ) {
		$modificar = "UPDATE Rexistro SET valor=1 WHERE id_habito=" . $_REQUEST['modificar'] . " AND dia='" . $_REQUEST['data'] . "';";
		$result = mysqli_query($conn, $modificar);
	}



		$lectura = "SELECT * FROM Habitos ORDER BY Nome;";
		$habitos = mysqli_query($conn, $lectura);
		$lerexistro = "SELECT * FROM Rexistro INNER JOIN Habitos ON Rexistro.id_habito = Habitos.ID WHERE Rexistro.dia >= CURDATE() - INTERVAL 4 DAY ORDER BY Habitos.Nome, Rexistro.dia;";
		$valores = mysqli_query($conn, $lerexistro);
	?>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Habit Tracker</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
		  <li class="nav-item">
		    <a class="nav-link" href="index.php">Home </a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="habitos.php">Hábitos</a>
		  </li>
		  <li class="nav-item active">
		    <a class="nav-link" href="rexistro.php">Rexistro</a>
		  </li>
		</ul>
	  </div>
	</nav>
	<table class="table table-bordered table-striped">
		<tr>
			<td></td>
			<?php
				$hoxe = mktime(0,0,0);
				$diasemana = array ("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
				$lunes = $hoxe-(date("N")-1)*24*60*60;
				for ($dias=0;$dias<7;$dias++) {
					echo "<td align=\"center\">" . $diasemana[$dias] . "</td>";
					$datas[] = date('Y-m-d', $lunes+$dias*24*60*60);
				}
			?>
		</tr>
		<?php
		$valor = mysqli_fetch_array($valores);
		while ($hab = mysqli_fetch_array($habitos)) {
		echo "<tr><td>" . $hab['Nome'] . "</td>";
		if ($valor['ID'] != $hab['ID']) {
		foreach ($datas as $data) {
		echo "<td align=\"center\"><a href=\"rexistro.php?crear=" . $hab['ID'] . "&data=" . $data . "\"><button type=\"button\" class=\"btn btn-info\"><i class=\"far fa-circle\"></i></button></a></td>";
		}
		} else {
		foreach ($datas as $data) {
		if (($valor['dia'] == $data) and ($valor['ID'] == $hab['ID'])) {
		if ($valor['valor'] == 0) {
		echo "<td align=\"center\"><a href=\"rexistro.php?modificar=" . $valor['ID'] . "&data=" . $valor['dia'] . "\">
	<button type=\"button\" class=\"btn btn-info\">
	<i class=\"far fa-times-circle\" style=\"color: red;\"></i></button></a></td>";
		} else {
		echo "<td align=\"center\"><a href=\"rexistro.php?borrar=" . $valor['ID'] . "&data=" . $valor['dia'] . "\">
	<button type=\"button\" class=\"btn btn-info\">
	<i class=\"far fa-check-circle\" style=\"color: green;\"></i></button></a></td>";
		}
		$valor = mysqli_fetch_array($valores);
		} else {
		echo "<td align=\"center\"><a href=\"rexistro.php?crear=" . $hab['ID'] . "&data=" . $data . "\"><button type=\"button\" class=\"btn btn-info\"><i class=\"far fa-circle\"></i></button></a></td>";
		}
		}
		}
		echo "</tr>";
	}
	?>
	</table>
</body>
</html>
