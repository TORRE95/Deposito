<?php
	header('Access-Control-Allow-Origin: *');
	require "conexion.php";

	/*select: SIRVE PARA HACER UNA CONSULTA EN LA BD
		*@param STRING attr : atributo que se quiere retonar
		*@param STRING tabla: la tabla donde se hará la consulta
		*@param STRING where: condición de busqueda OPCIONAL
		*@param STRING orderBy: Ordenamiento de los registros consultados OPCIONAL 
		*@param INT    limit: el límite de datos que se mostrarán OPCIONAL
		*@return retorna la relación de la consulta de la BD

	*/
	function select($attr, $tabla, $where = '', $orderBy = '', $limit = false ){
	    	if(1==1){
				$where = ($where != '' &&  $where != null) ? "WHERE ".$where : '';
				$orderBy = ($orderBy != '' &&  $orderBy != null) ? $orderBy : '1';
				$limit = ( $limit != false  &&  $limit != null && $limit != '' ) ? 
				($limit == 1) ? "LIMIT 0,15" : "LIMIT {$limit},15" : '';

				$stmt = "SELECT {$attr} FROM {$tabla} {$where} ORDER BY {$orderBy} {$limit};";
				$funciones = new Funciones();
				$con = $funciones->conectar();
				$con->set_charset("utf8");

				$result = mysqli_query($con, $stmt);

				if($result->num_rows > 0) {
					if($result->num_rows == 1){
						$response = $result->fetch_assoc();
						
					} else {
			            while($row = $result->fetch_assoc()){
			                $response[] = $row;
			            }
			        }
		            $response;
				} else {
					$response = 'No se encontró ningún registro';
				}
			} else {
				$response = 'No se puede establecer la conexión';
			}
			return $response;
	}

	/*printSelect: SIRVE PARA IMPRIMIR LA SENTENCIA SELECT Y VERIFICAR SI EXISTE ALGÚN ERROR
		*@param STRING attr : atributo que se quiere retonar
		*@param STRING tabla: la tabla donde se hará la consulta
		*@param STRING where: condición de busqueda OPCIONAL
		*@param STRING orderBy: Ordenamiento de los registros consultados OPCIONAL 
		*@param INT    limit: el límite de datos que se mostrarán OPCIONAL
		*@return: sentencia SQL SELECT

	*/

	function printSelect($attr, $tabla, $where = '', $orderBy = '', $limit = false ){

		$where = ($where != '' &&  $where != null) ? "WHERE ".$where : '';
		$orderBy = ($orderBy != '' &&  $orderBy != null) ? $orderBy : '1';
		$limit = ( $limit != false  &&  $limit != null && $limit != '' ) ? 
		($limit == 1) ? "LIMIT 0,15" : "LIMIT {$limit},15" : '';

		$query = "SELECT {$attr} FROM {$tabla} {$where} ORDER BY {$orderBy} {$limit};";
		return $query;
	}

	/*insert: SIRVE PARA INSERTAR UNO O MÁS VALORES
		*@param STRING tabla: la tabla donde se ejecutará la acción
		*@param STRING datos: en caso de haber un INSERT de forma implícita, se omite. Si hay un INSERT
								de forma explícita, son las columnas donde se ejecuta la acción OPCIONAL
		*@param STRING valores: los valores a insertar
		*@return: boolean de éxito (1) o fracaso (0)

	*/

	function insert($tabla, $valores, $datos = ''){
		$funciones = new Funciones();
		$con = $funciones->conectar();
		$con->set_charset("utf8");

		if ($con) {
			$query = "INSERT INTO $tabla ({$datos}) VALUES({$valores});";

			$res = mysqli_query($con,$query) or die("No se pudo insertar el dato");
		}else{
			echo "Error en la conexión";
		}

		return $res;

	}

	/*printIsert: SIRVE PARA IMPRIMIR LA SENTENCIA SQL INSERT
		*@param STRING tabla: la tabla donde se ejecutará la acción
		*@param STRING datos: en caso de haber un INSERT de forma implícita, se omite. Si hay un INSERT
								de forma explícita, son las columnas donde se ejecuta la acción OPCIONAL
		*@param STRING valores: los valores a insertar
		*@return: STRING sentencia SQL INSERT

	*/
	function printInsert($tabla, $valores, $datos = ''){
			$query = "INSERT INTO $tabla ({$datos}) VALUES({$valores});";
		return $query;
	}

	/*deleteRow: SIRVE PARA BORRAR UNA O VARIAS FILAS DE LA TABLA
		*@param STRING tabla: la tabla donde se ejecutará la acción
		*@param STRING where: condición a realizar
		*@return: boolean. Éxito (1) o fracaso (0)

	*/
	function deleteRow($tabla, $where){
		$funciones = new Funciones();
		$con = $funciones->conectar();
		$con->set_charset("utf8");

		$query = "DELETE FROM {$tabla} WHERE {$where};";

		$res = mysqli_query($con, $query) or die("Formato incorrecto");
			
		return $res;
	}

	/*printDeleteRow: SIRVE PARA IMPRIMIR LA SENTENCIA SQL DELETE
		*@param STRING tabla: la tabla donde se ejecutará la acción
		*@param STRING where: condición a realizar
		*@return: STRING sentencia SQL DELETE

	*/

	function printDeleteRow($tabla, $where)
	{
		$query = "DELETE FROM {$tabla} WHERE {$where};";
		return $query;
	}



 ?>