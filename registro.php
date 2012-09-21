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
				$antispam = $_POST['antispam'];
				$antispam_gen = $_POST['antispam_gen'];
				if($antispam != $antispam_gen)
				{
					echo "<span class='mensaje'>La casilla antispam no es correcta</span>";
				}
				else
				{
					// datos personales
					$nombre = $_POST['nombre'];
					$apellidos = $_POST['apellidos'];
					$email = $_POST['email'];
					$url = $_POST['url'];
					$fecha_nac = $_POST['fecha_nac'];
					$ciudad = $_POST['ciudad'];
					$alias = $_POST['alias'];
					$pass = $_POST['pass'];
					
					mysql_query("INSERT INTO usuarios VALUES('".$nombre."','".$apellidos."','".$alias."','".$pass."','".$fecha_nac."','".$ciudad."','".$email."','".$url."','lector','fotos/nofoto.gif')");
		
					//Foto de perfil
					$tamaño =  $_FILES['foto']['size'];
					$tipo = $_FILES['foto']['type'];
					$archivo = $_FILES['foto']['name'];
					$prefijo = substr(md5(uniqid(rand())),0,6);
					
					if($tamaño < 1048576)
					{
						if($archivo != "")
						{
							//guarda el archivo
							$destino = "fotos/".$prefijo."_".$archivo;
							if(copy($_FILES['foto']['tmp_name'], $destino))
							{
								mysql_query("UPDATE usuarios SET foto='".$destino."' WHERE alias='".$_SESSION['$nombre']."';");
								$status = "<br /><span>Archivo subido correctamente</span>";
							}
							else
							{
							$status = "<span>Error al subir el archivo</span>";
							}
						}
						else
						{
							$status = "<span>No se ha modificado la imagen de perfil</span>";
						}
					}
					else
					{
						echo "<span class='mensaje'><b>ERROR:</b> La imagen debe ocupar menos de <b>1MB</b></span>";
					}
					
					echo "<b>Registro con éxito!</b><br/><br />";
					echo "<a href='cuenta.php'>Ir a mi cuenta</a><br />";
					echo "<a href='index.php'>Volver a inicio</a>";
				}
				?>
			</div>
			</div>
			<?php include "includes/sidebar.php" ?>
			<?php include "includes/footer.php" ?>
		</div>
	</body>
</html>