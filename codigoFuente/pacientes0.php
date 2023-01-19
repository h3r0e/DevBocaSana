<?php session_start();?>
<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<html>
<head>
	<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>INSERTAR-PACIENTE</title>
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
header("location: login.php");
}
}
?>			
	<form method="post" action="insertar_pacientes.php">
		<div><br/>
			<label>DNI PACIENTE</label>
			<div>
				<input type="text" class="campos" name="DNI_PACIENTE" placeholder="DNI PACIENTE" required />
			</div>
		</div>
				
		<div><br/>
			<label>NOMBRE Y APELLIDO</label>
			<div>
				<input type="text" class="campos" name="NOMBRE_APELLIDO" placeholder="NOMBRE-APELLIDO" required />
			</div>
		</div>
				
		<div><br/>
			<label>EDAD</label>
			<div>
				<input type="number" class="campos" name="EDAD" placeholder="EDAD" required />
			</div>
		</div>
				
		<div><br/>
			<label>NACIONALIDAD</label>
			<div>
				<input class="campos" name="NACIONALIDAD" placeholder="NACIONALIDAD" required />
			</div>
		</div>
				
		<div><br/>
			<label>DIRECCION</label>
			<div>
				<input class="campos" name="DIRECCION" placeholder="DIRECCION" required />
			</div>
		</div>
				
		<div><br/>
			<label>TELEFONO</label>
			<div>
				<input type="tel" class="campos" name="TELEFONO" maxlength="9" placeholder="TELEFONO" required />
			</div>
		</div>
				
		<div><br/>
			<label>FECHA DE NACIMIENTO</label>
			<div>
				<input type="date" class="campos" name="FECHA_NACIMIENTO" placeholder="FECHA" required />
			</div>
		</div>
				
		<div id="b_reset"><br/>
			<input class="boton" type="reset"/>
		</div>
		<div id="b_submit"><br/>
			<input class="boton" type="submit"/>
		</div>
	</form>
</div>
</body>
</html>