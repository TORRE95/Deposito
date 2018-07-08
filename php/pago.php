<?php 
	header('Access-Control-Allow-Origin: *');
	require 'libreria.php';
	session_start();
	$funciones = new Funciones();
	$con = $funciones->conectar();
	select("*", "usuarios", "1");
	if (isset($_POST['agregar'])) {
		$nombre = $_POST['nombre'];
		$cv = $_POST['cv'];
		$numeroTarjeta = $_POST['numeroTarjeta'];
		$fechaV = $_POST['year']."-".$_POST['mes']."-00";
		$lol = insert("tarjetas", "3,'$numeroTarjeta', '$fechaV', '$cv', 2");
		echo $lol;
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<label>
			Nombre del titular de la tarjeta
			<input type="text" name="nombre" required>
		</label><br>
		<label>
			Número de tarjeta
			<input type="number" name="numeroTarjeta" minlength="16" maxlength="16" required>
		</label><br>
		Fecha de vencimiento
		<select name="mes">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
		</select>
		<select name="year">
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
			<option value="2025">2025</option>
			<option value="2026">2026</option>
			<option value="2027">2027</option>
			<option value="2028">2028</option>
			<option value="2029">2029</option>
		</select><br>
		<label>
			Código de Verificación
			<input type="number" name="cv" required  minlength="3" maxlength="3">
		</label><br><br>
		<input type="submit" name="agregar" value="Agregar Tarjeta">
	</form>
</body>
</html>