<?php
// Llamar a la conexion con la base de datos.
require 'Conexion_BD.php';
session_start();

// Guardar los datos de la reservacion de insumos
$user_ide = $_POST['identificar2'];
$insumo_ide = $_POST['isumoID'];
$fecha_ini = $_POST['fecha1'];
$fecha_ter = $_POST['fecha2'];
$canti_re = $_POST['Nuevacantidad'];



// Realizaremos las siguientes consultas para tener en cuenta
//$query1 = "SELECT * FROM inventario_laboratorio WHERE numero_serial = '$insumo_ide'";


$query2 = "INSERT INTO reservaciones (user_id,insumo_id,fecha_inicio,fecha_termi,cantidad_re)
VALUES('$user_ide','$insumo_ide','$fecha_ini','$fecha_ter','$canti_re')";
$consulta2 = pg_query($conexion,$query2);

if($consulta2){
    header("location: admin.php"); 
}else{
    echo "Algo salio mal";
}

pg_close();
?>