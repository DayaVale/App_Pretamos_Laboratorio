<?php
// Llamar a la conexión con la base de datos.
require 'Conexion_BD.php';
session_start();

// Tomar los datos
$serial = $_POST['Serial'];
$material = strtolower($_POST['material']);
$cantidad = $_POST['cantidad'];
$observa = strtolower($_POST["obser"]);
$imagen = $_FILES['imagen']['name'];

// Realizar la consulta de inserción
$query = "INSERT INTO inventario_laboratorio (numero_serial, nombre_material, cantidad_total, observacion, imagen)
           VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$serial, $material, $cantidad, $observa, $imagen]);

if ($stmt) {
    header("location: admin.php");
} else {
    echo "Salio algo mal";
}

?>
