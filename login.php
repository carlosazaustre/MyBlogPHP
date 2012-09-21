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
		<title><?php echo $tituloBlog ?></title>
		<link href="estilos/estilo.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="favicon.ico" />
		<script language="JavaScript" type="text/javascript" src="scripts/ajax.js"></script>
	</head>
	<body>
		<div id="container">
			<?php include "includes/header.php"; ?>
			<div id="main">
				<div>
				<?php
					$user = $_POST["usuario"];
					$pass = $_POST["pass"];
					
					$usuario = getUsuario($user, $pass);
					if($usuario != null)
					{
						$_SESSION['$login'] = true;
						$_SESSION['$nombre'] = $user;
						$_SESSION['$pass'] = $pass;
						echo "<b>Te has logueado correctamente!</b>";
					}
					else
					{
						echo "<span class='mensaje'>No existe el usuario o la contraseña es incorrecta</span>";
						echo "<p><a href='index.php'>Volver a Inicio</a></p>";
					}
				?>	
				</div>
			</div>
			<?php include "includes/sidebar.php" ?>
			<?php include "includes/footer.php" ?>
		</div>
	</body>
</html>






