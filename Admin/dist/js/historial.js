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
    
    $('#detalles').DataTable({
        destroy: true,
    });
    var valor=$(this).val();
    numeroCaracteres = valor.length;
        if(numeroCaracteres == 0){
             $("#datos").html('<table class="table table-hover table-xs" style="background-color:#8f8f8f21;" width="100%"><thead><tr class="first" style="background-color:#001f3f;color:#ffffff;"><th class="th1 text-center">Cliente</th><th class="th1 text-center">Código de Prestamo</th><th class="th1 text-center">Fecha de desembolso</th><th class="th1 text-center">Mora por día de retraso</th> <th class="th1 text-center">Monto prestado</th> <th class="th1 text-center">Por cobrar</th><th class="th1 text-center"></th></tr></thead><tbody class="text-center" align="center"></tbody></table>');
        }else{
            buscar_datos(valor);
        }
        
})
