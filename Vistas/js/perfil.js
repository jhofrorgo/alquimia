$(".edperfil").on("click", ".editarPerfil", function(){
    
	swal({
    type: "success",
    title: "El perfil ha sido modificado correctamente",
    timer: 3000,
    buttons: false,
    }).then(function(resultado){

		if(resultado.value){
            event.preventDefault();
			window.location = "?url=Perfil";

		}

	})

})