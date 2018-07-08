<?php 
	header('Access-Control-Allow-Origin: *');
	$id = $_GET['id'];
	require_once 'conexion.php';
	$funciones = new Funciones();
	$conexion = $funciones->conectar();
	$conexion->set_charset("utf8");
	$query = "SELECT * FROM carrito WHERE idUsuario = '$id';";
	$resultado = $conexion->query($query);

	$arreglo = array();
	while ($r = $resultado->fetch_object()) {
		array_push($arreglo, array(
			"idCarrito"=>$r->idCarrito,
			"idProducto"=>$r->idProducto,
			"precio"=>$r->Precio,
			"cantidad"=>$r->Cantidad,
			"nombre"=>$r->NombreProducto
		));
	}

	echo json_encode($arreglo);


 ?>