<?php
  if($_POST['click'] == '1'){
    $mysqli2=new mysqli("b7nvpy1vtadduxzlqosv-mysql.services.clever-cloud.com","ulcoechpsy7vemc6","poShw9zjQ6zjJHwl5bZ3","b7nvpy1vtadduxzlqosv");
    $q=$mysqli2->real_escape_string($_POST['placa']);
    $fecha=$_POST['fecha'];
    $sql = "INSERT INTO registro_ingreso(placa,fecha)
     VALUES('".$q."','".$fecha."')";
    $mysqli2->query($sql);
        echo json_encode(array('success' => 2));
}


?>