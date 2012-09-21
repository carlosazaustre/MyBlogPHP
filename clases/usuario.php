<?php
class Usuario
{
	public $nombre;
	public $apellidos;	
	public $alias;
	public $password;
	public $fecha_nac;
	public $ciudad;
	public $email;
	public $url;
	public $perfil;
	public $foto;
	
	function __construct ($inNombre, $inApellidos, $inAlias, $inPassword, $inFechaNac, $inCiudad, 
		$inEmail, $inUrl, $inPerfil, $inFoto)
	{
		$this->nombre = $inNombre;
		$this->apellidos = $inApellidos;
		$this->alias = $inAlias;
		$this->password = $inPassword;
		$this->fecha_nac = $inFechaNac;
		$this->ciudad = $inCiudad;
		$this->email = $inEmail;
		$this->url = $inUrl;
		$this->perfil = $inPerfil;
		$this->foto = $inFoto;
	}
}
?>