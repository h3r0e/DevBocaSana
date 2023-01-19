<?php session_start();?>
<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<html>
<head>
	<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
	<title>MODIFICAR AGENDA</title>
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
	
	$ID_CITA = $_GET['ID_CITA'];
	
	$sql = "SELECT * FROM agenda WHERE ID_CITA = '$ID_CITA'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
		<div class="container">
			
			<form class="form-horizontal" method="POST" action="update_agenda.php" autocomplete="off">
				<div class="form-group">
					<label for="DESCRIPCION_CITA" class="col-sm-2 control-label">DESCRIPCION</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="DESCRIPCION_CITA" name="DESCRIPCION_CITA" placeholder="DESCRIPCION_CITA" value="<?php echo $row['DESCRIPCION_CITA']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="ID_CITA" name="ID_CITA" value="<?php echo $row['ID_CITA']; ?>" />
				
				<div class="form-group">
					<label for="FECHA_CITA" class="col-sm-2 control-label">FECHA</label>
					<div class="col-sm-10">
						<input type="FECHA_CITA" class="form-control" id="FECHA_CITA" name="FECHA_CITA" placeholder="FECHA_CITA" value="<?php echo $row['FECHA_CITA']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="HORA_CITA" class="col-sm-2 control-label">HORA</label>
					<div class="col-sm-10">
						<input type="HORA_CITA" class="form-control" id="HORA_CITA" name="HORA_CITA" placeholder="HORA_CITA" value="<?php echo $row['HORA_CITA']; ?>"  required>
					</div>
				</div>
				
				<br><br>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="agenda2.php" class="btn btn-default">VOLVER</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>