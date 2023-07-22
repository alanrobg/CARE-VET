<!DOCTYPE html>

<!--
Proyecto CareVet Veterinaria
-->

<?php

//---------------------------------------------------------------
//Administra codigos de errores
$error = "Usuario no encontrado";

//---------------------------------------------------------------
?>
<html>
<head>
    <meta charset="utf-8">
    <title>CareVet Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="recursos/estilo.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    
<img src="recursos/Login_1.jpg" class="imagen-fondo">
    <div class="contenedor-login text-center shadow border p-3 mt-5 rounded">
        <div class="cabezera-login">
            <img src="recursos/LOGIN2.png">
            <h3 class="mb-4">Login</h3>
        </div>
        <form action="Procesos/p_usuario.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control mb-4" id="Name" placeholder="Usuario" name="usuario_usu">
            </div>
            <div class="form-group">
              <input type="password" class="form-control mb-4" id="Password" placeholder="Contraseña" name="password_usu">
            </div>
            <input type="submit" class="btn btn-primary" value="Ingresar">
        </form>
    </div>
    <?php
    //
    if(isset($_GET['error'])){
       echo $error;
    }
    ?>
    
    
</body>
</html>
