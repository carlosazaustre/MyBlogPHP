<?php
	include 'clases/entrada.php';
	include 'clases/usuario.php';
	include 'clases/comentario.php';
	include 'clases/etiqueta.php';
	include 'conexiones/conectar.php';
	
	function GetEntradas($inId, $inicio, $registros)
	{
		if(!empty ($inId))
		{
			$query = mysql_query("SELECT * FROM entradas WHERE id = " . $inId . ";");
		}
		else if (!empty($inicio) || !empty($registros))
		{
			$query = mysql_query("SELECT * FROM entradas ORDER BY fecha DESC, hora DESC LIMIT ".$inicio.", ".$registros.";");
		}
		else
		{
			$query = mysql_query("SELECT * FROM entradas ORDER BY fecha DESC, hora DESC");
		}
		
		$arrayEntradas = array();
		while($row = mysql_fetch_assoc($query))
		{
			$myPost = new Entrada($row['id'], $row['titulo'], $row['texto'], $row['autor'], $row['fecha'], $row['hora']);
			array_push($arrayEntradas, $myPost);
		}
		return $arrayEntradas;
	}
	
	function GetEntradasPorEtiqueta($inEtiqueta)
	{
		$query = mysql_query("SELECT * FROM entradas WHERE id IN (SELECT entrada FROM entradas_etiquetas WHERE etiqueta = '".$inEtiqueta."')");
		$arrayEntradas = array();
		while($row = mysql_fetch_assoc($query))
		{
			$myPost = new Entrada($row['id'], $row['titulo'], $row['texto'], $row['autor'], $row['fecha'], $row['hora']);
			array_push($arrayEntradas, $myPost);
		}
		return $arrayEntradas;
	}
	
	function GetEntradasPorFecha($inAnho, $inMes)
	{
		$sql = "SELECT * FROM entradas WHERE fecha LIKE '".$inAnho."-".$inMes."-__';";
		$query = mysql_query($sql);
		$arrayEntradas = array();
		while($row = mysql_fetch_assoc($query))
		{
			$myPost = new Entrada($row['id'], $row['titulo'], $row['texto'], $row['autor'], $row['fecha'], $row['hora']);
			array_push($arrayEntradas, $myPost);
		}
		return $arrayEntradas;
	}
	
	function getIdUltimaEntrada()
	{
		$query = mysql_query("SELECT MAX(id) FROM entradas");
		$row = mysql_fetch_row($query);
		return $row[0];
	}
	
	function GetComentarios($inId)
	{
		$query = mysql_query("SELECT * FROM comentarios WHERE entrada = " . $inId . " ORDER BY fecha ASC;");
		
		$arrayComentarios = array();
		while($row = mysql_fetch_assoc($query))
		{
			$comentario = new Comentario($row['id'], $row['autor'], $row['fecha'], $row['hora'], $row['entrada'], $row['texto']);
			array_push($arrayComentarios, $comentario);
		}
		return $arrayComentarios;
	}
	
	function GetNumComentarios($inId)
	{
		$query = mysql_query("SELECT COUNT(id) FROM comentarios WHERE entrada = " . $inId . ";");
		$row = mysql_fetch_row($query);
		return $row[0];
	}
	
	function getFecha($inFecha)
	{
		$query  = mysql_query("SELECT DAYOFWEEK('" . $inFecha . "');");
		$row = mysql_fetch_row($query);
		switch($row[0])
		{
			case 1:
				$diaSemana = "Domingo";
				break;
			case 2:
				$diaSemana = "Lunes";
				break;
			case 3:
				$diaSemana = "Martes";
				break;
			case 4:
				$diaSemana = "Miércoles";
				break;
			case 5:
				$diaSemana = "Jueves";
				break;
			case 6:
				$diaSemana = "Viernes";
				break;
			case 7:
				$diaSemana = "Sábado";
				break;
			default:
				break;
		}
		$splitDate = explode("-", $inFecha);
		$mes = "";
		switch($splitDate[1])
		{
			case 1:
				$mes = "Enero";
				break;
			case 2:
				$mes = "Febrero";
				break;
			case 3:
				$mes = "Marzo";
				break;
			case 4:
				$mes = "Abril";
				break;
			case 5:
				$mes = "Mayo";
				break;
			case 6:
				$mes = "Junio";
				break;
			case 7:
				$mes = "Julio";
				break;
			case 8:
				$mes = "Agosto";
				break;
			case 9:
				$mes = "Septiembre";
				break;
			case 10:
				$mes = "Octubre";
				break;
			case 11:
				$mes = "Noviembre";
				break;
			case 12:
				$mes = "Diciembre";
				break;
			default:
				break;
		}
		$fechaResultado = $diaSemana . ", " . $splitDate[2] . " de " . $mes . " de " . $splitDate[0];
		return $fechaResultado;
	}
	
	function MesLetra($inMes)
	{
		if($inMes < 10)
		{
			$inMes = "0".$inMes;
		}
		switch($inMes)
		{
			case 1:
				$mes = "Enero";
				break;
			case 2:
				$mes = "Febrero";
				break;
			case 3:
				$mes = "Marzo";
				break;
			case 4:
				$mes = "Abril";
				break;
			case 5:
				$mes = "Mayo";
				break;
			case 6:
				$mes = "Junio";
				break;
			case 7:
				$mes = "Julio";
				break;
			case 8:
				$mes = "Agosto";
				break;
			case 9:
				$mes = "Septiembre";
				break;
			case 10:
				$mes = "Octubre";
				break;
			case 11:
				$mes = "Noviembre";
				break;
			case 12:
				$mes = "Diciembre";
				break;
			default:
				break;
		}
		return $mes;
	}
	
	function getHora($inHora)
	{
		$query =  mysql_query("SELECT HOUR('" . $inHora . "');");
		$row = mysql_fetch_row($query);
		$hora = $row[0];
		$query = mysql_query("SELECT MINUTE('" . $inHora . "');");
		$row = mysql_fetch_row($query);
		$minuto = $row[0];
		$horaMinuto = $hora . ":" . $minuto;
		return $horaMinuto;
	}
	
	function getUsuario($inAlias, $inPassword)
	{
		$query = mysql_query("SELECT password FROM usuarios WHERE alias = '" . $inAlias . "';");
		$row = mysql_fetch_row($query);
		$passwordDB = $row[0];
		
		echo $paswordDB;
		
		if($passwordDB == $inPassword)
		{
			$query = mysql_query("SELECT * FROM usuarios WHERE alias = '" . $inAlias . "';");
			$row = mysql_fetch_row($query);
			$myUsuario = new Usuario($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
			return $myUsuario;
		}
		else
		{
			return null;
		}
	}
	
	function getPerfilUsuario($inAlias)
	{
		$query = mysql_query("SELECT perfil FROM usuarios WHERE alias = '".$inAlias."';");
		$row = mysql_fetch_row($query);
		return $row[0];
	}
	
	function getURLImagen($inAlias)
	{
		$query = mysql_query("SELECT foto FROM usuarios WHERE alias = '" . $inAlias . "'");
		$row = mysql_fetch_row($query);
		return $row[0];
	}
	
	function getURLautor($inAlias)
	{
		$query = mysql_query("SELECT url FROM usuarios WHERE alias = '" .$inAlias. "';");
		$row = mysql_fetch_row($query);
		return $row[0];
	}
	
	function getPerfil()
	{
		$query = mysql_query("SELECT * FROM usuarios WHERE perfil = 'autor';");
		$arrayAutores = array();
		while($row = mysql_fetch_assoc($query))
		{
			$myAutor = new Usuario($row['nombre'], $row['apellidos'], $row['alias'], $row['password'], $row['fecha_nacimiento'], $row['ciudad'],
				$row['email'], $row['url'], $row['perfil'], $row['foto']);
			array_push($arrayAutores, $myAutor);
		}
		return $arrayAutores;
		
	}
	
	function getTagList()
	{
		$query = mysql_query("SELECT * FROM etiquetas;");
		$arrayTags = array();
		while($row = mysql_fetch_assoc($query))
		{
			$myTag = new Etiqueta($row['nombre'], $row['descripcion']);
			array_push($arrayTags, $myTag);
		}
		return $arrayTags;
	}
	
	function getTagsEntrada($inId)
	{
		$query = mysql_query("SELECT etiqueta FROM entradas_etiquetas WHERE entrada = ".$inId.";");
		$arrayTags = array();
		while($row = mysql_fetch_row($query))
		{
			$tag = $row[0]." ";
			array_push($arrayTags, $tag);
		}
		return $arrayTags;
	}
	
	function hayEntradasAnho($inAnho)
	{
		$query = mysql_query("SELECT COUNT(id) FROM entradas WHERE fecha LIKE '".$inAnho."-__-__';");
		$row = mysql_fetch_row($query);
		return $row[0];
	}
	
	function hayEntradasMes($inAnho, $inMes)
	{
		if($inMes < 10)
		{
			$inMes = "0".$inMes;
		}
		$query = mysql_query("SELECT COUNT(id) FROM entradas WHERE fecha LIKE '".$inAnho."-".$inMes."-__';");
		$row = mysql_fetch_row($query);
		return $row[0];
	}
	
	function countTags($inTag)
	{
		$sql = "SELECT COUNT(etiqueta) FROM entradas_etiquetas WHERE etiqueta ='".$inTag."';";
		$query = mysql_query($sql);
		$row = mysql_fetch_row($query);
		return $row[0];
	}
?>