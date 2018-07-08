<?php 
	header('Access-Control-Allow-Origin: *');
	require_once 'conexion.php';
	$funciones = new Funciones();
	$conexion = $funciones->conectar();
	$conexion->set_charset("utf8");
	


	$query = "SELECT * FROM usuarios WHERE tipoUsuario = 1;";
	$resultado = $conexion->query($query);
	$arreglo = array();
	while ($r = $resultado->fetch_object()) {
		array_push($arreglo, array(
			"Nombre"=>$r->Nombre,
			"idUsuario"=>$r->idUsuario,
			"Descripcion"=>$r->DescripcionCafe,
			"Rate"=>$r->Rate

		));
	}
	
	
	//IMPRIMIR LA RESPUESTA EN JSON
	echo json_encode($arreglo);

 ?>