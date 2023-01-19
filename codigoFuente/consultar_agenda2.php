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
	<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" href="css/style.css">
	<title>FILTRAR CITA POR FECHA</title>
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
		<ul class="nav">
			<li><a href="">|||</a></img>
				<ul>
					<li><a href="agenda.php">AGENDA</a></li>
					<li><a href="pacientes.php">PACIENTES</a></li>
					<li><a href="medicos.php">MEDICOS</a></li>
					<li><a href="tratamiento.php">TRATAMIENTOS</a></li>
					<li><a href="presupuestos.php">PRESUPUESTOS</a></li>
					<li><a href="facturas.php">FACTURAS</a></li>
					<li><a href="close.php">CERRAR SESIÓN</a></li>
				</ul>
			</li>
		</ul>
	</ul>
</header>

<br><br><br><br><br><br><br><br><br>
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
	<div class="padre">
		<section>
			<table border="2">
				<tr>
					<th>DNI_PACIENTE</th>
					<th>NOMBRE_APELLIDO</th>
					<th>FECHA_CITA</th>
					<th>HORA_CITA</th>
				</tr>
				
<?php
				$fecha_cita= mysqli_real_escape_string($mysql, $_POST["FECHA_CITA"]);
				
				$registro = $mysql->query("SELECT P.dni_paciente, P.nombre_apellido, A.fecha_cita, A.hora_cita
				FROM pacientes P 
				INNER JOIN agenda A ON A.dni_paciente = P.dni_paciente
				WHERE A.fecha_cita='$fecha_cita'
				ORDER BY A.fecha_cita ASC") or
				die($mysql->error);
				
				if ($registro->num_rows == 0){
					echo "No se han asignado citas en esa fecha.";
				} else {
				while ($fila=$registro->fetch_array())			
				{
					echo '
					<tr>
					<td>'.$fila['dni_paciente'].'</td>
					<td>'.$fila['nombre_apellido'].'</td>
					<td>'.$fila['fecha_cita'].'</td>
					<td>'.$fila['hora_cita'].'</td>
					</tr>
					';
				}	
			}
				?>
					</div>
					</table>				
		</section>
	</body>
</html>