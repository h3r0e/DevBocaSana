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
	<title>MODIFICAR PACIENTE</title>
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
	
	$DNI_PACIENTE = $_GET['DNI_PACIENTE'];
	
	$sql = "SELECT * FROM pacientes WHERE DNI_PACIENTE = '$DNI_PACIENTE'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
		<div class="container">
			
			<form class="form-horizontal" method="POST" action="update_paciente.php" autocomplete="off">
				<div class="form-group">
					<label for="NOMBRE_APELLIDO" class="col-sm-2 control-label">NOMBRE_APELLIDO</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="NOMBRE_APELLIDO" name="NOMBRE_APELLIDO" placeholder="NOMBRE_APELLIDO" value="<?php echo $row['NOMBRE_APELLIDO']; ?>" required>
					</div>
				</div>
				
				<input type="hidden" id="DNI_PACIENTE" name="DNI_PACIENTE" value="<?php echo $row['DNI_PACIENTE']; ?>" />
				
				<div class="form-group">
					<label for="NACIONALIDAD" class="col-sm-2 control-label">NACIONALIDAD</label>
					<div class="col-sm-10">
						<input type="NACIONALIDAD" class="form-control" id="NACIONALIDAD" name="NACIONALIDAD" placeholder="NACIONALIDAD" value="<?php echo $row['NACIONALIDAD']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="DIRECCION" class="col-sm-2 control-label">DIRECCION</label>
					<div class="col-sm-10">
						<input type="DIRECCION" class="form-control" id="DIRECCION" name="DIRECCION" placeholder="DIRECCION" value="<?php echo $row['DIRECCION']; ?>"  required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="TELEFONO" class="col-sm-2 control-label">TELEFONO</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="TELEFONO" name="TELEFONO" placeholder="TELEFONO" value="<?php echo $row['TELEFONO']; ?>" >
					</div>
				</div>
				<br><br>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="pacientes2.php" class="btn btn-default">VOLVER</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>