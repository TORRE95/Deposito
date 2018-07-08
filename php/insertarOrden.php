<?php 
	header('Access-Control-Allow-Origin: *');
	$idCafeteria = $_GET['idCafeteria'];
	$suma = $_GET['suma'];
	$idUsuario = $_GET['idUsuario'];
	$descripcion = $_GET['descripcion'];
	require_once 'conexion.php';
	$funciones = new Funciones();
	$conexion = $funciones->conectar();
	$conexion->set_charset("utf8");
	$query = "INSERT INTO orden (idUsuario, idCafe, Monto, descripcion) VALUES ('$idUsuario', '$idCafeteria', '$suma', '$descripcion');";
	$resultado = $conexion->query($query);
	echo $resultado;


 ?>