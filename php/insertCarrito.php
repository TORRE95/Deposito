<?php 
	header('Access-Control-Allow-Origin: *');
	$idProducto = $_GET['idProducto'];
	$precio = $_GET['precio'];
	$idUsuario = $_GET['idUsuario'];
	$nombreProducto = $_GET['nombreProducto'];
	$nombreProducto = $_GET['cantidad'];
	require_once 'conexion.php';
	$funciones = new Funciones();
	$conexion = $funciones->conectar();
	$conexion->set_charset("utf8");
	for ($i=0; $i < cantidad; $i++) { 
		$query = "INSERT INTO carrito (idUsuario, idProducto, Precio, nombreProducto) VALUES ('$idUsuario', '$idProducto', '$precio', '$nombreProducto');";
	}
	
	$resultado = $conexion->query($query);
	echo $resultado;


 ?>