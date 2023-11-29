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
    let depSeleccionada = $('#dependencia').val();
    if(depSeleccionada === "")
    {
        $('#seccionResponsable').hide();
    }
    else
    {
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
