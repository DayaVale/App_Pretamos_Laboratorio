<?php
// Llamar a la conexión con la base de datos.
require 'Conexion_BD.php';
session_start();

// Guardar los datos de la reservación de insumos
$user_ide = $_POST['identificar2'];
$insumo_ide = $_POST['isumoID'];
$fecha_ini = $_POST['fecha1'];
$fecha_ter = $_POST['fecha2'];
$canti_re = $_POST['Nuevacantidad'];

// Realizar la consulta de inserción
$query2 = "INSERT INTO reservaciones (user_id, insumo_id, fecha_inicio, fecha_termi, cantidad_re)
           VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query2);
$stmt->execute([$user_ide, $insumo_ide, $fecha_ini, $fecha_ter, $canti_re]);

if ($stmt) {
    header("location: users.php");
} else {
    header("location: admin.php");
} else {
}

?>
