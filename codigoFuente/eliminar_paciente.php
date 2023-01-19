<?php session_start();?>
<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<html>
<head>
	<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>RESULTADO PACIENTE</title>
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
    die("Problemas con la conexión a la base de datos");

	$registro = $mysql->query("select * from pacientes where DNI_PACIENTE='{$_POST["DNI_PACIENTE"]}'") or 
    die($mysql->error);
	$registro2 = $mysql->query("select * from agenda where DNI_PACIENTE='{$_POST["DNI_PACIENTE"]}'") or
    die($mysql->error);
	$registro3 = $mysql->query("select * from facturas where DNI_PACIENTE='{$_POST["DNI_PACIENTE"]}'") or 
    die($mysql->error);
	$registro4 = $mysql->query("select * from presupuestos where DNI_PACIENTE='{$_POST["DNI_PACIENTE"]}'") or
    die($mysql->error);

  if ($reg = $registro2->fetch_array()) {
    $mysql->query("delete from agenda where DNI_PACIENTE='{$_POST["DNI_PACIENTE"]}'") or
      die($mysql->error);
	echo '';
  } else
    echo '';
  if ($reg = $registro3->fetch_array()) {
	$mysql->query("delete from facturas where DNI_PACIENTE='{$_POST["DNI_PACIENTE"]}'") or
      die($mysql->error);
	echo '';
  } else
    echo '';
  if ($reg = $registro4->fetch_array()) {
	$mysql->query("delete from presupuestos where DNI_PACIENTE='{$_POST["DNI_PACIENTE"]}'") or
      die($mysql->error);
    echo '';
  } else
    echo '';
  if ($reg = $registro->fetch_array()) {
    $mysql->query("delete from pacientes where DNI_PACIENTE='{$_POST["DNI_PACIENTE"]}'") or
      die($mysql->error);
	echo 'ELIMINADO CORRECTAMENTE';
  } else
    echo 'NO EXISTE DICHO CODIGO';

  $mysql->close();
  ?>
</div>
</body>
</html>