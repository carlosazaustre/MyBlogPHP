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
		<title><?php echo $tituloBlog; ?></title>
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
				$comentario = $_POST['comentario'];
				$entrada = $_POST['idEntrada'];
				
				$autor = "anónimo";
				
				if($_SESSION['$login'] == true)
				{
					$autor = $_SESSION['$nombre'];
				}
				else
				{
					$nombre = $_POST['nombre'];
					$comentario = $comentario . "<br/><br /><i>" . $nombre . "</i>";
				}
				
				$query = mysql_query("INSERT INTO comentarios(id, autor, fecha, hora, entrada, texto) VALUES(0, '".$autor."', NOW(), NOW(), ".$entrada.", '".$comentario."');" );
				
				echo "<span><b>Comentario publicado con éxito</b><br/>";
				echo "<a href='post.php?id=" .$entrada. "'>Ver comentario publicado</a></span>";
				?>	
				</div>
			</div>
			<?php include "includes/sidebar.php" ?>
			<?php include "includes/footer.php" ?>
		</div>
	</body>
</html>