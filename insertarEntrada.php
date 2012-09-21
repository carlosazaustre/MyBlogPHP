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
		<title><?php echo $tituloBlog." :: Insertar nueva entrada"; ?></title>
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
					$titulo = $_POST['titulo'];
					$texto = $_POST['texto'];
					$autor = $_SESSION['$nombre'];
					
					//Inserta la entrada
					$sql = "INSERT INTO entradas(id, titulo, autor, texto, fecha, hora) VALUES(NULL, '" . $titulo . "', '" . $autor . "', '" . $texto . "', NOW(), NOW());";
					mysql_query($sql);
					
					//Asocia las etiquetas la entrada insertada
					$id = getIdUltimaEntrada();
					foreach ($_POST['tag'] as $val)
					{
						$sql = "INSERT INTO entradas_etiquetas(entrada, etiqueta) VALUES(".$id.", '".$val."');";
						mysql_query($sql);
						echo "Etiqueta: ".$val."<br />";
					}

					echo "<b>Entrada insertada con éxito</b>";
				?>
				</div>
			</div>
			<?php include "includes/sidebar.php" ?>
			<?php include "includes/footer.php" ?>
		</div>
	</body>
</html>