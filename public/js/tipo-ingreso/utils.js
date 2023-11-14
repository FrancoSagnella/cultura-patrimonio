const altaTipoIngreso = () => {

    $.get('/tipos-ingreso/create', (data, status) => {
        console.log(data, status);
        $("#modal-body").append(data);
    });

}
