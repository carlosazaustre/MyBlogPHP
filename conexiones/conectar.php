<?php
////////////////////////////////
//  Variables de la BD   	  //
////////////////////////////////
$host = "URL DE TU HOST"; //host de la base de datos
$usuario = "USUARIO BD"; //usuario de la base de datos
$password = "PASSWORD USUARIO B"; //contrase�a de la base de datos
$basedatos = "NOMBRE BASE DE DATOS"; //nombre de la base de datos

////////////////////////////////
// Variables del Blog		  //
////////////////////////////////
$tituloBlog = "TITULO DE TU BLOG"; //T�tulo de tu blog, ser� visible en todas las p�ginas
$autorBlog = "NOMBRE AUTOR ENTRADAS"; //Tu nombre, o el del autor del blog

$conectar = mysql_connect($host, $usuario, $password);
mysql_select_db($basedatos, $conectar);
?>