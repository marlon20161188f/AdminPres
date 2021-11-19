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
$(document).on('keyup','#caja_bus',function(){
    var valor=$(this).val();
    numeroCaracteres = valor.length;
        if(numeroCaracteres == 8){
            buscar_datos_dni(valor);       
         }if(numeroCaracteres == 11){
            buscar_datos_ruc(valor);
        }
        else{
            $("#datos_validados").html('<h2>Error no se ingreso un número</h2>');
        }
})
