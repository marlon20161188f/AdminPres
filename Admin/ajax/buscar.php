<?php
$mysqli=new mysqli("b7nvpy1vtadduxzlqosv-mysql.services.clever-cloud.com","ulcoechpsy7vemc6","poShw9zjQ6zjJHwl5bZ3","b7nvpy1vtadduxzlqosv");
$salida="";
if(isset($_POST['consulta'])){
    $q=$mysqli->real_escape_string($_POST['consulta']);
    $query="SELECT cliente,codigo,fecha,monto FROM registro_clientes
    WHERE cliente LIKE '%".$q."%'";
     date_default_timezone_set("America/Lima");
    $resultado=$mysqli->query($query);
    if( $resultado->num_rows > 0){
        $salida.="<table class='table table-hover table-xs'style='background-color:#8f8f8f21;' width='100%'>
                     <thead>
                        <tr class='first' style='background-color:#001f3f;color:#ffffff;'>
                            <th class='th1 text-center'>Cliente</th>
                            <th class='th1 text-center'>Código de Prestamo</th>
                            <th class='th1 text-center'>Fecha de desembolso</th>
                            <th class='th1 text-center'>Monto prestado</th> 
                        </tr>
                    </thead>
                    <tbody class='text-center' align='center' >"; 
                    while($fila=$resultado->fetch_assoc()){
                        $salida.="
                        <tr>
                            <td align='center'width='20%'>".$fila['cliente']."</td>
                            <td align='center'width='20%'>".$fila['codigo']."</td>
                            <td align='center'width='20%'>".$fila['fecha']."</td>
                            <td align='center'width='20%'>".$fila['monto']."</td>
                        </tr>
                     ";
                    }
                     $salida.="</tbody></table>";echo $salida;
    }else{
    
                $salida.="<table class='tabla_datos heading text-center' width='100%'>
                <thead>
                   <tr>
                   <th colspan='1'></th>
                   <th align='center'width='34%'colspan='1'><H1 style='  border-radius: 5px; background: linear-gradient(180deg, rgba(255, 149, 16) 0%, rgba(255, 149, 16) 100%);' class='letra'>CLIENTE NO REGISTRADO</H1></th>
                   <th colspan='1'></th>
                   </tr>
               </thead>"; $salida.="</tbody></table><div class='form-group text-center'style='margin-top:1rem'> 
                 </div>";echo $salida;}?>
                  <?php

    
}else {
    $salida="";
}

?>

<script type="text/javascript"> 
function miFunc() {
      $.ajax({
        type: 'POST',
        url: '../ajax/registrar_vehiculo.php',
        data: $('#register').serialize(),
        success: function(response) {
          var jsonData = JSON.parse(response);
          console.log(jsonData.success);
          $('#RegisterModal').modal('hide');
          if(jsonData.success == "2"){
            $('#MessageCrud').html('<div class="alert bg-success" role="alert"><em class="fa fa-check-circle mr-2"></em>Se registró correctamente el vehiculo ingresado. Por favor de comprobar el registro.<a href="#" class="float-right"><em class="fa fa-remove"></em></a></div>');
          }
      
        }
      });
    }
   
</script>