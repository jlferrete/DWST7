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
	$puntuacion = $_POST['puntuacion'];
	//En función del parametro que recibimos, generamos una sentencia sql
	
	if($puntuacion=='*'){
		
	$sql = "SELECT * FROM libros;";	
	}else{
	$sql = "SELECT * FROM libros WHERE puntuacion='".$puntuacion."';";	
	}	
	
	//Generamos los resultados
	$result = mysqli_query($conexion, $sql);
	
	//Comprobación de lo que se genera por result
	
	echo("<h1>Libros en la base de datos</h1>");
	echo ("<table border=1><th>Título</th><th>Autor</th><th>ISBN</th><th>Puntuación</th><th>Género</th>");
	while ($fila = mysqli_fetch_array($result)){
		echo ("<tr><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td></tr>");
	}
	echo ("</table><br/><br/>");
	echo ("<a href='consultar.html' class='button'>Hacer otra consulta</a>");
	
	mysqli_close($conexion);
	
	?>	
	
</body>
</html>