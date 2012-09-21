<?php
////////////////////////////////
//  Variables de la BD   	  //
////////////////////////////////
$host = "URL DE TU HOST"; //host de la base de datos
$usuario = "USUARIO BD"; //usuario de la base de datos
$password = "PASSWORD USUARIO B"; //contraseña de la base de datos
$basedatos = "NOMBRE BASE DE DATOS"; //nombre de la base de datos

////////////////////////////////
// Variables del Blog		  //
////////////////////////////////
$tituloBlog = "TITULO DE TU BLOG"; //Título de tu blog, será visible en todas las páginas
$autorBlog = "NOMBRE AUTOR ENTRADAS"; //Tu nombre, o el del autor del blog

$conectar = mysql_connect($host, $usuario, $password);
mysql_select_db($basedatos, $conectar);
?>