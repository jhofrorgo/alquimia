<?php

if($_SESSION["rol"] != "Administrador" && $_SESSION["rol"] != "Mesero"){

	echo '<script>

	window.location = "?url=Inicio";
	</script>';

	return;

}


echo $_GET["mesa"];

$columna = "numero";
$valor = $_GET["mesa"];

$mesa = MesasC::VerMesas2C($columna, $valor);


if($mesa["estado"] == "ocupado"){

	$columna = "id_mesa";
	$valor = $mesa["id"];

	$orden = OrdenesC::VerOrdenC($columna, $valor);

	echo '<script>

	window.location = "?url=Orden&mesa='.$mesa["numero"].'&orden='.$orden["id"].'";
	</script>';

}

?>

<div class="content-wrapper">
	
	<section class="content-header">
		
		<a href="?url=Inicio">
			
			<button class="btn btn-primary">Volver a Mesas</button>

		</a>

		<br><br>

		<?php

		echo '<h1>La Mesa N°: '.$mesa["numero"].' está Disponible.</h1>

		<h2>Estado Actual: <button class="btn btn-success">Libre</button></h2>';

		?>


		<form method="post">
					
					<?php

					echo '<input type="hidden" name="id_mesa" value="'.$mesa["id"].'">
					<input type="hidden" name="n_mesa" value="'.$mesa["numero"].'">';

					?>

					<div class="row">
						
						<div class="col-md-4">
							
							<div class="form-group">
								
								<h2>Seleccionar Mesero/a:</h2>

								<select class="form-control" name="mesero" require>

									<option value="">Seleccionar...</option>

									<?php

									$columna = null;
									$valor = null;

									$mesero = UsuariosC::VerUsuariosC($columna, $valor);

									foreach ($mesero as $key => $value) {

										if($value["rol"] == "Mesero"){

											echo '<option value="'.$value["apellido"].' '.$value["nombre"].'">'.$value["apellido"].' '.$value["nombre"].'</option>';

										}
										

									}

									?>

								</select>

							</div>

						</div>

						<div class="col-md-5">
							
							<h2>&nbsp;</h2>

							<button class="btn btn-primary" type="subtmi">Crear Nueva Orden</button>

						</div>

					</div>

					<?php

					$crearorden = new OrdenesC();
					$crearorden -> CrearOrdenC();

					$estadoMesa = new MesasC();
					$estadoMesa -> EstadoMesaC();

					?>

				</form>

	</section>


</div>