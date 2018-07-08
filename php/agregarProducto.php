<?php 
	header('Access-Control-Allow-Origin: *');
	require 'conexion.php';
	$funciones = new Funciones();
	$conexion = $funciones->conectar();
	$conexion->set_charset("utf8");
	$nombre = $_GET['nombre'];
	$precio = $_GET['precio'];
	$descripcion = $_GET['descripcion'];
	$idUsuario = $_GET['id'];
	$insert = "INSERT INTO productos (Nombre, Precio, Descripcion, idUsuario) VALUES ('$nombre', '$precio', '$descripcion', '$idUsuario')";
	$res = $conexion->query($insert);
	echo($res);

 ?>