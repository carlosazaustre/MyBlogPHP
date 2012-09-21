<?php
class Etiqueta
{
	public $nombre;
	public $descripcion;
	
	function __construct($inNombre, $inDescripcion)
	{
		$this->nombre = $inNombre;
		$this->descripcion = $inDescripcion;
	}
}
?>