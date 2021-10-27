$(buscar_datos());
function buscar_datos(consulta){
    $.ajax({
        url: '../ajax/buscar.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#datos").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}
$(document).on('keyup','#caja_busqueda',function(){
    var valor=$(this).val();
    numeroCaracteres = valor.length;
    if(numeroCaracteres == 8){
        buscar_datos(valor);
    }else{
        buscar_datos(valor);
    }
})
