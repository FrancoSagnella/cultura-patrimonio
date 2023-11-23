const mostrarFormAltaTipoAsignacion = () => {
    $("#modal-body").empty();
    $.get('/tipos-asignacion/create', (data, status) => {
        $("#modal-body").append(data);
    });
}