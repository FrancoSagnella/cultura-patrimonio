const mostrarFormDomicilio = () => {
    if($('#seccionDireccion:visible').length == 0)
    {
        $('#seccionDireccion').show();
    }
    else
    {
        $('#seccionDireccion').hide();
    }
};
