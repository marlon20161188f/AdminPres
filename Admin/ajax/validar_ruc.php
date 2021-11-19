<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
define('CONTROLADOR', TRUE);
require '../config/database.php';

$salida="";
if(isset($_POST['consulta'])){
    $q=$_POST['consulta'];
    $conexion=Conexion::getInstancia();
    $query=$conexion->prepare("SELECT clientes.id_cliente, clientes.nombre, clientes.apellido, clientes.dni, clientes.ruc, clientes.direccion, clientes.distrito, clientes.provincia,
    clientes.departamento, clientes.celular, clientes.telefono FROM clientes
    WHERE ruc LIKE '%".$q."%'");
     date_default_timezone_set("America/Lima");
     $fecha = date("Y-m-d H:i:s");
    $resultado=$query->execute();
    if( $query->rowCount() > 0){
                    while($fila = $query->fetch(PDO::FETCH_ASSOC)){
                        $salida.="
                    <div class='row' id='validarcliente'>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='nombre'>Nombre</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input disabled type='text' class='form-control input-sm' name='nombre'  placeholder='JUAN BRYAN'value='".$fila['nombre']." ".$fila['apellido']."' >
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='dniruc'>DNI, RUC</label>
                        <div class='col-12 no-padding'>
                            <input disabled type='text' class='form-control input-sm' name='dniruc'  placeholder='73208361'value='".$fila['ruc']."'>
                            <input type='hidden' name='id_cliente' id='id_cliente' value='".$fila['id_cliente']."'>
                            <input type='hidden' name='option' value='U'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='direccion'>Dirección</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input type='text' class='form-control input-sm' name='direccion'  placeholder='Calle 53 No 10, Piso 2'value='".$fila['direccion']."'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='distrito'>Distrito</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input type='text' class='form-control input-sm' name='distrito' placeholder='Lonya Chico'value='".$fila['distrito']."'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='provincia'>Provincia</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input type='text' class='form-control input-sm' name='provincia' placeholder='Luya'value='".$fila['provincia']."'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='departamento'>Departamento</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input type='text' class='form-control input-sm' name='departamento'  placeholder='Amazonas'value='".$fila['departamento']."'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='celular'>Celular</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input type='text' class='form-control input-sm' name='celular'  placeholder='995876803' value='".$fila['celular']."'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='telefono'>Teléfono</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input type='text' class='form-control input-sm' name='telefono'  placeholder='8844437' value='".$fila['telefono']."'>
                        </div>
                    </div>
                    </div>
        
        <div class='message' id='editMessage'></div>
        </form>
      </div>
      <div class='modal-footer'>
        <!-- <button type='button' class='btn btn-primary' onclick='ValidarRegistro();'>
        <i class='fa fa-save'></i> Guardar</button> -->
        
         <button id='btn_10' class='action-button btn btn-primary'onclick='actualizarCliente();idRegistro(".$fila['id_cliente'].");' type='button' data-dismiss='modal' aria-label='Close' >
        Continuar
         </button> 
         <!--<script>console.log(".$fila['id_cliente'].") </script>-->
         ";
     }
                     echo $salida; 
    }else{
                $salida.=" 
                <div class='row'>
                <div class='form-group'>
                <label class='col-12 control-label no-padding' for='marca'>Nombres</label>
                <div class='col-12 no-padding'>
                    <!-- <input type='hidden' name='id' id='id'>
                    <input type='hidden' name='option' value='U'> -->
                    <input type='text' class='form-control input-sm' name='marca'  placeholder=''value='' >
                </div>
            </div>
            <div class='form-group'>
                <label class='col-12 control-label no-padding' for='marca'>Apellidos</label>
                <div class='col-12 no-padding'>
                    <!-- <input type='hidden' name='id' id='id'>
                    <input type='hidden' name='option' value='U'> -->
                    <input type='text' class='form-control input-sm' name='marca'  placeholder=''value=''>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-12 control-label no-padding' for='placa'>DNI, RUC</label>
                <div class='col-12 no-padding'>
                    <input type='text' class='form-control input-sm' name='placa'  placeholder=''value=''>
                    <input type='hidden' name='id' id='id'>
                    <input type='hidden' name='option' value='U'>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-12 control-label no-padding' for='color'>Dirección</label>
                <div class='col-12 no-padding'>
                    <!-- <input type='hidden' name='id' id='id'>
                    <input type='hidden' name='option' value='U'> -->
                    <input type='text' class='form-control input-sm' name='color'  placeholder=''value=''>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-12 control-label no-padding' for='estacionamiento'>Distrito</label>
                <div class='col-12 no-padding'>
                    <!-- <input type='hidden' name='id' id='id'>
                    <input type='hidden' name='option' value='U'> -->
                    <input type='text' class='form-control input-sm' name='estacionamiento' placeholder=''value=''>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-12 control-label no-padding' for='estacionamiento'>Provincia</label>
                <div class='col-12 no-padding'>
                    <!-- <input type='hidden' name='id' id='id'>
                    <input type='hidden' name='option' value='U'> -->
                    <input type='text' class='form-control input-sm' name='estacionamiento' placeholder=''value=''>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-12 control-label no-padding' for='estacionamiento'>Departamento</label>
                <div class='col-12 no-padding'>
                    <!-- <input type='hidden' name='id' id='id'>
                    <input type='hidden' name='option' value='U'> -->
                    <input type='text' class='form-control input-sm' name='estacionamiento'  placeholder=''value=''>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-12 control-label no-padding' for='estacionamiento'>Celular</label>
                <div class='col-12 no-padding'>
                    <!-- <input type='hidden' name='id' id='id'>
                    <input type='hidden' name='option' value='U'> -->
                    <input type='text' class='form-control input-sm' name='estacionamiento'  placeholder='' value=''>
                </div>
            </div>
            <div class='form-group'>
                <label class='col-12 control-label no-padding' for='estacionamiento'>Teléfono</label>
                <div class='col-12 no-padding'>
                    <!-- <input type='hidden' name='id' id='id'>
                    <input type='hidden' name='option' value='U'> -->
                    <input type='text' class='form-control input-sm' name='estacionamiento'  placeholder='' value=''>
                </div>
            </div>
            <div class='message' id='editMessage'></div>
            </form>
          </div>
          <div class='modal-footer'>
            <!-- <button type='button' class='btn btn-primary' onclick='ValidarRegistro();'>
            <i class='fa fa-save'></i> Guardar</button> -->
            
             <button id='btn_10' class='action-button btn btn-primary'onclick='ValidarRegistro();'' type='button' data-dismiss='modal' aria-label='Close' >
            Siguiente
             </button> 
            
            ";echo $salida;}
}else {
    $salida="No se pudo validar!!";
}

$salida.="
<script>

</script>
";
?>