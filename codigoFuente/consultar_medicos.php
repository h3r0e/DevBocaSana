<?php session_start();?>

<?php
$mysql = new mysqli("localhost", "root", "", "boca_sana");
  if ($mysql->connect_error)
  die("Problemas con la conexi?n a la base de datos");
?>

<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
	date_default_timezone_set('Europe/Madrid');
	$fecha_actual = date('d-m-Y');
?>

<html>
<head>
	<meta http-equiv=?Content-Type? content=?text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>RESULTADO MEDICO</title>
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
  $mysql = new mysqli("localhost", "root", "", "boca_sana");
  if ($mysql->connect_error)
    die("Problemas con la conexi?n a la base de datos");

	$registro = $mysql->query("select * from medicos where NOMBRE_APELLIDO='{$_POST["NOMBRE_APELLIDO"]}'") or 
    die($mysql->error);

  if ($reg = $registro->fetch_array()) {
    $mysql->query("select * from medicos where NOMBRE_APELLIDO='{$_POST["NOMBRE_APELLIDO"]}'") or
      die($mysql->error);
?>
	<tr>
		<td><?php echo "NOMBRE_APELLIDO= "; echo $reg['NOMBRE_APELLIDO'] ?></td><br/>
		<td><?php echo "ESPECIALIDAD= "; echo $reg['ESPECIALIDAD'] ?></td><br/>
		<td><?php echo "DIRECCION= "; echo $reg['DIRECCION'] ?></td><br/>
		<td><?php echo "TELEFONO= "; echo $reg['TELEFONO'] ?></td>
	</tr>
</html>
<?php		
  } else
    echo 'NO EXISTE DICHO ID';
	echo "<br>";

	if (empty($_POST['NOMBRE_APELLIDO'])) {
		echo "EL CAMPO A INGRESAR NO PUEDE QUEDAR VACIO, INGRESE NUMERO DE MEDICO"; 
	}

  $mysql->close();
?>
</div>
</body>
</html>