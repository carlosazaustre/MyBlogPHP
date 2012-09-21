<?php
class Entrada
{
	public $id;
	public $titulo;
	public $texto;
	public $autor;
	public $fecha;
	public $hora;
	
	function __construct($inId, $inTitulo, $inTexto, $inAutor, $inFecha, $inHora)
	{
		$this->id = $inId;
		$this->titulo = $inTitulo;
		$this->texto = $inTexto;
		$this->fecha = $inFecha;
		$this->autor = $inAutor;
		$this->hora = $inHora;
	}
}
?>