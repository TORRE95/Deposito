<?php 
	header('Access-Control-Allow-Origin: *');
	function iniciarSesion()
	{
		require_once 'conexion.php';
		//instanciamos la clase Funciones 
		$funciones = new Funciones();
		$conexion = $funciones->conectar();
		$conexion->set_charset("utf8");
		if(isset($_POST['iniciar'])){
				$mail = $_POST['mail'];
				$pass = $_POST['pass'];

			//Buscar en BD
			$buscar = "SELECT COUNT(*) AS Total FROM usuarios WHERE Correo = '$mail' AND Password = md5('$pass') ;";

			$resultado = $conexion->query($buscar);

			$total = $resultado->fetch_assoc();

			//Si encontramos al usuario

			if($total['Total'] > 0){
				//Buscar datos del usuario
				$datosUsuario = "SELECT * FROM usuarios WHERE Correo = '$mail' AND Password = md5('$pass');";
				$res = $conexion->query($datosUsuario);
				$r = $res->fetch_assoc();
				

				#Creamos las variables de sesión
				$_SESSION['idUsuario'] = $r['idUsuario'];
				$_SESSION['correo'] = $r['Correo']; 
				header('Location: inicio.php');

			}else{
				echo "<script>alert('Usuario y/o contraseña incorrectos')</script>";

			}
		}
	}

	function registrar()
	{
		require_once('conexion.php');

		//instanciamos la clase Funciones 
		$funciones = new Funciones();
		$conexion = $funciones->conectar();
		$conexion->set_charset("utf8");

		#registro
		if (isset($_POST['registro'])) {

			$mail = $_POST['mail'];
			$nombre = $_POST['nombre'];
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];



			if ($pass1 == $pass2 && $pass1 != "" && $pass2 != "" && $nombre != "" && $mail != "") {
				
				$insert ="INSERT INTO usuarios (Nombre, Correo, Password) VALUES('$nombre', '$mail', md5('$pass1'));";

				if ($conexion->query($insert)) {
					$_SESSION['mail'];
					$_SESSION['nombre'];
					echo "<script>alert('Usuario registrado correctamente'); window.location='inicio.php'</script>";
				}else {
					echo "ERROR:".$conexion->error."<br>";
					echo $insert."<br>";
				}

			}else {
					echo "<script>alert('ERROR: Las constraseñas no coinciden')</script>";
			}

		}
	}

	function insertarTarjeta()
	{
		require 'libreria.php';
		session_start();
		$funciones = new Funciones();
		$con = $funciones->conectar();
		select("*", "usuarios", "1"); //CHECA AQUI, SI NO QUIERES VARIABLES DE SESION ENTONCES ¿CÓMO AGREGAMOS LAS TARJETAS?
		if (isset($_POST['agregar'])) {
			$nombre = $_POST['nombre'];
			$cv = $_POST['cv'];
			$numeroTarjeta = $_POST['numeroTarjeta'];
			$fechaV = $_POST['year']."-".$_POST['mes']."-00";
			$lol = insert("tarjetas", "3,'$numeroTarjeta', '$fechaV', '$cv', 2");
			echo $lol;
		}
	}
	
	

 ?>