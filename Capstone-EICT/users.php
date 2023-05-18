<?php
// Para obtener los datos de la persona
session_start();
// Verificar si el nombre de usuario está almacenado en la sesión
$nombreUsuario = $_SESSION['nombre'];
$identificar = $_SESSION['identificar']

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="stylescss/styles3.css" />
  <title>Index</title>
</head>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="tabs">
    <div class="tab-header">   
        <div class="active">
            <i class="fa fa-plus-square"> 
            </i> Reservar Equipo
        </div>
        <div>
            <i class="fa fa-file"> 
            </i>Prestamos Generales
        </div>
    </div>
    <div class="tab-indicator"></div>
    <div class="tab-content">
        <div class="active">
            <i class="fa fa-plus-square"></i>
            <h2>Prestamo de equipos</h2>
        </div>
        <div>
            <i class="fa fa-file"></i>
            <h2>Registro de Prestamos anteriores</h2>
        </div>

    </div>
</div>
<body>
    <header>
        <div class="container">
            <img src="https://urosario.edu.co/static/getattachment/e28f8d58-dafb-4a68-9f75-17f363672c0f/Noticia1-nova.jpg" alt="logo" class="logo">
        </div>
        <nav>
            <ul>
            <span class="nav-item"><?php echo $nombreUsuario; ?></span>
                <li><a href="login.html">Logout</a></li>
            </ul>
        </nav>
    </header>
    <script src="script.js"></script>
</body>