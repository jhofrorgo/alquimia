$(".table").on("click", ".crearUsuario", function(){
return swal({
    type: "success",
    title: "El Usuario ha sido Creado Correctamente",
    showConfirmButton: true,
    confirmButtonText: "Cerrar"					
    }).then(function(resultado){

            if(resultado.value){

                window.location = "?url=Usuarios";
                
            }

        })}