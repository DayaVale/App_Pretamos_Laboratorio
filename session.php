<?php
// Llamar a la conexion con la base de datos.
require 'Conexion_BD.php';
session_start();

// Guardo el usuario y la clave
$usuario = strtolower($_POST['user']);
$clave = $_POST['pass'];

// Realizar la query
$query = "SELECT * FROM usuarios WHERE username = :usuario AND contrasena = :clave";
$statement = $conn->prepare($query);
$statement->bindParam(':usuario', $usuario);
$statement->bindParam(':clave', $clave);
$statement->execute();

// Obtener el resultado de la consulta
$fila = $statement->fetch(PDO::FETCH_ASSOC);

if ($fila) {
    $rol = $fila['rol'];
    $name_comple = $fila['primernombre'] . ' ' . $fila['primerapellido'];
    $_SESSION['nombre'] = $name_comple;
    $_SESSION['identificar'] = $fila['username'];

    if ($rol == 'estudiante' || $rol == 'profesor') {
        header("location: users.php");
    } else {
        header("location: admin.php");
    }
} else {
    echo "Datos incorrectos";
}

$conn = null;
?>
