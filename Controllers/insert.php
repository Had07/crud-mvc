<?php
include '../Models/conexion.php';

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$dni=$_POST['dni'];
$fecha=$_POST['fecha'];
$correo=$_POST['correo'];

    $sql= "INSERT INTO persona (id_persona,nombre,apellido,dni,fecha_nac,correo) VALUES (0,'$nombre','$apellido','$dni','$fecha','$correo')";
    $query=mysqli_query($conexion, $sql);
    
    if($query){
        header("Location:../index.php");
    }
    else{ }

?>
