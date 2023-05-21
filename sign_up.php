<?php
// Llamo a la conexion que se encuentra en el archivo. 
// Esta conexion se conecta directamente con la base de datos.
require 'Conexion_BD.php';
session_start();

// Llamar datos y colocarlos en minúscula y concatenar el email.
$partea = strtolower($_POST['useaname']);
$parteb = strtolower($_POST['server']);
$email = $partea . '@' . $parteb;
$rol = $_POST['rol'];
$usuari = strtolower($_POST['useaname']);
$fname = strtolower($_POST['fname']);
$sname = strtolower($_POST['sname']);
$l1name = strtolower($_POST['l1name']);
$l2name = strtolower($_POST['l2name']);
$progra = strtolower($_POST['programa']);
$clave = $_POST['pass'];

// Realizar la query 
$query = "INSERT INTO usuarios (username, primernombre, segundonombre, primerapellido, segundoapellido, email, contrasena, programa, rol) 
            VALUES ('$usuari', '$fname', '$sname', '$l1name', '$l2name', '$email', '$_REQUEST[pass]', '$progra', '$rol')";

$consulta = $conn->query($query);

if ($consulta) {
    if ($rol == 'estudiante' || $rol == 'profesor') {
        header("Location: users.php");
    } else {
        header("Location: admin.php");
    }
} else {
    echo "Error en la consulta: " . $conn->errorInfo()[2];
}

$conn = null;
?>
