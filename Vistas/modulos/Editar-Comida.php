<?php

if($_SESSION["rol"] != "Administrador"){

	echo '<script>

	window.location = "Inicio";
	</script>';

	return;

}

?>

<div class="content-wrapper">
	
	<section class="content-header">

	<h1>Modificación de Producto</h1>

		<?php

		$columna = "id";
		$valor = $_GET["id"];

		$comida = ComidasC::VerComidasC($columna, $valor);

		echo '<h1>Editar La Comida: '.$comida["nombre"].'</h1>';

		?>
		
		

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<form method="post">
					
					<div class="col-md-6 col-xs-12">

						<?php

						echo '<h2>Nombre:</h2>
								<input type="text" name="nombreE" class="input-lg" value="'.$comida["nombre"].'" required="">
								<input type="hidden" name="idE" class="input-lg" value="'.$comida["id"].'" required="">

								<h2>Datos:</h2>
								<textarea name="datosE" style="width: 250px; height: 50px" required="">
									
									'.$comida["datos"].'

							</textarea>
						
						

					</div>


					<div class="col-md-6 col-xs-12">
						
						<h2>Categoria Actual: '.$comida["categoria"].'</h2>

						<select class="input-lg" name="categoriaE" required="">
								
							<option value="'.$comida["categoria"].'">Seleccionar...</option>';

						?>

							<?php

							$columna = null;
							$valor = null;

							$categorias = CategoriasC::VerCategoriasC($columna, $valor);

							foreach ($categorias as $key => $value) {
								
								echo '<option value="'.$value["categoria"].'">'.$value["categoria"].'</option>';

							}

							?>

						</select>	

						<?php

						echo '<h2>Precio:</h2>
						<input type="text" name="precioE" class="input-lg" value="'.$comida["precio"].'" required="">';

						?>

						
						<br><br>
						<div class="Editar">
						<button class="btn btn-success EditarComida" type="submit">Guardar Cambios</button>
						</div>
						<?php

						$actualizar = new ComidasC();
						$actualizar -> ActualizarComidaC();

						?>

					</div>

				</form>
				
			</div>

		</div>

	</section>

</div>

<script>
	$(".Editar").on("click", ".EditarComida", function(){
	swal({
    type: "success",
    title: "El Usuario ha sido Creado Correctamente",
    showConfirmButton: true,
    confirmButtonText: "Cerrar"					
    }).then(function(resultado){

		if(resultado.value){
		
			window.location = "?url=Comidas";

		}

	})

})
</script>