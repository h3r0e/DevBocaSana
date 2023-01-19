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
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	
	<title>HOME</title>
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
		<li class="cta"><a href="close.php">CERRAR SESIÓN</a></li>
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
<br><br><br><br><br><br><br><br><br><br>

<div class="padre">
<?php
if(isset($_POST['login_user'])){
$_SESSION['login_user'] = $_POST['login_user'];
echo "Bienvenido! Has iniciado sesion como:<b> ".$_POST['login_user']."</b>";
}else{
if(isset($_SESSION['login_user'])){
echo "Has iniciado sesion como: ".$_SESSION['login_user'];
}else{
	// Si la sesion expiro o no se creo  mostraremos el siguiente mensaje
echo "Acceso Restringido";
header("location: login.php");
}
}
?>
</div>

<br/><br/>
<div class="padre">
	<section>
			<table border="2">
				<tr>
					<th>DNI_PACIENTE</th>
					<th>NOMBRE_APELLIDO</th>
					<th>DESCRIPCION</th>
					<th>FECHA_CITA</th>
					<th>HORA_CITA</th>
				</tr>
				
				<?php
				
				/*SORT PARA ORDENADR CRONOLÓGICAMENTE*/
				$registro = $mysql->query("SELECT P.dni_paciente, P.nombre_apellido,A.descripcion_cita, A.fecha_cita, A.hora_cita
				FROM pacientes P 
				INNER JOIN agenda A ON A.dni_paciente = P.dni_paciente
				WHERE P.dni_paciente=A.dni_paciente
				ORDER BY A.fecha_cita ASC") or
				die($mysql->error);
		
				while ($fila=$registro->fetch_array())
				{
					
					echo '
					<tr>
					<td>'.$fila['dni_paciente'].'</td>
					<td>'.$fila['nombre_apellido'].'</td>
					<td>'.$fila['descripcion_cita'].'</td>
					<td>'.$fila['fecha_cita'].'</td>
					<td>'.$fila['hora_cita'].'</td>
					</tr>
					';
				} 

				?>
				
			</table>
		</section>
		</div>

<form action="eliminar_cita.php" method="post">
	
	<br><br>

	<form method="post" action="insertar_agenda.php">
		<div><br/>
			<label>DNI PACIENTE</label>
			<div>
				<input type="text" class="campos" name="DNI_PACIENTE" placeholder="DNI PACIENTE" required />
			</div>
		</div>
		<br/><br/>
		
		<div><br/>
			<label>FECHA</label>
			<div>
				<input type="date" class="campos" name="FECHA_CITA" placeholder="FECHA" required />
			</div>
		</div>
		<br/><br/>
		
		<div><br/>
			
			<label for="HORA_CITA">HORA:</label>
			<div>
				
			<select name="HORA_CITA" id="HORA_CITA" class="campos" required >
			<option value="08:00">08:00</option>
			<option value="08:30">08:30</option>
			<option value="09:00">09:00</option>
			<option value="09:30">09:30</option>
			<option value="10:00">10:00</option>
			<option value="10:30">10:30</option>
			<option value="11:00">11:00</option>
			<option value="11:30">11:30</option>
			<option value="12:00">12:00</option>
			<option value="12:30">12:30</option>
			<option value="13:00">13:00</option>
			<option value="13:30">13:30</option>
			<option value="14:00">14:00</option>
			<option value="14:30">14:30</option>
			<option value="17:00">17:00</option>
			<option value="17:30">17:30</option>
			<option value="18:00">18:00</option>
			<option value="18:30">18:30</option>
			<option value="19:00">19:00</option>
			<option value="19:30">19:30</option>
			<option value="20:00">20:00</option>
			<option value="20:30">20:30</option>
			</select>
			
			</div>
		</div>
		
		<div id="b_reset"><br/>
			<input class="boton" type="reset"/>
		</div>
		<div id="b_submit"><br/>
			<input class="boton" type="submit"/>
		</div>
	</form>
	
  </form>
  </div>
</body>
</html>