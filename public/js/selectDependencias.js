//Recibe el nombre y la posicion del select que se esta cambiando, y el nombre y la posicion del siguiente select (el que se v a a crear)
const seleccionarDependencia = (selectActual, indiceSelectActual, siguienteSelect, indiceSiguienteSelect) => {

    //Validar si tengo creados selects hijos del actual, borrarlos aca mismo
    verificarHijosDependencias(indiceSelectActual);

    if($("#"+selectActual).val() == 'default')
    {
        //SI selecciona la default de nuevo se limpia todo
        $("#dependencia-final-seleccionada").val('sinSeleccion');
        $("#direccion-dependencia").val( 'default' );
        $("#ubicacionReal").val( 'default' );
        $("#responsable").val('default');
        $('#dependencia-seleccionada').hide();
    }
    else{

        //Se filtran dependencias hijas
        let dependenciasFiltradas = filtrarDependencias($("#"+selectActual).val());

        if(dependenciasFiltradas.length > 0){
            let nuevoSelect = '';
            nuevoSelect+='<div id="select-dependencias-'+indiceSiguienteSelect+'" class="row">'+
            '<div class="col-lg-2 mt-3">'+
            '</div>'+
            '<div class="col-lg-8 mt-3">'+
            `<select class="form-control" name="`+siguienteSelect+`" id="`+siguienteSelect+`" onchange="seleccionarDependencia('`+siguienteSelect+`', `+indiceSiguienteSelect+`, 'dependencia-hija-`+(indiceSiguienteSelect+1)+`', `+(indiceSiguienteSelect+1)+`)">`+
            '<option value="default">Seleccione una Dependencia</option>';

            dependenciasFiltradas.forEach(element => {
                nuevoSelect+='<option value="'+element.id+'">'+element.nombre_dependencia+'</option>'
            });

            nuevoSelect+='</select>'+
            '</div>'+
            '<div class="col-lg-2"></div>'+
            '</div>';

            $("#dependencias").append(nuevoSelect);

            //Si estoy aca es que no era una dependencia final, entonces dejo el valor default de la dependencia final seleccioanda
            $("#dependencia-final-seleccionada").val('sinSeleccion');
            $("#direccion-dependencia").val( 'default' );
            $("#responsable").val('default');
            $('#dependencia-seleccionada').hide();

        }else{
            //SI entro aca quiere decir que es una dependencia de ultimo nivel, entonces cargo los responsables, direccion y ubicacion real
            //Tambien me guardo en una variable la dependencia final seleccionada
            let idSeleccionada = $("#"+selectActual).val();
            $("#dependencia-final-seleccionada").val( idSeleccionada );

            //Esta logica de la direccion va a cambiar
            settearDireccion(idSeleccionada);
            cargarResponsables(idSeleccionada);

            $('#dependencia-seleccionada').show();
        }
    }
}

//Agarra las dependencias que estan guardads en la const dependencias
//y devuelve un array con las dependencias hijas de la seleccionada
//Recibe parendId (que seria id de la dependencia del select actual, que va a ser el padre)
const filtrarDependencias = (parentId) => {
    return dependencias.filter(element => {
        return element.parent_id == parentId;
    });
}

//valida si ya hay selects hijos del select que cambio
//Recibe indiceActual, y recorro para abajo si tengo indices que le siguen, todos esos los borra
const verificarHijosDependencias = (indiceActual) => {
    let borrar = [];
    let aux;

    for(i = indiceActual+1; ; i++){
        aux = $("#select-dependencias-"+i);
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

//Le paso un id, y retorna la dependencia que tenga ese id
const obtenerDependenciaEspecifica = (id) => {
    return dependencias.filter(element => {
        return element.id == id;
    });
}

//Recibe el id de la dependencia que quiere setear la direccion
const settearDireccion = (idDependencia) => {
    let dependencia = obtenerDependenciaEspecifica(idDependencia)[0];

    let formatDireccion = dependencia.calle+' '+dependencia.numero+' '+dependencia.piso+' '+dependencia.departamento+' '+dependencia.codigo_postal+' '+dependencia.localidad+' '+dependencia.telefono;

    $("#direccion-dependencia").val( formatDireccion );
}

//filtra los responsables que correspondan a la dependencia seleccionada y los carga en el select
const cargarResponsables = (idDependencia) => {
    let responsablesFiltrados =  responsables.filter(element => {
        return element.dependencia_id == idDependencia;
    });

    let nuevosOptions = '<option value="default" selected>Seleccione un Responsable</option>';
    responsablesFiltrados.forEach(element => {
        nuevosOptions+='<option value="'+element.id+'">'+element.nombre+' '+element.apellido+'</option>';
    });

    //antes de cargar los responsables nuevos, elimino los responsables que tenia antes y seteo el val en default
    $("#responsable").empty();
    $("#responsable").append(nuevosOptions);
    $("#responsable").val('default');
}

//Recibe el array con todas las dependencias que estaban seleccionadas en el select antes del error
//Lo recorre y va creando los selects que correspondan para recuperar los datos del formulario anterior
const cargarDependenciasEnError = (dependenciasViejas) => {

    //Si el array esta vacio, corto la funcion
    if(dependenciasViejas.length > 0){
        let ultimoSelectCreado = 1;

        //Primero carga el valor en el select padre
        $("#dependencia-padre").val(dependenciasViejas[0]);

        //Creo los select que le siguen
        for(let i = 1; i < dependenciasViejas.length; i++){

            if(i == 1){
                //Creo el select que le sigue al padre
                seleccionarDependencia('dependencia-padre', 0, 'dependencia-hija-1', 1);
                $("#dependencia-hija-1").val(dependenciasViejas[1]);//Le seteo el valor que tenia antes del error
            }
            //creo el resto de selects que son hijos de los creados dinamicamente
            else{
                seleccionarDependencia('dependencia-hija-'+(i-1), i-1, 'dependencia-hija-'+i, i);
                $("#dependencia-hija-"+(i)).val(dependenciasViejas[i]);//Le seteo el valor que tenia antes del error
            }

            ultimoSelectCreado = i;
        }

        //Ahora ya cree los selects con valores anteriores, tengo que saber si era uno final (y mostrar direccion real y responsable)
        //O si no era final, entonces tengo que crear un select nuevo abajo
        //Esto lo si si el input dependencia-final-seleccionada tiene valor distinto a 'sinSeleccion'
        if($("#dependencia-final-seleccionada").val() != 'sinSeleccion'){
            //Si es distinto a sinSeleccion, quiere decir que el valor del ultimo select que cargue era final, tonces no creo mas selects
            //y muestro los campos de Direccion y responsable (que ya deberian haber traido su valor con el old o estar vacios si es que no se les habia cargado nada)

            $('#dependencia-seleccionada').show();

        }
        //Si el valor es sinSeleccion, tengo que crear un select nuevo vacio, hijo del ultimo que cree
        else{
            //Si esto es mayor que uno, quiere decir que ta todo bien, no era select final y crea uno vacio
            if(ultimoSelectCreado > 1){
                seleccionarDependencia('dependencia-hija-'+ultimoSelectCreado, ultimoSelectCreado, 'dependencia-hija-'+(ultimoSelectCreado+1), ultimoSelectCreado+1);
            }
            //Ahora si era igual a uno, quiere decir que solo se habia seleccionado el padre de todos, entonces al crear el ultimo vacio
            //tengo que hacer que sea hijo del dependencia-padre
            else if(ultimoSelectCreado == 1){
                seleccionarDependencia('dependencia-padre', 0, 'dependencia-hija-'+(ultimoSelectCreado), ultimoSelectCreado);
            }//Si no se habia seleccionado ni el padre de todos, esto ya ni se ejecuta asi que np
        }
    }


}
