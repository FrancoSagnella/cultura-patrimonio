//Recibe el nombre y la posicion del select que se esta cambiando, y el nombre y la posicion del siguiente select (el que se v a a crear)
const seleccionarBien = (selectActual, indiceSelectActual, siguienteSelect, indiceSiguienteSelect) => {

    //Validar si tengo creados selects hijos del actual, borrarlos aca mismo
    verificarHijosBienes(indiceSelectActual);

    if($("#"+selectActual).val() == 'default'){
        $("#tipobien-final-seleccionado").val('sinSelecion');
        $("#nroSerie").val('default');
        $("#marca").val('default');
        $("#modelo").val('default');
        $('#seccion-nro-serie').hide();
    }
    else{
        //Se filtran dependencias hijas
        let dependenciasFiltradas = filtrarBienes($("#"+selectActual).val());

        if(dependenciasFiltradas.length > 0){
            let nuevoSelect = '';
            nuevoSelect+='<div id="select-bienes-'+indiceSiguienteSelect+'" class="row">'+
            '<div class="col-lg-2 mt-3">'+
            '</div>'+
            '<div class="col-lg-8 mt-3">'+
            `<select class="form-control" name="`+siguienteSelect+`" id="`+siguienteSelect+`" onchange="seleccionarBien('`+siguienteSelect+`', `+indiceSiguienteSelect+`, 'bien-hija-`+(indiceSiguienteSelect+1)+`', `+(indiceSiguienteSelect+1)+`)">`+
            '<option value="default">Seleccione un Tipo de Bien</option>';

            dependenciasFiltradas.forEach(element => {
                nuevoSelect+='<option value="'+element.id+'">'+element.codigo_presup+' - '+element.tipo_bien+'</option>'
            });

            nuevoSelect+='</select>'+
            '</div>'+
            '<div class="col-lg-2"></div>'+
            '</div>';

            $("#bienes").append(nuevoSelect);

            $('#seccion-nro-serie').hide();
            $("#nroSerie").val('default');
            $("#marca").val('default');
            $("#modelo").val('default');
            $('#usuario-responsable').hide();
            $("#usuarioResponsable").val('default');
            $("#tipobien-final-seleccionado").val('sinSelecion');
        }
        else{
            let idSeleccionada = $("#"+selectActual).val();
            $("#tipobien-final-seleccionado").val( idSeleccionada );
            if(mostrarSerie(idSeleccionada)){
                $('#seccion-nro-serie').show();
            } else {
                $('#seccion-nro-serie').hide();
                $("#nroSerie").val('default');
                $("#marca").val('default');
                $("#modelo").val('default');
            }

            if(mostrarUsuarioResponsable(idSeleccionada)){
                $('#usuario-responsable').show();
            } else {
                $('#usuario-responsable').hide();
                $("#usuarioResponsable").val('default');
            }
        }
    }

}

//Le paso un id, y retorna la dependencia que tenga ese id
const obtenerTipoBienEspecifico = (id) => {
    return tipos_bien.filter(element => {
        return element.id == id;
    });
}

const mostrarUsuarioResponsable = (idTipoBien) => {
    return idTipoBien == 322 || idTipoBien == 136 || idTipoBien == 63
}

//Recibe el id de la dependencia que quiere setear la direccion
const mostrarSerie = (idTipoBien) => {
    let tipoBien = obtenerTipoBienEspecifico(idTipoBien)[0];
    return tipoBien.codigo_presup == 435 || tipoBien.codigo_presup == 436 || tipoBien.codigo_presup == 434 || tipoBien.codigo_presup == 439;
}

//Agarra las dependencias que estan guardads en la const dependencias
//y devuelve un array con las dependencias hijas de la seleccionada
//Recibe parendId (que seria id de la dependencia del select actual, que va a ser el padre)
const filtrarBienes = (parentId) => {
    return tipos_bien.filter(element => {
        console.log(element, parentId);
        return element.parent_id == parentId;
    });
}

//valida si ya hay selects hijos del select que cambio
//Recibe indiceActual, y recorro para abajo si tengo indices que le siguen, todos esos los borra
const verificarHijosBienes = (indiceActual) => {
    let borrar = [];
    let aux;

    for(i = indiceActual+1; ; i++){
        aux = $("#select-bienes-"+i);
        if(aux.val() != undefined){
            borrar.push(aux);
        }
        else{
            break;
        }
    }

    borrar.forEach(element => {
        element.remove();
    });
}

//Recibe el array con todas los tipos de bien que estaban seleccionadas en el select antes del error
//Lo recorre y va creando los selects que correspondan para recuperar los datos del formulario anterior
const cargarTiposBienEnError = (tiposBienViejos) => {
    console.log(tiposBienViejos);
}
