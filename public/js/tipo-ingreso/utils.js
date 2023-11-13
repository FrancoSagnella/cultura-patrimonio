const altaTipoIngreso = () => {

    setTimeout(() => {
        $.get('/tipos-ingreso/create', (data, status) => {
            console.log(data, status);
            $("#modal-body").append(data);
        });
    }, 5000);

}
