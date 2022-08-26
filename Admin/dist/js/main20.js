//$(buscar_datos_dni());

function buscar_datos_dni(consulta){
    $.ajax({
        url: '../ajax/validar_dni.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#datos_validados").html(respuesta);
    })
    .fail(function(){
         console.log("error");
    })
}
function buscar_datos_ruc(consulta){
    $.ajax({
        url: '../ajax/validar_ruc.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#datos_validados").html(respuesta);
    })
    .fail(function(){
         console.log("error");
    })
}
function buscar_datos_extranjero(consulta){
    $.ajax({
        url: '../ajax/validar_extranjero.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#datos_validados").html(respuesta);
    })
    .fail(function(){
         console.log("error");
    })
}
$(document).on('keyup','#caja_bus',function(){
    var valor=$(this).val();
    numeroCaracteres = valor.length;
    var elije =$('#elije option:selected').val();
    if (elije=='1') {
        $('#caja_bus').on('input', function () { 
            this.value = this.value.replace(/[^0-9]/g,'');
        }).on();
        if(numeroCaracteres == 8){
            buscar_datos_dni(valor);       
         }else {
            $("#datos_validados").html('<h2>Error, número de caracteres incorrecto</h2>');
        }
    } 
    if (elije=='2') {
        $('#caja_bus').on('input', function () { 
            this.value = this.value.replace(/[^0-9]/g,'');
        }).on();
        if(numeroCaracteres == 11){
            buscar_datos_ruc(valor);
        }else {
            $("#datos_validados").html('<h2>Error, número de caracteres incorrecto</h2>');
        }
    }
    if (elije=='3') {
        $('#caja_bus').on('input', function () { 
            this.value = this.value.replace(/[^a-zA-Z0-9]/g,'');
        }).on();
        buscar_datos_extranjero(valor);
    }
    else {
        $("#datos_validados").html('<h2>Error, número de caracteres incorrecto</h2>');
    }
})
