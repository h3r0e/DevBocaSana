<?php session_start();?>
<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
?>

<html>
<head>
	<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>REGISTRO ACTUALIZADO</title>
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
$link = mysqli_connect("localhost", "root", "", "boca_sana");
    if($link === false){
        die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
    }

$usuario = mysqli_real_escape_string($link,$_POST['usuario']); 
$passwd = mysqli_real_escape_string($link,$_POST['passwd']); 

$registro = $link->query("SELECT usuario, passwd
				FROM login
				WHERE usuario != '$usuario' AND passwd = '$passwd'") or
				die($link->error);
	
	$registro2 = $link->query("SELECT usuario, passwd
				FROM login
				WHERE usuario='$usuario' AND passwd = '$passwd'") or
				die($link->error);

if(empty($usuario))
	{
		echo "Campos usuario vacío. Vuelva a intentarlo.<br/>";
	} elseif ($registro2->num_rows == 0){
		echo "La contraseña es erronea.<br/>";
	}
	
if(empty($passwd))
	{
		echo " Campo contraseña vacío. Vuelva a intentarlo. <br/>";
	} elseif($registro->num_rows == 0){
		echo " La contraseña es erronea.";
	}
	
	$date = date('Y-m-d');
			
if ($registro2->num_rows == 1){
					header("location: nuevo_usuario.php");
				} 						
	
    mysqli_close($link);
?>
</div>
</body>
</html>