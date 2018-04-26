<!doctype html>
<html lang="ES">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
	a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;
	padding: 5px;
    text-decoration: none;
    color: initial;
	}
	</style>
</head>
<body>
	
	<?php
	
	session_start();

	// Generamos variables para almacenar los datos de conexión y acceder más facilmente a ellos
	$host_db = "localhost";
	$user_db = "phpUser";
	$pass_db = "Studium2017;";
	$db_name = "libreria";
	//Creamos la conexión por parametros
	$conexion = mysqli_connect("localhost", "phpUser", "Studium2017;", "libreria");
	
	//Controlamos los errores de conexión y la finalizamos falla 
	if (!$conexion) {
    die("La conexión ha fallado: " . mysqli_connect_error());
	}
	
	//Recuperamos los datos enviados a traves del formulario
	$username = $_POST['username'];
	$password = $_POST['password'];
	//Realizamos la consulta que compara lo almacenado en la BD con lo enviado
	$sql = "SELECT * FROM usuarios WHERE nombreusuario='".$username."';";
	//Generamos los resultados
	$result = mysqli_query($conexion, $sql);
	
	//Comprobación de lo que se genera por result
	
	/*echo ("<table border=1><th>Nombre usuario</th><th>Pass usuario</th>");
	while ($fila = mysqli_fetch_array($result)){
		echo ("<tr><td>".$fila[1]."</td><td>".$fila[2]."</td></tr>");
	}
	echo ("</table>"); */
	
	$fila = mysqli_fetch_array($result);
				
	/*Corregido según especificaciones del feedback:
	Solo comprobación de la contraseña. Mensaje de error: contraseña incorrecta.
	No necesario el while: Única llamada a mysqli_fetch_array.
	*/
	
	if ($fila[2]==$password){
		$_SESSION['username'] = $username;
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (3600);
		echo "¡Hola, " .$_SESSION['username']."!.";
		echo "<br/><br/><a href=crear.html class='button'>Creación de registros</a>";
		echo "<br/><br/><a href=consultar.html class='button'>Consulta de registros</a>";
	}else{
		echo ("La contraseña introducida es incorrecta. <br/><br/>");
		echo ("<a href='login.html' class='button'>Volver a intentarlo</a>");
	}
			
	mysqli_close($conexion);
	
	?>	
	
</body>
</html>