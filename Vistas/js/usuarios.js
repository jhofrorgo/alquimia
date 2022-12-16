$(".table").on("click", ".EditarUsuarios", function(){

	var Uid = $(this).attr("Uid");
	console.log("aaaa");
	var datos = new FormData();

	datos.append("Uid", Uid);

	$.ajax({

		url: "./Ajax/usuariosA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		contentType: false,
		cache: false,
		processData: false,

		
	}).done(function(resultado) {
			$("#id").val(resultado["id"]);
			$("#apellido").val(resultado["apellido"]);
			$("#nombre").val(resultado["nombre"]);
			$("#usuario").val(resultado["usuario"]);
			$("#clave").val(resultado["clave"]);
			$("#rol").val(resultado["rol"]);
		  })

})




$(".table").on("click", ".BorrarUsuario", function(){

	var Uid = $(this).attr("Uid");

	swal({
		title: '¿Esta acción Eliminará el usurio del sistema, deseas confirmar?',
		text: "¡El usuario no tendrá acceso al sistema!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Aceptar' 
	}).then(function(resultado){

		if(resultado.value){
			//window.location = "index.php?url=Usuarios&Uid="+Uid;
			window.setTimeout(location = "index.php?url=Usuarios&Uid="+Uid, 3000);
		}

	})
})


$(".modal-footer").on("click", ".crearUsuario", function(){
	swal({
    type: "Correcto",
    title: "El Usuario ha sido Creado Correctamente",
    showConfirmButton: true,
    confirmButtonText: "Cerrar"					
    }).then(function(resultado){

		if(resultado.value){
		
			window.location = "?url=Usuarios";

		}

	})

})


