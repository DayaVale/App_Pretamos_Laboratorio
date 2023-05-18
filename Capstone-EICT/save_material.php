<?php
// Llamar a la conexion con la base de datos.
require 'Conexion_BD.php';
session_start();
// Tomar los datos
$serial = $_POST['Serial'];
$material = strtolower($_POST['material']);
$cantidad = $_POST['cantidad'];
$observa = strtolower($_POST["obser"]);
$imagen = $_FILES['imagen']['name'];

// Pasamos el contenido a binario para no presentar problemas "UTF-8" y no tratar
// La imagen como texto


// Realizamos la Query 
$query = "INSERT INTO inventario_laboratorio(numero_serial,nombre_material,cantidad_total,observacion,imagen)
           VALUES('$serial', '$material', '$cantidad', '$observa','$imagen')";

#pg_set_client_encoding($conexion, "UTF8");
$consulta = pg_query($conexion,$query);

if($consulta){
    header("location: admin.php");
}else{
    echo "Salio algo mal";
}

pg_close();
?>