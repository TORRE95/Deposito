<?php 
	header('Access-Control-Allow-Origin: *');
	$nombreUser = $_GET['nombreUser'];
	$tel = $_GET['tel'];
	$id = $_GET['id'];
	require_once 'conexion.php';
	$funciones = new Funciones();
	$conexion = $funciones->conectar();
	$conexion->set_charset("utf8");
	$query = "UPDATE usuarios SET nombreUsuario = '$nombreUser', Telefono = '$tel' WHERE idUsuario = '$id'";
	$resultado = $conexion->query($query);

	echo $resultado;


 ?>