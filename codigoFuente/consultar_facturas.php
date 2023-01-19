<?php session_start();?>
<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<html>
<head>
	<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>RESULTADO FACTURA</title>
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

	$registro = $mysql->query("select * from facturas where ID_FACTURA='{$_POST["ID_FACTURA"]}'") or
    die($mysql->error);

  if ($reg = $registro->fetch_array()) {
    $mysql->query("select * from facturas where ID_FACTURA='{$_POST["ID_FACTURA"]}'") or
      die($mysql->error);
?>
	<tr>
		<td><?php echo "DNI_PACIENTE= "; echo $reg['DNI_PACIENTE'] ?></td><br/>
		<td><?php echo "ID_PRESUPUESTO= "; echo $reg['ID_PRESUPUESTO'] ?></td><br/>
		<td><?php echo "SALDO= "; echo $reg['SALDO'] ?></td><br/>
		<td><?php echo "DEUDA_RESTANTE= "; echo $reg['DEUDA_RESTANTE'] ?></td><br/>
		<td><?php echo "FECHA= "; echo $reg['FECHA'] ?></td>
	</tr>
</html>
<?php		
  } else
    echo 'NO EXISTE DICHO ID';
	echo "<br>";

	if (empty($_POST['ID_FACTURA'])) {
		echo "EL CAMPO A INGRESAR NO PUEDE QUEDAR VACIO, INGRESE NUMERO DE FACTURA"; 
	}
	
  $mysql->close();
?>
</div>
</body>
</html>