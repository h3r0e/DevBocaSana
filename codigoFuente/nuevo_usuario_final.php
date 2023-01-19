<?php session_start();?>
<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
	date_default_timezone_set('Europe/Madrid');
	$fecha_actual = date('Y-m-d');
	$hora_actual = date("H:i:s");
?>

<html>
<head>
	<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>REGISTRO ACTUALIZADO</title>
</head>
<body align="center" style="background-color:#BAD2DB">
<div id= "formulario">
<header id="Header">
	<img src="css/imagen2.png" alt="" class="logo">
	<ul class="main-menu">
		<li class="cta"><a href="home.php">HOME</a></li>
		<style type="text/css">
			* {
				margin:0px;
				padding:0px;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
		</style>
		<ul class="nav">
			<li><a href="">|||</a></img>
				<ul>
					<li><a href="agenda.php">AGENDA</a></li>
					<li><a href="pacientes.php">PACIENTES</a></li>
					<li><a href="medicos.php">MEDICOS</a></li>
					<li><a href="tratamiento.php">TRATAMIENTOS</a></li>
					<li><a href="presupuestos.php">PRESUPUESTOS</a></li>
					<li><a href="facturas.php">FACTURAS</a></li>
				</ul>
			</li>
		</ul>
	</ul>
</header>
<br><br><br><br><br><br><br><br><br><br><br>

<?php
$link = mysqli_connect("localhost", "root", "", "boca_sana");
    if($link === false){
        die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
    }
$regexp = '/^[A-Za-z0-9]+$/i';
		
$usuario = mysqli_real_escape_string($link,$_POST['usuario']); 
$passwd = mysqli_real_escape_string($link,$_POST['passwd']); 

	$resultado = preg_match($regexp, $usuario);
	$resultado2 = preg_match($regexp, $passwd);

if(empty($usuario) || (empty($passwd))){
	echo "Campos usuario o contraseña vacíos. Vuelva a intentarlo.<br/>"; 	
	
	} elseif (!$resultado) {
	echo 'Usuario introducido incorrecto.<br/>';
	
		} elseif (!$resultado2){
		echo 'Contraseña introducida incorrecta.';
	}else { 
	
	$sql = "INSERT INTO login (usuario, passwd, fecha, hora) VALUES ('$usuario', '$passwd', '$fecha_actual', '$hora_actual')";
						
	}
	
	if(mysqli_query($link, $sql)){
				echo "INSERCION REALIZADA";
			} else {
				echo "El paciente introducido no existe.";
			}
	
    mysqli_close($link);
?>
</div>
</body>
</html>