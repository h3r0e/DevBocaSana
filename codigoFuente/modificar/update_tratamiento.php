<?php session_start();?>
<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<html>
<head>
	<meta http-equiv=�Content-Type� content=�text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<title>RESULTADO TRATAMIENTOS</title>
</head>

<body style="background-color:#BAD2DB">
<div id= "formulario">
<header id="Header">
	<img src="css/imagen2.png" alt="" class="logo">
	<ul class="main-menu">
		<li class="cta"><a href="../home.php">HOME</a></li>
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
					<li><a href="../agenda.php">AGENDA</a></li>
					<li><a href="../pacientes.php">PACIENTES</a></li>
					<li><a href="../medicos.php">MEDICOS</a></li>
					<li><a href="../tratamiento.php">TRATAMIENTOS</a></li>
					<li><a href="../presupuestos.php">PRESUPUESTOS</a></li>
					<li><a href="../facturas.php">FACTURAS</a></li>
				</ul>
			</li>
		</ul>
	</ul>
</header>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
if(isset($_POST['login_user'])){
$_SESSION['login_user'] = $_POST['login_user'];
echo "Bienvenido! Has iniciado sesion como:<b> ".$_POST['login_user']."</b>";
}else{
if(isset($_SESSION['login_user'])){
echo "";
}else{
echo "Acceso Restringido";
header("location: ../login.php");
}
}
?>
<?php
	
	require 'conexion.php';

	$ID_TRATAMIENTO = $_POST['ID_TRATAMIENTO'];
	$NOMBRE_TRATAMIENTO = $_POST['NOMBRE_TRATAMIENTO'];
	$COSTE = $_POST['COSTE'];
	
	$sql = "UPDATE tratamientos SET NOMBRE_TRATAMIENTO='$NOMBRE_TRATAMIENTO', COSTE='$COSTE' WHERE ID_TRATAMIENTO = '$ID_TRATAMIENTO'";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3>REGISTRO MODIFICADO</h3>
				<?php } else { ?>
				<h3>ERROR AL MODIFICAR</h3>
				<?php } ?>
				
				
				</div>
			</div>
		</div>
	</body>
</html>