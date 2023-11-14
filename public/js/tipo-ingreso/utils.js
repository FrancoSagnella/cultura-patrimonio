const mostrarFormAltaTipoIngreso = () => {

    $("#modal-body").empty();
    $.get('/tipos-ingreso/create', (data, status) => {
        $("#modal-body").append(data);
    });

}

const enviarFormAltaTipoIngreso = () => {

    $.post('/tipos-ingreso', $("#formAlta").serialize())
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
    $.get('/tipos-ingreso/'+id+'/edit', (data, status) => {
        $("#modal-body").append(data);
    });

}

const enviarFormEditarTipoIngreso = (id) => {

    $.ajax({
        url: '/tipos-ingreso/'+id,
        type: 'PUT',
        data: $("#formEditar").serialize(),
        success: (data)=>{
            if(data.errors){
                console.log(data);
            }
            else{
                $('#Modal').modal('toggle');
                //Esto es un parche xd, es para recargar la p[agina una vez hecha el alta, hay una libreria llamada livewire que deja hacerlo funcionar como sngular, podriamos investigarla
                location.reload();
            }
        }
      });
}

const mostrarFormDeshabilitarTipoIngreso = () => {

    $.ajax({
        url: '/tipos-ingreso/'+id,
        type: 'DELETE',
        success: (data)=>{
            if(data.errors){
                console.log(data);
            }
            else{
                //Esto es un parche xd, es para recargar la p[agina una vez hecha el alta, hay una libreria llamada livewire que deja hacerlo funcionar como sngular, podriamos investigarla
                location.reload();
            }
        }
      });

}
