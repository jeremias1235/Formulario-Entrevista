<?php

require_once "conexion.php";
$conexion=conexion();

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$username=$_POST['email'];
$password=$_POST['contra'];
$provincia=$_POST['provi'];
$fecha_hora=$_POST['fecha'];

   $sql="INSERT INTO usuarios (nombre,apellido,username, password,provincia, fecha_hora)
            VALUES ('$nombre','$apellido','$username','$password','$provincia', '$fecha_hora')";

    sleep(2);
    $result=mysqli_query($conexion,$sql);

    if ($result) {
        echo 0;   
    } else {
        
        echo 1;
    }
    






?>