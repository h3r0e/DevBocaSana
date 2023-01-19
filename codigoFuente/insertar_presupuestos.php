<?php session_start();?>

<?php
    $link = mysqli_connect("localhost", "root", "", "boca_sana");
    if($link === false){
        die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
    }
?>

<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
	date_default_timezone_set('Europe/Madrid');
	$fecha_actual = date('Y-m-d');
?>
<html>
<head>
	<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>RESULTADO PRESUPUESTO</title>
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
if(isset($_POST['login_user'])){
$_SESSION['login_user'] = $_POST['login_user'];
echo "Bienvenido! Has iniciado sesion como:<b> ".$_POST['login_user']."</b>";
}else{
if(isset($_SESSION['login_user'])){
echo "";
}else{
echo "Acceso Restringido";
header("location: login.php");
}
}
?>
<?php   
$ID_PRESUPUESTO = mysqli_real_escape_string($link,$_POST["ID_PRESUPUESTO"]);
$ID_TRATAMIENTO = mysqli_real_escape_string($link,$_POST["ID_TRATAMIENTO"]);
$DNI_PACIENTE = mysqli_real_escape_string($link,$_POST["DNI_PACIENTE"]);
$MEDICO_NOMBRE = mysqli_real_escape_string($link,$_POST["MEDICO_NOMBRE"]);
$DEUDA = mysqli_real_escape_string($link,$_POST["DEUDA"]);
$FECHA = mysqli_real_escape_string($link,$_POST["FECHA"]);
$HORA = mysqli_real_escape_string($link,$_POST["HORA"]);
 
	$dni=$_POST["DNI_PACIENTE"];

$formato=preg_match('/[0-9]{7,8}[A-Z]/', $dni);
    if ($formato == 1)
    {
        echo '';
    }
    else
    {
        echo 'El formato del DNI introducido es incorrecto.';
		header("location: presupuestos0.php");
		mysqli_close($link);
    }
	
	$DEUDA=$_POST["DEUDA"];

$formato=preg_match('/[0-9]/', $DEUDA);
    if ($formato == 1)
    {
        echo '';
    }
    else
    {
        echo 'El formato del DEUDA introducido es incorrecto.';
		header("location: presupuestos0.php");
		mysqli_close($link);
    }
	
	$sql = "
	INSERT INTO presupuestos (ID_PRESUPUESTO, ID_TRATAMIENTO, DNI_PACIENTE, MEDICO_NOMBRE, DEUDA, FECHA, HORA) 
    SELECT '".$_POST["ID_PRESUPUESTO"]."','".$_POST["ID_TRATAMIENTO"]."','".$_POST["DNI_PACIENTE"]."','".$_POST["MEDICO_NOMBRE"]."','".$_POST["DEUDA"]."','".$_POST["FECHA"]."','".$_POST["HORA"]."'";
								
			if(mysqli_query($link, $sql)){
				echo "INSERCION REALIZADA";
			} else {
				echo "Ya existe el presupuesto o algunos de los siguientes campos: DNI del PACIENTE, NUMERO del TRATAMIENTO, NOMBRE del MEDICO.";
			}
	mysqli_close($link);		
?>

</div>
</body>
</html>