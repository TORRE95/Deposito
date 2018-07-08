<?php 
	header('Access-Control-Allow-Origin: *');
	require_once 'conexion.php';
	$funciones = new Funciones();
	$conexion = $funciones->conectar();
	$conexion->set_charset("utf8");

	$id = $_GET['id'];
	


	$query = "SELECT * FROM productos WHERE idUsuario = '$id';";
	$resultado = $conexion->query($query);
	$arreglo = array();
	while ($r = $resultado->fetch_object()) {
		array_push($arreglo, array(
			"Nombre"=>$r->Nombre,
			"idProducto"=>$r->idProducto,
			"Descripcion"=>$r->Descripcion,
			"Precio"=>$r->Precio

		));
	}
	
	
	//IMPRIMIR LA RESPUESTA EN JSON
	echo json_encode($arreglo);

 ?>