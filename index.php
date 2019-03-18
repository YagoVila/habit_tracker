<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<font color=\"#053eaf\">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">Habit Tracker</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav">
		  <li class="nav-item">
		    <a class="nav-link" href="index.php">Home</a>
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
</head>

 
<body>
<body style="background-color:gray;">
	
     <h4>Bienvenido a tu página de Hábitos</h4>


	 <form action="registrar-usuario.php" method="post">
	 <hr/>
	 <h5>Crea una cuenta para empezar </h5>

	 <!--Nombre Usuario-->
	 <label for="nombre">Usuario:</label><br>
	 <input type="text" name="username" maxlength="32" required>
	 <br/><br/>
	 
	 <!--Password-->

	 <label for="pass">Password:</label><br>
	 <input type="password" name="password" maxlength="16" required>

	 <br/><br/>
	

	 <button> <input type="submit" name="submit" value="Registrarme"> </button>

	 <button> <input type="reset" name="clear" value="Borrar"> </button>
	 
	</form>

	<form action="login.html" method="post">
	 <button> <input type=\"button\" value="Login" href="login.html">  </button>
	</form>

</font>
</body>
</html>
