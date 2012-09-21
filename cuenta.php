<?php
	session_start();
	include 'includes/funciones.php';
	$tiempo = microtime();
	$tiempo = explode(" ", $tiempo);
	$tiempo = $tiempo[1] + $tiempo[0];
	$tiempoinicial = $tiempo;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><?php echo $tituloBlog." :: Mi Cuenta"; ?></title>
		<link href="estilos/estilo.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="favicon.ico" />
		<script language="JavaScript" type="text/javascript" src="scripts/ajax.js"></script>
	</head>
	<body>
		<div id="container">
			<?php include "includes/header.php"; ?>
			<div id="main">
				<div>
				<h2>Mi Cuenta</h2>
				<?php
					$nombre = $_SESSION['$nombre'];
					$pass = $_SESSION['$pass'];
					
					$usuario = getUsuario($nombre, $pass);
					echo "<p>Hola " . $usuario->nombre . " " . $usuario->apellidos . ", ésta es tu información personal</p>";
					echo "<form method='post' action='actualizaPerfil.php' enctype='multipart/form-data'>";
					echo "<fieldset>";
					echo "<legend>Imagen de Perfil</legend>";
					echo "<img src='" .getURLImagen($nombre). "' alt='foto_perfil' /><br />";
					echo "<label for='foto'>Cambiar imagen: </label>";
					echo "<input type='file' name='foto' />";
					echo "<span class='postbottom'>La imagen no debe superar 1MB de tamaño</span>";
					echo "</fieldset>";
					echo "<br />";
					echo "<fieldset>";
					echo "<legend>Datos de Cuenta</legend>";
					echo "<label for='alias'>Nombre de usuario: </label>";
					echo "<input type='text' name='alias' value='" .$usuario->alias. "' />";
					echo "<label for='passOld'>Contraseña antigua: </label>";
					echo "<input type='password' name='passOld' />";
					echo "<label for='passNew'>Contraeña nueva: </label>";
					echo "<input type='password' name='passNew' />";
					echo "</fieldset>";
					echo "<br />";
					echo "<fieldset>";
					echo "<legend>Datos Personales</legend>";
					echo "<label for='nombre'>Nombre: </label>";
					echo "<input type='text' name='nombre' value='" .$usuario->nombre. "' />";
					echo "<label for='apellidos'>Apellidos: </label>";
					echo "<input type='text' name='apellidos' value='" .$usuario->apellidos. "' />";
					echo "<label for='email'>Correo Electrónico: </label>";
					echo "<input type='text' name='email' value='" .$usuario->email. "' />";
					echo "<label for='url'>Web: </label>";
					echo "<input type='text' name='url' value='" .$usuario->url. "' />";
					echo "<label for='fecha_nac'>Fecha de Nacimiento: </label>";
					echo "<input type='text' name='fecha_nac' value='" .$usuario->fecha_nac. "' />";
					echo "<label for='ciudad'>Ciudad: </label>";
					echo "<input type='text' name='ciudad' value='" .$usuario->ciudad. "' />";
					echo "</fieldset>";
					echo "<input type='submit' value='Modificar Datos' />";
					echo "</form>";
				?>
				</div>
			</div>
			<?php include "includes/sidebar.php" ?>
			<?php include "includes/footer.php" ?>
		</div>
	</body>
</html>