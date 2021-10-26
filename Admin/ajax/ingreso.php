<?php
         $mysqli=new mysqli("localhost","root","","controllocal");
         $sql = "INSERT INTO registro_ingreso(placa,usuario)
          VALUES('$q',':usuario')";

            if($mysqli->query($sql) === true){
            echo "<div><form action=''>registro exitoso</form></div>";
            }else{
            die("Error al insertar datos: " . $mysqli->error);
            }
            $mysqli->close();


?>