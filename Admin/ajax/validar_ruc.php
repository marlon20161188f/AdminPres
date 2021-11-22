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
                        <label class='col-12 control-label no-padding' for='nombre'>Nombre o razón social</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input disabled type='text' class='form-control input-sm' style='width: 423px;' name='nombre'  placeholder=' 'value='".$fila['nombre']." ".$fila['apellido']."' >
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='dniruc'>RUC</label>
                        <div class='col-12 no-padding'>
                            <input disabled type='text' class='form-control input-sm' name='dniruc'  placeholder=''value='".$fila['ruc']."'>
                            <input type='hidden' name='id_cliente' id='id_cliente' value='".$fila['id_cliente']."'>
                            <input type='hidden' name='apellido' value=''>
                            <input type='hidden' name='option' value='U'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='direccion'>Dirección</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input type='text' class='form-control input-sm' name='direccion'  placeholder=''value='".$fila['direccion']."'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='departamento'>Departamento</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input type='text' class='form-control input-sm' name='departamento'  placeholder=''value='".$fila['departamento']."'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='provincia'>Provincia</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input type='text' class='form-control input-sm' name='provincia' placeholder=''value='".$fila['provincia']."'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='distrito'>Distrito</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input type='text' class='form-control input-sm' name='distrito' placeholder=''value='".$fila['distrito']."'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='celular'>Celular</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input type='text' class='form-control input-sm' name='celular'  placeholder='' value='".$fila['celular']."'>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='col-12 control-label no-padding' for='telefono'>Teléfono</label>
                        <div class='col-12 no-padding'>
                            <!-- <input type='hidden' name='id' id='id'>
                            <input type='hidden' name='option' value='U'> -->
                            <input type='text' class='form-control input-sm' name='telefono'  placeholder='' value='".$fila['telefono']."'>
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
        $curl = curl_init();
        $data = [
            'token' => 'DQBXYYgKnc3vUZE5VNHzb6tmYM9xggxbBJMfxtscFtUSOnNRtJ8H9gu0DuU3',
            'ruc' => $q
        ];
        $post_data = http_build_query($data);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.migo.pe/api/v1/ruc",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $post_data,
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $consulta= json_decode($response);
        }
        if(!isset($consulta->ruc)){
            $query2=$conexion->prepare("SELECT MAX(id_cliente) AS id FROM clientes");
        $resultado2=$query2->execute();
        while($fila = $query2->fetch(PDO::FETCH_ASSOC)){
            $lastid=$fila['id']+1;
        }
                $salida.=" 
                <div class='row' id='validarcliente'>
                <div class='form-group'>
                    <label class='col-12 control-label no-padding' for='nombre'>Nombre o razón social</label>
                    <div class='col-12 no-padding'>
                        <!-- <input type='hidden' name='id' id='id'>
                        <input type='hidden' name='option' value='U'> -->
                        <input type='text' class='form-control input-sm' style='width: 423px;' name='nombre'  placeholder=''value='' >

                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-12 control-label no-padding' for='dniruc'>RUC</label>
                    <div class='col-12 no-padding'>
                        <input disabled type='text' class='form-control input-sm' placeholder='".$q."' value='".$q."'>
                        <input hidden type='text' class='form-control input-sm' name='dniruc'  placeholder='".$q."' value='".$q."'>
                        <input type='hidden' name='id_cliente' id='id_cliente' value=''>
                        <input type='hidden' name='apellido' value=''>
                        <input type='hidden' name='option' value='C'>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-12 control-label no-padding' for='direccion'>Dirección</label>
                    <div class='col-12 no-padding'>
                        <!-- <input type='hidden' name='id' id='id'>
                        <input type='hidden' name='option' value='U'> -->
                        <input type='text' class='form-control input-sm' name='direccion'  placeholder=''value=''>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-12 control-label no-padding' for='departamento'>Departamento</label>
                    <div class='col-12 no-padding'>
                        <!-- <input type='hidden' name='id' id='id'>
                        <input type='hidden' name='option' value='U'> -->
                        <input type='text' class='form-control input-sm' name='departamento'  placeholder=''value=''>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-12 control-label no-padding' for='provincia'>Provincia</label>
                    <div class='col-12 no-padding'>
                        <!-- <input type='hidden' name='id' id='id'>
                        <input type='hidden' name='option' value='U'> -->
                        <input type='text' class='form-control input-sm' name='provincia' placeholder=''value=''>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-12 control-label no-padding' for='distrito'>Distrito</label>
                    <div class='col-12 no-padding'>
                        <!-- <input type='hidden' name='id' id='id'>
                        <input type='hidden' name='option' value='U'> -->
                        <input type='text' class='form-control input-sm' name='distrito' placeholder=''value=''>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-12 control-label no-padding' for='celular'>Celular</label>
                    <div class='col-12 no-padding'>
                        <!-- <input type='hidden' name='id' id='id'>
                        <input type='hidden' name='option' value='U'> -->
                        <input type='text' class='form-control input-sm' name='celular'  placeholder='' value=''>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-12 control-label no-padding' for='telefono'>Teléfono</label>
                    <div class='col-12 no-padding'>
                        <!-- <input type='hidden' name='id' id='id'>
                        <input type='hidden' name='option' value='U'> -->
                        <input type='text' class='form-control input-sm' name='telefono'  placeholder='' value=''>
                    </div>
                </div>
                </div>
    
    <div class='message' id='editMessage'></div>
    </form>
  </div>
  <div class='modal-footer'>
    <!-- <button type='button' class='btn btn-primary' onclick='ValidarRegistro();'>
    <i class='fa fa-save'></i> Guardar</button> -->
    
     <button id='btn_10' class='action-button btn btn-primary'onclick='actualizarCliente(); idRegistro(".$lastid.");' type='button' data-dismiss='modal' aria-label='Close' >
    Continuar
     </button>
        ";echo $salida;
    }else{
        $name=$consulta->nombre_o_razon_social;
        $direccion=$consulta->direccion;
        $provincia=$consulta->provincia;
        $departamento=$consulta->departamento;
        $distrito=$consulta->distrito;
        $query2=$conexion->prepare("SELECT MAX(id_cliente) AS id FROM clientes");
        $resultado2=$query2->execute();
        while($fila = $query2->fetch(PDO::FETCH_ASSOC)){
            $lastid=$fila['id']+1;
        }
        $salida.=" 
        <div class='row' id='validarcliente'>
        <div class='form-group'>
            <label class='col-12 control-label no-padding' for='nombre'>Nombre o razón social</label>
            <div class='col-12 no-padding'>
                <!-- <input type='hidden' name='id' id='id'>
                <input type='hidden' name='option' value='U'> -->
                <input disabled type='text' class='form-control input-sm' style='width: 423px;' placeholder='".$name."'value='".$name."' >
                <input hidden type='text' class='form-control input-sm' style='width: 423px;' name='nombre'  placeholder='".$name."'value='".$name."' >
            </div>
        </div>
        <div class='form-group'>
            <label class='col-12 control-label no-padding' for='dniruc'>RUC</label>
            <div class='col-12 no-padding'>
                <input disabled type='text' class='form-control input-sm' placeholder='".$q."' value='".$q."'>
                <input hidden type='text' class='form-control input-sm' name='dniruc'  placeholder='".$q."' value='".$q."'>
                <input type='hidden' name='id_cliente' id='id_cliente' value=''>
                <input type='hidden' name='option' value='C'>
            </div>
        </div>
        <div class='form-group'>
            <label class='col-12 control-label no-padding' for='direccion'>Dirección</label>
            <div class='col-12 no-padding'>
                <!-- <input type='hidden' name='id' id='id'>
                <input type='hidden' name='option' value='U'> -->
                <input type='text' class='form-control input-sm' name='direccion'  placeholder='".$direccion."'value='".$direccion."'>
            </div>
        </div>
        <div class='form-group'>
            <label class='col-12 control-label no-padding' for='departamento'>Departamento</label>
            <div class='col-12 no-padding'>
                <!-- <input type='hidden' name='id' id='id'>
                <input type='hidden' name='option' value='U'> -->
                <input type='text' class='form-control input-sm' name='departamento'  placeholder='".$departamento."'value='".$departamento."'>
            </div>
        </div>
        <div class='form-group'>
            <label class='col-12 control-label no-padding' for='provincia'>Provincia</label>
            <div class='col-12 no-padding'>
                <!-- <input type='hidden' name='id' id='id'>
                <input type='hidden' name='option' value='U'> -->
                <input type='text' class='form-control input-sm' name='provincia' placeholder='".$provincia."'value='".$provincia."'>
            </div>
        </div>
        <div class='form-group'>
            <label class='col-12 control-label no-padding' for='distrito'>Distrito</label>
            <div class='col-12 no-padding'>
                <!-- <input type='hidden' name='id' id='id'>
                <input type='hidden' name='option' value='U'> -->
                <input type='text' class='form-control input-sm' name='distrito' placeholder='".$distrito."'value='".$distrito."'>
            </div>
        </div>
        <div class='form-group'>
            <label class='col-12 control-label no-padding' for='celular'>Celular</label>
            <div class='col-12 no-padding'>
                <!-- <input type='hidden' name='id' id='id'>
                <input type='hidden' name='option' value='U'> -->
                <input type='text' class='form-control input-sm' name='celular'  placeholder='' value=''>
            </div>
        </div>
        <div class='form-group'>
            <label class='col-12 control-label no-padding' for='telefono'>Teléfono</label>
            <div class='col-12 no-padding'>
                <!-- <input type='hidden' name='id' id='id'>
                <input type='hidden' name='option' value='U'> -->
                <input type='text' class='form-control input-sm' name='telefono'  placeholder='' value=''>
            </div>
        </div>
        </div>

<div class='message' id='editMessage'></div>
</form>
</div>
<div class='modal-footer'>
<!-- <button type='button' class='btn btn-primary' onclick='ValidarRegistro();'>
<i class='fa fa-save'></i> Guardar</button> -->

<button id='btn_10' class='action-button btn btn-primary'onclick='actualizarCliente(); idRegistro(".$lastid.");' type='button' data-dismiss='modal' aria-label='Close' >
Continuar
</button>
";echo $salida;
        
    }
    }
}else {
    $salida="No se pudo validar!!";
}

$salida.="
<script>

</script>
";
?>