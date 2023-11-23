const mostrarFormAltaTipoIngreso = () => {

    $("#modal-body").empty();
    $.get('/direcciones/create', (data, status) => {
        $("#modal-body").append(data);
    });

}

const enviarFormAltaTipoIngreso = () => {

    $.post('/direcciones', $("#formAlta").serialize())
        .done((data, status) => {
            if(data.errors){
                console.log(data);
            }
            else{
                $('#Modal').modal('toggle');
                //Esto es un parche xd, es para recargar la p[agina una vez hecha el alta, hay una libreria llamada livewire que deja hacerlo funcionar como sngular, podriamos investigarla
                location.reload();
            }
        });

}

const mostrarFormEditarTipoIngreso = (id) => {

    $("#modal-body").empty();
    $.get('/direcciones/'+id+'/edit', (data, status) => {
        $("#modal-body").append(data);
    });

}

const enviarFormEditarTipoIngreso = (id) => {

    $.ajax({
        url: '/direcciones/'+id,
        type: 'PUT',
        data: $("#formEditar").serialize(),
        success: (data)=>{
            if(data.errors){
                console.log(data);
            }
            else{
                $('#Modal').modal('toggle');
                location.reload();
            }
        }
      });
}

const deshabilitarTipoIngreso = (id) => {

    $.ajax({
        url: '/direcciones/deshabilitar/'+id,
        type: 'GET',
        success: (data)=>{
            if(data.errors){
                console.log(data);
            }
            else{
                location.reload();
            }
        }
      });

}

const habilitarTipoIngreso = (id) => {

    $.ajax({
        url: '/direcciones/habilitar/'+id,
        type: 'GET',
        success: (data)=>{
            if(data.errors){
                console.log(data);
            }
            else{
                location.reload();
            }
        }
      });

}
