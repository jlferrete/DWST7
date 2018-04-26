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
	$nombreLibro = $_POST['nombreLibro'];
	$autor = $_POST['autor'];
	$isbn = $_POST['isbn'];
	$puntuacion = $_POST['puntuacion'];
	$genero = $_POST['genero'];
	
	//Realizamos la consulta que compara lo almacenado en la BD con lo enviado
	$sql = "SELECT * FROM libros WHERE isbn='".$isbn."';";
	//Generamos los resultados
	$result = mysqli_query($conexion, $sql);
	
	//Comprobación de lo que se genera por result
	
	/*echo ("<table border=1><th>Nombre libro</th><th>autor libro</th>");
	while ($fila = mysqli_fetch_array($result)){
		echo ("<tr><td>".$fila[1]."</td><td>".$fila[2]."</td></tr>");
	}
	echo ("</table>");*/
	
	if ($result->num_rows >0){
		
		echo("El ISBN que intenta introducir ya existe en la base de datos.<br/><br/>");
		echo("<a href='crear.html' class='button'>Volver a intentarlo</a>");
		
		
	} else {
		
		$create = "INSERT INTO libros VALUES (DEFAULT, '".$nombreLibro."', '".$autor."', '".$isbn."', '".$puntuacion."', '".$genero."')";

		if (mysqli_query($conexion, $create)) {
			echo "Nuevo registro añadido correctamente<br/><br/>";
			echo("<a href='crear.html' class='button'>Introducir otro libro</a>");
			
		}else{
			echo "Error: " . $create . "<br>" . mysqli_error($conexion);
		}	
	}	
	
	mysqli_close($conexion);
	
	?>	
	
</body>
</html>