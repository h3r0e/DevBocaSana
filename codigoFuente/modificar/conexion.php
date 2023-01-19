<?php
	
	$mysqli = new mysqli('localhost', 'root', '', 'boca_sana');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>