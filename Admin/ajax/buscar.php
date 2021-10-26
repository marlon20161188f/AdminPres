<?php
$mysqli=new mysqli("b7nvpy1vtadduxzlqosv-mysql.services.clever-cloud.com","ulcoechpsy7vemc6","poShw9zjQ6zjJHwl5bZ3","b7nvpy1vtadduxzlqosv");
$mysqli2=new mysqli("b7nvpy1vtadduxzlqosv-mysql.services.clever-cloud.com","ulcoechpsy7vemc6","poShw9zjQ6zjJHwl5bZ3","b7nvpy1vtadduxzlqosv");
$salida="";
if(isset($_POST['consulta'])){
    $q=$mysqli->real_escape_string($_POST['consulta']);
    $query="SELECT placa,color,marca,estacionamiento FROM registro_vehicular
    WHERE placa LIKE '%".$q."%' OR marca LIKE '%".$q."%' OR color LIKE '%".$q."%'";
     date_default_timezone_set("America/Lima");
     $fecha = date("Y-m-d H:i:s");
    $sql = "INSERT INTO registro_ingreso(placa,fecha)
     VALUES('".$q."','".$fecha."')";
    $resultado=$mysqli->query($query);
    if( $resultado->num_rows > 1){
        $salida.="<table class='tabla_datos heading text-center' width='100%'>
                     <!--<thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Marca</td>
                            <td>Modelo</td> 
                        </tr>
                    </thead>-->
                    <tbody class='text-center' align='center' >"; 
                    while($fila=$resultado->fetch_assoc()){
                        $salida.="
                        <tr>
                        <th align='center'width='34%'><H2 style='  border-radius: 15px; background: linear-gradient(180deg, rgba(120, 180, 20) 0%, rgba(120, 180, 20) 100%);' class='letra'>".$fila['placa']."</H2></th>
                        <th align='center'width='34%'><H2 style='  border-radius: 15px; background: linear-gradient(180deg, rgba(120, 180, 20) 0%, rgba(120, 180, 20) 100%);' class='letra'>".$fila['color']."</H2></th>
                        <th align='center'width='34%'><H2 style='  border-radius: 15px; background: linear-gradient(180deg, rgba(120, 180, 20) 0%, rgba(120, 180, 20) 100%);' class='letra'>".$fila['marca']."</H2></th>
                    </tr>
                     ";
                    }
                     $salida.="</tbody></table><div class='form-group text-center'> 
                     <button style='border:none;box-shadow: -3px 3px 6px  #00000029;' type='submit' class='btn btn-primary  btn-lg '>Nueva Consulta</button>
                      </div>";echo $salida;
    }else{
        if( $resultado->num_rows ==0){
                $salida.="<table class='tabla_datos heading text-center' width='100%'>
                <thead>
                   <tr>
                   <th colspan='1'></th>
                   <th align='center'width='34%'colspan='1'><H1 style='  border-radius: 5px; background: linear-gradient(180deg, rgba(255, 149, 16) 0%, rgba(255, 149, 16) 100%);' class='letra'>PLACA NO REGISTRADA</H1></th>
                   <th colspan='1'></th>
                   </tr>
               </thead>"; $salida.="</tbody></table><div class='form-group text-center'style='margin-top:1rem'> 
                <button style='border:none;box-shadow: -3px 3px 6px  #00000029;' type='submit' class='btn btn-primary  btn-lg '>Nueva Consulta</button>
                 </div>";echo $salida;}
                else{
                   while($fila=$resultado->fetch_assoc()){
                    $salida.="<table class='tabla_datos heading text-center' width='100%' >
                    <thead>
                       <tr>
                       <th colspan='1' ></th>
                       <th align='center'width='34%'colspan='1'style='font: normal normal medium 15px/18px Roboto;
                       letter-spacing: 0px;
                       color: #000000;'><H4 class='letra'>Estacionamiento</H4></th>
                       <th colspan='1' ></th>
                       </tr>
                   </thead>
                    <thead>
                       <tr>
                       <th colspan='1' ></th>
                       <th align='center'width='34%' colspan='1'><H1 style='  border-radius: 35px; background: linear-gradient(180deg, rgba(120, 180, 20) 0%, rgba(120, 180, 20) 100%);' class='letra'>".$fila['estacionamiento']."</H1></th>
                       <th colspan='1' ></th>
                       </tr>
                   </thead>
                   <tbody class='text-center' align='center' >"; 
                       $salida.="
                       <tr>
                       <th align='center'width='34%'colspan='1'style='font: normal normal medium 15px/18px Roboto;
                       letter-spacing: 0px;
                       color: #000000;'><H4 class='letra'>Placa</H4></th>
                       <th align='center'width='34%'colspan='1'style='font: normal normal medium 15px/18px Roboto;
                       letter-spacing: 0px;
                       color: #000000;'><H4 class='letra'>Color</H4></th>
                       <th align='center'width='34%'colspan='1'style='font: normal normal medium 15px/18px Roboto;
                       letter-spacing: 0px;
                       color: #000000;'><H4 class='letra'>Marca</H4></th>
                        
                   </tr>
                       <tr>
                       <th align='center'width='34%'><H2 style='padding-bottom:0.5rem;  border-radius: 25px; background: linear-gradient(180deg, rgba(120, 180, 20) 0%, rgba(120, 180, 20) 100%);' class='letra'>".$fila['placa']."</H2></th>
                       <th align='center'width='34%'><H2 style='padding-bottom:0.5rem; border-radius: 25px; background: linear-gradient(180deg, rgba(120, 180, 20) 0%, rgba(120, 180, 20) 100%);' class='letra'>".$fila['color']."</H2></th>
                       <th align='center'width='34%'><H2 style='padding-bottom:0.5rem;  border-radius: 25px; background: linear-gradient(180deg, rgba(120, 180, 20) 0%, rgba(120, 180, 20) 100%);' class='letra'>".$fila['marca']."</H2></th>
                        
                   </tr>
                    ";echo $salida;?>
                    
                    </tbody></table><div class="form-group text-center"> 
                    <form class="form-horizontal" id="register" method="POST">
                        <input type="hidden" name="click" value="1">
                        <input type="hidden" name="placa" value="<?php echo $q ?>">
                        <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
                   </form>      
                        <button style="margin-left:2rem; border:none;box-shadow: -3px 3px 6px  #00000029;" type="submit" name="registrar" value="U" class="btn btn-primary  btn-lg " onclick="miFunc()"><i class="fa fa-plus"></i>Registrar Ingreso</button>
                    </div>
                     </div>
             
                  <?php
                }
    }}
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