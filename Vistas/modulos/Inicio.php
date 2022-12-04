<div class="content-wrapper">
	
	<section class="content-header">
		
		<h1>Inicio</h1>

	</section>

	<section class="content">

		<button class="btn btn-primary" data-toggle="modal" data-target="#CrearMesa">Crear Mesa</button>

		<br><br>
		
		<div class="row M">

			<?php

			$resultado = MesasC::VerMesasC();

			foreach ($resultado as $key => $value) {
				
				if($value["estado"] == "libre"){

					echo '<div class="col-md-3 col-xs-6 bg-success">';

				}else{

					echo '<div class="col-md-3 col-xs-6 bg-danger">';

				}

				echo '<h2>Mesa N°: '.$value["numero"].' <button class="btn btn-danger pull-right BorrarMesa" Mid="'.$value["id"].'"><i class="fa fa-trash"></i></button></h2>

				<h3>Cantidad de Personas: '.$value["c_personas"].'</h3>';

				if($value["estado"] == "libre"){

					echo '<h3>Estado: <button class="btn btn-success">Libre</button></h3>';

				}else{

					echo '<h3>Estado: <button class="btn btn-danger">Ocupada</button></h3>';

				}

				echo '<a href="?url=Mesa&mesa='.$value["numero"].'">
					
					<button class="btn btn-primary">Administrar</button>

				</a>

			</div>';

				

			}

			?>
			

		</div>

	</section>

</div>




<div class="modal fade" id="CrearMesa">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Número de la Mesa:</h2>

							<input type="number" class="form-control input-lg" name="numero" required="">

						</div>

						<div class="form-group">
							
							<h2>Cantidad de Personas:</h2>

							<input type="number" class="form-control input-lg" name="c_personas" required="">

							<input type="hidden" class="form-control input-lg" name="estado" value="libre" required="">

						</div>

					</div>

				</div>


				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Crear Mesa</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

				</div>

				<?php

				$crear = new MesasC();
				$crear -> CrearMesaC();

				?>

			</form>

		</div>

	</div>

</div>


<?php

$Borrar = new MesasC();
$Borrar -> BorrarMesaC();

?>


<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">  Ultimos pedidos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Id Orden</th>
                    <th>Producto</th>
					<th>Mesa</th>
                    <th>Estado</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="#">OR9842</a></td>
                    <td>Fruit Punch</td>
					<td>1</td>
                    <td><span class="label label-info">En preparación</span></td>
                  </tr>
                  <tr>
                    <td><a href="#">OR1848</a></td>
                    <td>Papas fritas</td>
					<td>1</td>
                    <td><span class="label label-info">En preparación</span></td>
                  </tr>
                  <tr>
                    <td><a href="#">OR7429</a></td>
                    <td>Papas fritas</td>
					<td>1</td>
                    <td><span class="label label-danger">Por preparar</span></td>
                  </tr>
                  <tr>
                    <td><a href="#">OR7429</a></td>
                    <td>Fruit Punch</td>
					<td>2</td>
                    <td><span class="label label-danger">Por preparar</span></td>
                  </tr>
                  <tr>
                    <td><a href="#">OR1848</a></td>
                    <td>Club Colombia Negra</td>
					<td>2</td>
                    <td><span class="label label-warning">Por tomar</span></td>
                  </tr>
                  <tr>
                    <td><a href="#">OR7429</a></td>
                    <td>Club Colombia Negra</td>
					<td>3</td>
                    <td><span class="label label-success">Despachado</span></td>
                  </tr>
                  <tr>
                    <td><a href="#">OR9842</a></td>
                    <td>Fruit Punch</td>
					<td>5</td>
                    <td><span class="label label-success">Despachado</span></td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="#" class="btn btn-sm btn-default btn-flat pull-right">Visualizar todas las ordenes</a>
            </div>
            <!-- /.box-footer -->
          </div>