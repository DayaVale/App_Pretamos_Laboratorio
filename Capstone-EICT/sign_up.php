<?php
// Llamo a la conexion que se encuentra en el archivo. 
// Esta conexion se conecta directamente con la base de datos.
require 'Conexion_BD.php';
session_start();

// Llamar datos y colocarlos en minuscula y concatenar el email.
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

//if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verificar que se haya enviado el formulario por el método POST
//    $rolSeleccionado = $_POST['rol']; // Obtener el valor seleccionado del elemento select
//    echo "El país seleccionado es: " . $rolSeleccionado; // Imprimir el valor seleccionado
//  }

// Realizar la query 
$query = "INSERT INTO usuarios (username,primernombre,segundonombre,primerapellido,segundoapellido,email,contrasena,programa,rol) 
            VALUES('$usuari','$fname','$sname','$l1name','$l2name','$email','$_REQUEST[pass]','$progra','$rol')";

$consulta = pg_query($conexion,$query);

if($consulta){
        if($rol == 'estudiante' or $rol == 'profesor'){
                header("location: users.php"); 
        }else{
                header("location: admin.php");
        }
}

pg_close();

?>