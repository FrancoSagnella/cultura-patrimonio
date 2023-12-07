
const mostrarFormAlta = (ruta) => {

    $("#modal-body").empty();
    $.get('/'+ruta+'/create', (data, status) => {
        $("#modal-body").append(data);
    });

}

const enviarFormAlta = (ruta) => {



    $.post('/'+ruta, $("#formAlta").serialize())
        .done((data, status) => {
            if(data.errors){
                console.log(data);
            }
            else{
                console.log(data);
                $('#Modal').modal('toggle');
                //Esto es un parche xd, es para recargar la p[agina una vez hecha el alta, hay una libreria llamada livewire que deja hacerlo funcionar como sngular, podriamos investigarla
                location.reload();
            }
        });

}

const mostrarFormEditar = (ruta, id) => {

    $("#modal-body").empty();
    $.get('/'+ruta+'/'+id+'/edit', (data, status) => {
        $("#modal-body").append(data);
    });

}

const enviarFormEditar = (ruta, id) => {

    $.ajax({
        url: '/'+ruta+'/'+id,
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

const deshabilitar = (ruta, id) => {

    $.ajax({
        url: '/'+ruta+'/deshabilitar/'+id,
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

const habilitar = (ruta, id) => {

    $.ajax({
        url: '/'+ruta+'/habilitar/'+id,
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

//Es como el cargarForm alta pero mas generico
const loadContent = (ruta, contentDiv) => {
    $("#"+contentDiv).empty();
    $.get(ruta, (data, status) => {
        $("#"+contentDiv).append(data);
    });
}
//carga select localidades segun provincia
function getLocalidades(eltoken ){
    $("#localidad").html('<option value="" id="optionlocdefault" selected="selected">Cargando...</option>');
    jQuery.ajax({
        type: "get",
        url: url+'/getLocalidades/'+$("#provincia_id").val(),
        data:'_token = ' + eltoken,
        success: function( msg ) {
            for(var i = 0; i< msg.data.length; i++ ){
                $("#localidad").append("<option value= "+msg.data[i].localidad+">"+msg.data[i].descr+"</option>");
            }
            $("#optionlocdefault").html("Seleccionar...");
        }
    });
    $("#user-destino-cp").val("");
}