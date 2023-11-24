const mostrarFormAltaTipoAsignacion = () => {
    $("#modal-body").empty();
    $.get('/tipos-asignacion/create', (data, status) => {
        $("#modal-body").append(data);
    });
}

const enviarFormAltaTipoAsignacion  = () => {

    console.log($("#formAlta").serialize());

    $.post('/tipos-asignacion/store', $("#formAlta").serialize())
        .done((data, status) => {
            if(data.errors){
                console.log(data);
            }
            else{
                $('#Modal').modal('toggle');
                location.reload();
            }
        });
}