<?php

if($_SESSION["rol"] != "Administrador" && $_SESSION["rol"] != "Mesero"){

	echo '<script>

	window.location = "?url=Inicio";
	</script>';

	return;

}

?>


<div class="content-wrapper">
	
	<section class="content-header">
		
		<a href="?url=Inicio">
			
			<button class="btn btn-primary">Volver a Mesas</button>

		</a>

		<br><br>


		<?php 
		 

		if(isset($_GET["mesa"])){

			$columna = "numero";
			$valor = $_GET["mesa"];

			$mesa = MesasC::VerMesas2C($columna, $valor);

			$columna = "id";
			$valor = $_GET["orden"];

			$orden = OrdenesC::VerOrdenC($columna, $valor);

			echo '<h1>La Mesa N°: '.$mesa["numero"].' está Ocupada.</h1>

			<h2>Estado Actual: <button class="btn btn-danger">Ocupado</button></h2>

			<h2>Mesero/a: '.$orden["mesero"].'</h2>';

			if(isset($_GET["orden"])){

				$id_o = $_GET["orden"];

				$Total = OrdenesC::PrecioTotalC($id_o);

				$t = implode(" ", $Total);

				$final = explode(" ", $t);

				echo '<h2>Total cuenta: $ '.$final[0].'</h2>';

			}
			

		}

		

		?>


		<form method="post">

			<?php

			echo '<input type="hidden" name="id_mesa" value="'.$mesa["id"].'">

			<input type="hidden" name="id_orden" value="'.$_GET["orden"].'">';

			?>
			
			

			<button type="submit" class="btn btn-success pull-right btn-lg">Pagar y liberar mesa</button>


			<?php

			$estadoMesa = new MesasC();
			$estadoMesa -> EstadoMesaPC();

			$BorrarOrden = new OrdenesC();
			$BorrarOrden -> BorrarOrdenC();

			?>

		</form>

		<br><br>


	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<h2>Pedidos:</h2>

				<button class="btn btn-primary" data-toggle="modal" data-target="#AgregarPedido">Agregar Pedido</button>

				<?php

				$o_pedidos = OrdenesC::VerPedidosOrdenC();

				foreach ($o_pedidos as $key => $value){

					if(isset($_GET["orden"])){

						if($value["id_orden"] == $_GET["orden"]){

							$total = $value["cantidad"]*$value["p_total"];

						echo '<div class="row Pedido">
					
								<div class="col-md-3">
									
									<h2>Comida o Bebida</h2>

									<input type="text" class="form-control" readonly value="'.$value["comida"].'">

								</div>

								<div class="col-md-2">
									
									<h2>Cantidad</h2>

									<input type="number" class="form-control" readonly value="'.$value["cantidad"].'">

								</div>

								<div class="col-md-3">
									
									<h2>Precio Final</h2>

									<input type="text" class="form-control" readonly value="$ '.$total.'">

								</div>

								<div class="col-md-3">
									
									<h2>Extras</h2>

									<input type="text" class="form-control" readonly value="'.$value["extras"].'">

								</div>

								<div class="col-md-1">
									
									<h2>&nbsp;</h2>

									<button type="button" class="btn btn-danger BorrarPedido" MN="'.$_GET["mesa"].'" Oid="'.$_GET["orden"].'" Pid="'.$value["id"].'"><i class="fa fa-times"></i></button>

								</div>

							</div>';

						}

					}

				}

				?>

				
				
			</div>

		</div>

	</section>

</div>



<div class="modal fade" id="AgregarPedido">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Comida o Bebida:</h2>

							<select name="comida" id="select2" class="SC" style="width: 100%;" required>
								
								<option value="">Seleccionar...</option>

								<?php

								$columna = null;
								$valor = null;

								$comidas = ComidasC::VerComidasC($columna, $valor);

								foreach ($comidas as $key => $value) {
									
									echo '<option Coid="'.$value["id"].'" value="'.$value["nombre"].'">'.$value["nombre"].'</option>';

								}

								?>

							</select>

						</div>

						<div class="form-group">
							
							<h2>Datos:</h2>

							<input type="text" class="form-control input-lg" id="datos" name="datos" readonly>

						</div>

						<div class="form-group">
							
							<h2>Cantidad:</h2>

							<input type="number" value="1" class="form-control input-lg" id="cantidad" name="cantidad" required>

						</div>

						<div class="form-group">
							
							<h2>Precio:</h2>

							<input type="number" class="form-control input-lg" id="precio" name="precio" readonly>

							<h2>Precio Final:</h2>

							<input type="number" class="form-control input-lg" id="precioF" name="precioF" readonly>

						</div>


						<div class="form-group">
							
							<h2>Extras:</h2>

							<textarea class="form-control" name="extras">
								


							</textarea>

							<?php

							echo '<input type="hidden" class="form-control input-lg" name="n_mesa" value="'.$_GET["mesa"].'">

							<input type="hidden" class="form-control input-lg" name="id_o" value="'.$_GET["orden"].'">';

							?>

						</div>

					</div>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Agregar</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>


				<?php

				$agregar = new OrdenesC();
				$agregar -> AgregarPedidoOrdenC();

				?>

			</form>

		</div>

	</div>

</div>


<?php

$borrar = new OrdenesC();
$borrar -> BorrarPedidoC();

?>