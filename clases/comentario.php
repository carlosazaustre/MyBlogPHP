<?php
class Comentario
{
	public $id;
	public $autor;
	public $fecha;
	public $hora;
	public $entrada;
	public $texto;
	
	function __construct($inId, $inAutor, $inFecha, $inHora, $inEntrada, $inTexto)
	{
		$this->id = $inId;
		$this->autor = $inAutor;
		$this->fecha = $inFecha;
		$this->hora = $inHora;
		$this->entrada = $inEntrada;
		$this->texto = $inTexto;
	}
}
?>