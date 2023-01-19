<?php session_start();?>
<?php
$mysql = new mysqli("localhost", "root", "", "boca_sana");
  if ($mysql->connect_error)
  die("Problemas con la conexión a la base de datos");
?>

<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
?>

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	
	<title>HOME</title>
</head>
	
<body style="background-color:#BAD2DB">
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
		<li class="cta"><a href="close.php">CERRAR SESIÓN</a></li>
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
<br><br><br><br><br><br><br><br><br><br>

<div class="padre">
<?php
if(isset($_POST['login_user'])){
$_SESSION['login_user'] = $_POST['login_user'];
echo "Bienvenido! Has iniciado sesion como:<b> ".$_POST['login_user']."</b>";
}else{
if(isset($_SESSION['login_user'])){
echo "Has iniciado sesion como: ".$_SESSION['login_user'];
}else{
	// Si la sesion expiro o no se creo  mostraremos el siguiente mensaje
echo "Acceso Restringido";
header("location: login.php");
}
}
?>
</div>
<form action="modificar_agenda.php" method="post">
	
	<br><br><br>
	
	Ingrese NUMERO de CITA:<br>
	<input class= "campos" type = "text" name= "DNI_PACIENTE" placeholder = "NUMERO de CITA"/>	
	<br><br><br><hr /><br><br><br>
	Ingrese DNI del PACIENTE:<br>
	<input class= "campos" type = "text" name= "DNI_PACIENTE" placeholder = "Ingrese DNI del paciente a MODIFICAR"/>	
	<br><br><br>
	Ingrese nueva DESCRIPCION:<br>
	<input class= "campos" type = "text" name= "DESCRIPCION_CITA" placeholder = "Ingrese DESCRIPCION a MODIFICAR"/>	
	<br><br><br>
	Ingrese nueva FECHA:<br>
	<input class= "campos" type = "date" name= "FECHA"/>	
	<br><br><br>
	Ingrese nueva HORA:<br>
	<input class= "campos" type = "time" name= "HORA"/>	
	<br><br><br>
    <input class="boton" type="submit"/>
	
  </form>
  </div>
</body>
</html>