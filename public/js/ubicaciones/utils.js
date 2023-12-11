const onSelectTipoUbicacion = () => {
    let tu = $("#tipoUbicacion").val();
    if(tu !== ""){
        loadContent('/'+tu+'/create', 'content');
    }
}

// Muestra la parte del form para escribir una direccion nueva
// Y deshabilita o habilita el input de la direccion
const mostrarFormDomicilio = () => {
    if($('#flagDireccion').val() == 0)//se activa
    {
        loadContent('/direcciones/createGeneric', 'seccionDireccion');
        $('#direccion').prop('disabled', true);
        $('#flagDireccion').val(1);
    }
    else//se desactiva
    {
        $('#seccionDireccion').empty();
        $('#direccion').prop('disabled', false);
        $('#flagDireccion').val(0);
    }
};

// Muestra o esconde la seccion con los datos del responsable de la dependencia elegida
// Deberia ir a buscar un responsable a la bbdd, pasandole el id de dependencia
const mostrarResponsable = () => {

    let responsable = $('#dependencia option:selected').attr("res_id");

    if(responsable === "")
    {
        $('#seccionResponsable').hide();
    }
    else
    {

        $.get('responsables/'+responsable, (data, status) => {

            $('#nombreResponsable').val(data.message.nom);
            $('#apellidoResponsable').val(data.message.ape);
            $('#dniResponsable').val(data.message.dni);
            $('#mailResponsable').val(data.message.mail);
            $('#telResponsable').val(data.message.tel);
            $('#anioAsignacionResponsable').val(data.message.anio_asig);
            $('#nroAsignacionResponsable').val(data.message.nro_asig);
            $('#tipoResponsable').append(`<option value="${data.message.tipo_res_id}">
            ${data.message.tipo_responsable}
            </option>`);
            $('#tipoResponsable').val(data.message.tipo_res_id);
            $('#tipoAsignacionResponsable').append(`<option value="${data.message.tipo_asi_id}">
            ${data.message.tipo_asignacion}
            </option>`);
            $('#tipoAsignacionResponsable').val(data.message.tipo_asi_id);

            $('#nombreResponsable').prop('disabled', true);
            $('#apellidoResponsable').prop('disabled', true);
            $('#dniResponsable').prop('disabled', true);
            $('#mailResponsable').prop('disabled', true);
            $('#telResponsable').prop('disabled', true);
            $('#anioAsignacionResponsable').prop('disabled', true);
            $('#nroAsignacionResponsable').prop('disabled', true);
            $('#tipoResponsable').prop('disabled', true);
            $('#tipoAsignacionResponsable').prop('disabled', true);

        });

        $('#seccionResponsable').show();

    }
};

const loadUfFromSelectedComplejo = (originInput, targetInput) => {
    //El formato de comId seria id-chk_uf
    let comId = $("#"+originInput).val();//agarro id del complejo seleccionado
    let comChk = comId.split('-')[1];//agarro chk_uf del complejo seleccionado

    if(comChk == 1){
        $.get('/unidades-funcionales/complejo/select/'+comId.split('-'[0]), (data, status) => {
            $('#seccionUFS').empty();
            $('#seccionUFS').append(data);
        });

        $("#esEdificio").val(0);
    }
    else{
        $('#seccionUFS').empty();
        $("#esEdificio").val(1);
    }

};

const loadPisoFromUF = (originInput, targetInput) => {
    //El formato de comId seria id-chk_uf
    let idUF = $("#"+originInput).val();//agarro id del complejo seleccionado

    $.get('/pisos/uf/select/'+idUF, (data, status) => {
        $('#'+targetInput).empty();
        $('#'+targetInput).append(data);
    });

};

const loadOficinaFromPiso = (originInput, targetInput) => {
    //El formato de comId seria id-chk_uf
    let idPiso = $("#"+originInput).val();//agarro id del complejo seleccionado

    $.get('/oficinas/piso/select/'+idPiso, (data, status) => {
        $('#'+targetInput).empty();
        $('#'+targetInput).append(data);
    });

};
