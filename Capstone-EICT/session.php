<?php
// Llamar a la conexion con la base de datos.
require 'Conexion_BD.php';
session_start();

// Guardo el usuario y la clave
$usuario = strtolower($_POST['user']);
$clave = $_POST['pass'];

// Realizar la query
$query = "SELECT * FROM usuarios WHERE username = '$usuario' AND contrasena = '$clave'";
$consulta = pg_query($conexion,$query);
// Numero de filas si es vacio significa que no se encontro ese usuario.
//$cantidad = pg_num_rows($consulta)

// Dependiendo del rol redireccionaremos las paginas.
if($consulta){
    $fila = pg_fetch_assoc($consulta);
    $rol = $fila['rol'];
    $name_comple = $fila['primernombre'] .' '. $fila['primerapellido'];
    if($rol == 'estudiante' or $rol == 'profesor'){
        $_SESSION['nombre'] = $name_comple;
        $_SESSION['identificar'] = $fila['username'];
        header("location: users.php"); 
    }else{
        $_SESSION['nombre'] = $name_comple;
        $_SESSION['identificar'] = $fila['username'];
        header("location: admin.php");
    }
}else{
    echo "Datos incorrectos";
}

pg_close();
?>