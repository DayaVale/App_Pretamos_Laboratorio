<?php

// http://localhost/Capstone-EICT/conexion_BDD.php

$conexion = pg_connect("host=localhost dbname=EICTTEPRESTA user=postgres password=passwordCandy");

// Realizar una query
$query = "SELECT primernombre FROM usuarios";
$consulta = pg_query($conexion,$query);
// Verificación de la consulta
// el comando pg_num_row($consulta) Saca el numero de filas.

if($consulta){
    echo "<p>SU NOMBRE ES:</p>";
    echo pg_fetch_object($consulta)->primernombre; // Saca el objeto de la base de datos
}

// Para ver si la conexion funciono correctamente
//if($conexion){
//    echo "Conecto correctamente";
//}
//else{
//    echo "No conecto";
//}

?>