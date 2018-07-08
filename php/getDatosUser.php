<?php 
	header('Access-Control-Allow-Origin: *');
	$id = $_GET['idUser'];
	require_once 'conexion.php';
	$funciones = new Funciones();
	$conexion = $funciones->conectar();
	$conexion->set_charset("utf8");
	$query = "SELECT * FROM usuarios WHERE idUsuario = '$id';";
	$resultado = $conexion->query($query);

	$arreglo = array();
	while ($r = $resultado->fetch_object()) {
		array_push($arreglo, array(
			"idUsuario"=>$r->idUsuario,
			"tipoUsuario"=>$r->tipoUsuario,
			"nombre"=>$r->Nombre,
			"apellidos"=>$r->Apellidos,
			"correo"=>$r->Correo,
			"nombreUsuario"=>$r->nombreUsuario,
			"telefono"=>$r->Telefono, 
			"fechaRegistro"=>$r->FechaRegistro,
		));
	}

	echo json_encode($arreglo);


 ?>