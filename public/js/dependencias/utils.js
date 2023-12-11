const onSelectPadreDependencia = () => {
    let tu = $("#dep_id_p").val();
    if(tu !== ""){
        loadContent('/'+tu+'/create', 'content');
    }
}