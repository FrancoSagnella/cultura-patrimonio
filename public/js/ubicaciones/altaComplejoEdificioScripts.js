// Muestra la parte del form para escribir una direccion nueva
// Y deshabilita o habilita el input de la direccion
const mostrarFormDomicilio = () => {
    if($('#seccionDireccion:visible').length == 0)
    {
        $('#seccionDireccion').show();
        $('#direccion').prop('disabled', true);
        $('#flagDireccion').val(1);
    }
    else
    {
        $('#seccionDireccion').hide();
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
