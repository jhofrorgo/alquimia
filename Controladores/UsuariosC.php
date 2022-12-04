<?php



class UsuariosC{

	public function IniciarSesionC(){

		if(isset($_POST["usuario"])){

			$tablaBD = "usuarios";

			$datosC = array("usuario" => $_POST["usuario"], "clave" => $_POST["clave"]);

			$resultado = UsuariosM::IniciarSesionM($tablaBD, $datosC);

			if($resultado["usuario"] == $_POST["usuario"] && $resultado["clave"] == $_POST["clave"]){

				$_SESSION["Ingresar"] = true;
				$_SESSION["id"] = $resultado["id"];
				$_SESSION["usuario"] = $resultado["usuario"];
				$_SESSION["clave"] = $resultado["clave"];
				$_SESSION["nombre"] = $resultado["nombre"];
				$_SESSION["apellido"] = $resultado["apellido"];
				$_SESSION["rol"] = $resultado["rol"];

				echo '<script>

				window.location = "?url=Inicio";
				</script>';

			}else{

				echo '<br><div class="alert alert-danger">Credenciales invalidas</div>';

			}

		}

	}



	public function VerPerfilC(){

		$tablaBD = "usuarios";

		$id = $_SESSION["id"];

		$resultado = UsuariosM::VerPerfilM($tablaBD, $id);

		echo '<div class="col-md-6 col-xs-12">
							
				<h2>Apellido:</h2>
				<input type="text" name="apellido" class="input-lg" value="'.$resultado["apellido"].'">
				<input type="hidden" name="id" class="input-lg" value="'.$resultado["id"].'">

				<h2>Nombre:</h2>
				<input type="text" name="nombre" class="input-lg" value="'.$resultado["nombre"].'">

			</div>

			<div class="col-md-6 col-xs-12">
				
				<h2>Usuario:</h2>
				<input type="text" name="usuario" class="input-lg" value="'.$resultado["usuario"].'">

				<h2>Contraseña:</h2>
				<input type="password" name="clave" class="input-lg" value="'.$resultado["clave"].'">

				<br><br>

				<button type="submit" class="btn btn-success input-lg">Guardar Cambios</button>

			</div>';

	}



	public function EditarPerfilC(){

		if(isset($_POST["idE"])){

			$tablaBD = "usuarios";

			$datosC = array("id" => $_POST["idE"], "apellido" => $_POST["apellidoE"], "nombre" => $_POST["nombreE"], "usuario" => $_POST["usuarioE"], "clave" => $_POST["claveE"], "rol" => $_POST["rolE"]);

			$resultado = UsuariosM::EditarPerfilM($tablaBD, $datosC);

			if($resultado == true){

				$_SESSION["nombre"] = $_POST["nombre"];
				$_SESSION["apellido"] = $_POST["apellido"];
				
				echo '<script>
				
				swal({
					type: "success",
					title: "Correcto",
					text: "Su Perfil ha sido Editado Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "?url=Inicio";
								
							}

						})

				</script>';
						

			}

		}

	}



	static public function VerUsuariosC($columna, $valor){

		$tablaBD = "usuarios";

		$resultado = UsuariosM::VerUsuariosM($tablaBD, $columna, $valor);

		return $resultado;

	}




	public function CrearUsuariosC(){

		if(isset($_POST["apellido"])){

			$tablaBD = "usuarios";

			$datosC = array("apellido"=>$_POST["apellido"], "nombre" => $_POST["nombre"], "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"], "rol"=>$_POST["rol"]);

			$resultado = UsuariosM::CrearUsuariosM($tablaBD, $datosC);

			if($resultado == true){
				//echo '<script language="javascript">alert("Las denominaciones no coinciden con las del cierre de la caja anterior");</script>';
				
				echo "<script language='javascript'>

				window.location = '?url=Usuarios';

				</script>";


/* 				
				echo '<script language="javascript">

				swal({
					type: "success",
					title: "El Usuario ha sido Creado Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "?url=Usuarios";
								
							}

						})
				
				</script>'; */

			}

		}

	} 





	public function EditarUsuariosC(){

		if(isset($_POST["idE"])){

			$tablaBD = "usuarios";

			$datosC = array("id"=>$_POST["idE"], "apellido"=>$_POST["apellidoE"], "nombre"=>$_POST["nombreE"], "usuario"=>$_POST["usuarioE"], "clave"=>$_POST["claveE"], "rol"=>$_POST["rolE"]);

			$resultado = UsuariosM::EditarUsuariosM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				swal({
					type: "success",
					title: "El Usuario ha sido Editado Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "?url=Usuarios";
								
							}

						})


				
				</script>';

			}

		}

	}




	public function BorrarUsuariosC(){

		if(isset($_GET["Uid"])){

			$tablaBD = "usuarios";

			$id = $_GET["Uid"];

			$resultado = UsuariosM::BorrarUsuariosM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "?url=Usuarios";
				</script>';

			}

		}

	}



}