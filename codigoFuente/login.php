<?php
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['usuario']);
      $mypassword = mysqli_real_escape_string($db,$_POST['passwd']); 
      
      $sql = "SELECT * FROM login WHERE usuario = '$myusername' and passwd = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: home.php");
      }else {
         $error = "LOGIN INCORRECTO";
      }
   }
?>

<html>
<head>
	<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>LOGIN</title>
</head>

<body style="background-color:#BAD2DB">
<div id="formulario">
<header id="Header">
	<img src="css/imagen2.png" alt="" class="logo">
</header>

<br><br><br><br><br><br><br><br><br>

  <form method="post">
	<p>
	<div id="circle"></div>
	<br><br><br>
	MEDICO: <br><input class= "campos" type = "text" name= "usuario"
	placeholder = "Introduzca su usuario." />
	</p>
	<br>
	<p>
	PASSWD: <br><input class= "campos" type = "password" name= "passwd"
	placeholder = "Introduzca su password." />
	</p>
	<br>
	<br>
    <div id="b_reset"> 
	<input class="boton" type="reset"/>
    </div>
	<div id="b_submit"> 
    <input class="boton" type="submit"/>
    </div>
  </form>
  </div>
</body>
</html>

