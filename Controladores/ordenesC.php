<?php

class OrdenesC{

	static public function CrearOrdenC(){

		if(isset($_POST["id_mesa"])){

			$tablaBD = "ordenes";

			$n_mesa = $_POST["n_mesa"];

			$datosC = array("id_mesa"=>$_POST["id_mesa"], "mesero"=>$_POST["mesero"]);

			$resultado = OrdenesM::CrearOrdenM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				swal({
					type: "success",
					title: "La Orden ha sido Creada Correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"					
					}).then(function(resultado){

							if(resultado.value){

								window.location = "?url=Mesa&mesa='.$n_mesa.'";
								
							}

						})


				
				</script>';

			}

		}

	}



	static public function VerOrdenC($columna, $valor){

		$tablaBD = "ordenes";

		$resultado = OrdenesM::VerOrdenM($tablaBD, $columna, $valor);

		return $resultado;

	}



	static public function AgregarPedidoOrdenC(){

		if(isset($_POST["comida"])){

			$tablaBD = "o_pedidos";

			$n_mesa = $_POST["n_mesa"];

			$id_orden = $_POST["id_o"];

			$datosC = array("comida"=>$_POST["comida"], "id_orden"=>$_POST["id_o"], "cantidad"=>$_POST["cantidad"], "p_unitario"=>$_POST["precio"], "p_total"=>$_POST["precioF"], "extras"=>$_POST["extras"]);

			$resultado = OrdenesM::AgregarPedidoOrdenM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "?url=Orden&mesa='.$n_mesa.'&orden='.$id_orden.'";
				</script>';

			}

		}

	}



	static public function VerPedidosOrdenC(){

		$tablaBD = "o_pedidos";

		$resultado = OrdenesM::VerPedidosOrdenM($tablaBD);

		return $resultado;

	}



	static public function BorrarPedidoC(){

		if(isset($_GET["Pid"])){

			$tablaBD = "o_pedidos";

			$id = $_GET["Pid"];

			$MN = $_GET["MN"];

			$Oid = $_GET["Oid"];

			$resultado = OrdenesM::BorrarPedidoM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

				window.location = "?url=Orden&mesa='.$MN.'&orden='.$Oid.'";
				</script>';

			}


		}

	}



	static public function PrecioTotalC($id_o){

		$tablaBD = "o_pedidos";

		$resultado = OrdenesM::PrecioTotalM($tablaBD, $id_o);

		return $resultado;

	} 



	static public function BorrarOrdenC(){

		if(isset($_POST["id_orden"])){

			$tablaBD = "ordenes";

			$id = $_POST["id_orden"];

			$resultado = OrdenesM::BorrarOrdenM($tablaBD, $id);

		}

	}


}