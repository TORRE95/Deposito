<?php 
	header('Access-Control-Allow-Origin: *');
	$mail = $_GET['mail'];
	$pass = $_GET['pass'];
	require_once 'conexion.php';
	$funciones = new Funciones();
	$conexion = $funciones->conectar();
	$conexion->set_charset("utf8");
	$query = "SELECT * FROM usuarios WHERE Correo = '$mail' AND Password = '$pass';";
	$resultado = $conexion->query($query);

	$arreglo = array();
	while ($r = $resultado->fetch_object()) {
		array_push($arreglo, array(
			"idUsuario"=>$r->idUsuario,
			"tipoUsuario"=>$r->tipoUsuario
			
		));
	}

	echo json_encode($arreglo);


 ?>