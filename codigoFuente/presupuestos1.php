<?php session_start();?>

<?php
$mysql = new mysqli("localhost", "root", "", "boca_sana");
  if ($mysql->connect_error)
  die("Problemas con la conexión a la base de datos");
?>

<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
	date_default_timezone_set('Europe/Madrid');
	$fecha_actual = date('d-m-Y');
?>
<html>
<head>
	<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>CONSULTAR-PRESUPUESTO</title>
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
<br><br>

	<div class="padre">
	<section>
			<table border="2">
				<tr>
					<th>ID_PRESUPUESTO</th>
				</tr>
				
				<?php
				
				$registro = $mysql->query("SELECT ID_PRESUPUESTO
				FROM presupuestos") or
				die($mysql->error);
		
				while ($fila=$registro->fetch_array())
				{
					
					echo '
					<tr>
					<td>'.$fila['ID_PRESUPUESTO'].'</td>
					</tr>
					';
				} 

				?>
				
			</table>
		</section>
		</div>


<form action="consultar_presupuestos.php" method="post">
	
	<br><br>
		<div><br/>
			<label>ID PRESUPUESTO</label>
			<div>
				<input type="text" class="campos" name="ID_PRESUPUESTO" placeholder="NUMERO PRESUPUESTO a CONSULTAR" required />
			</div>
		</div>
		
		<div class="padre">
		<div id="b_submit"><br/>
			<input class="boton" type="submit"/>
		</div>
		</div>

  </div>
</body>
</html>