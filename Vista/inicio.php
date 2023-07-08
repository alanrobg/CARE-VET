<!DOCTYPE html>

<!--
Proyecto CareVet Veterinaria
-->

<?php

//---------------------------------------------------------------
//Recursos usuario
include_once '../DAO/usuarioDAO.php';
include_once '../DAO/usuario_areaDAO.php';
include_once '../DAO/sesionDAO.php';
include_once '../Modelo/usuario.php';
include_once '../Modelo/usuario_area.php';
include_once '../Modelo/sesion.php';


$usuarioDAO = new usuarioDAO();
$usuario_areaDAO = new usuario_areaDAO();
$sesionDAO = new sesionDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Inicio de sesión
if(isset($_GET['data'])){
    $encoded_data = $_GET['data'];
    $data = unserialize(base64_decode($encoded_data));
    if(isset($data['key'])){
        $key = $data['key'];
        //----------------------------------------
        $sesion = $sesionDAO->seleccionar_key_ses(new sesion(null, $key, null));
        if($sesion==false){
            try{
                $sesionDAO->eliminar_key_ses(new sesion(null, $data['key'], null));
            } catch (Exception $ex) {
                echo $ex;
                echo "<script>window.location.href='./login.php?error=sesion_no_encontrada';</script>";
            }
            echo "<script>window.location.href='./login.php?error=sesionexpirada';</script>";
        }
        //----------------------------------------
        $usuario =  $usuarioDAO->seleccionar_idusuario(new usuario($sesion->getIdusuario(), null, null, null, null, null, null, null, null, null, null, null));
        if($usuario==false){
            echo "<script>window.location.href='./login.php?error=sesionexpirada';</script>";
        }
    }else{
        echo "<script>window.location.href='./login.php?error=sesion_no_encontrada';</script>";
    }
}else{
    echo "<script>window.location.href='./login.php?error=sesion_no_recibida';</script>";
}
//---------------------------------------------------------------

?>

<html lang="en" >
<head>
    <meta charset="UTF-8">
    <link href="recursos/estilo.css" rel="stylesheet" type="text/css"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>CareVet Veterinaria</title>
</head>

<body id="cuerpo">

<!--HEADER -->

<!--HEADER -->
<header >
    <nav id="cabecera" class="p-3 text-white">
        <div class="dropdown">
            <form action="./inicio.php?data=<?=$encoded_data?>" method="Post" enctype="" >
                <button class="izquierdo" id="logo-header">
                    <img src="./recursos/specialities-03.png" style="margin-top: -20px" width="100px" height="100px">
                </button>
            </form>
            
            <button class="dropdown-toggle izquierdo points" id="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"
                    type="button" style="margin-top: 10px; margin-left: 15px">
                <img src="./recursos/iconos/ajuste.png" width="50px" height="50px">
            </button>
            <ul class="dropdown-menu  dropdown-menu-dark">
                <li><a class="dropdown-item rounded-3 hover:bg-gray-300 nodeco" href="inicio.php?data=<?=$encoded_data?>">Inicio</a></li>
                <li><a class="dropdown-item" href="">Registros</a></li>
                <li><a class="dropdown-item" href="./Dashboard/Cliente_lista.php?data=<?=$encoded_data?>">Clientes</a></li>
                <li><a class="dropdown-item" href="./Dashboard/Mascota_lista.php?data=<?=$encoded_data?>">Mascotas</a></li>
                <li><a class="dropdown-item" href="./Dashboard/Usuario_lista.php.php?data=<?=$encoded_data?>">Usuarios</a></li>
                <li><a class="dropdown-item" href="./Dashboard/Raza_lista.php?data=<?=$encoded_data?>">Razas</a></li>
                <li><a class="dropdown-item" href="./Dashboard/Especie_lista.php?data=<?=$encoded_data?>">Especies</a></li>
                <li><a class="dropdown-item btn btn-danger" href="./Procesos/p_session.php?data=<?=$encoded_data?>&accion=delete">Salir</a></li>
            </ul>
        </div>   
<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="./inicio.php?data=<?=$encoded_data?>" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-200 nodeco" id="fuente1">Inicio</a></li>
            <li><a href="" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 nodeco" id="fuente1">Registros</a></li>
            <li><a href="./Dashboard/Cliente_lista.php?data=<?=$encoded_data?>" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 nodeco" id="fuente1">Clientes</a></li>
            <li><a href="./Dashboard/Mascota_lista.php?data=<?=$encoded_data?>" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 nodeco" id="fuente1">Mascotas</a></li>
            <li><a href="./Dashboard/Usuario_lista.php?data=<?=$encoded_data?>" class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-300 nodeco" id="fuente1">Usuarios</a></li>
        </ul>
        <div class="text-end dropdown flex items-center">
            <div class="flex items-center w-full h-12 px-3 mt-2 rounded nodeco show-desktop">
                <span class="ml-2 text-sm font-medium show-desktop" id="fuente1">Mantenimiento</span>
            </div>
            <button class="show-desktop dropdown-toggle" id="logo-header" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" 
                    style="margin-top: 20px;margin-left: -30px" title="Mantenimiento">
                <img src="./recursos/iconos/ajuste.png" width="70px" height="70px">
            </button>

            <ul class="dropdown-menu  dropdown-menu-dark">
                <li><a class="dropdown-item rounded-3 hover:bg-gray-300 nodeco" href="inicio.php?data=<?=$encoded_data?>">Inicio</a></li>
                <li><a class="dropdown-item" href="">Registros</a></li>
                <li><a class="dropdown-item" href="./Dashboard/Cliente_lista.php?data=<?=$encoded_data?>">Clientes</a></li>
                <li><a class="dropdown-item" href="./Dashboard/Mascota_lista.php?data=<?=$encoded_data?>">Mascotas</a></li>
                <li><a class="dropdown-item" href="./Dashboard/Usuario_lista.php.php?data=<?=$encoded_data?>">Usuarios</a></li>
                <li><a class="dropdown-item" href="./Dashboard/Raza_lista.php?data=<?=$encoded_data?>">Razas</a></li>
                <li><a class="dropdown-item" href="./Dashboard/Especie_lista.php?data=<?=$encoded_data?>">Especies</a></li>
                <li><a class="dropdown-item btn btn-danger" href="./Procesos/p_session.php?data=<?=$encoded_data?>&accion=delete">Salir</a></li>
            </ul>
        </div>
    </div>
</div>
    </nav>
</header>

<!--HEADER -->

<!--HEADER -->
<main class="main-content">
    <div class="container bg-light mt-5 rounded-3" id="Nosotros">
        <div class="container py-4">
            <div class="row my-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1 class="display-6 fw-bold text-black izquierdo">Inicio</h1>
                </div>
            </div>
            
            <div class="row my-3">
                
                <div class="row my-3">
                                <?php $area = $usuario_areaDAO->seleccionar_idusuario_area(new usuario_area($usuario->getIdearea(), null))->getNom_area(); ?>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                            <table width="" cellpadding="10">
                                <tr class="tabcell">
                                    <td style="flex-basis: 40%"><label>Apellido:</label></td>
                                    <td style="flex-basis: 65%">
                                        <input size="25" readonly="" type="text" class="form-control" value="<?=$usuario->getApellido_usuario()?>">
                                    </td>
                                </tr>
                                <tr class="tabcell">
                                    <td style="flex-basis: 40%"><label>Nombre:</label></td>
                                    <td style="flex-basis: 60%">
                                        <input size="25" readonly="" type="text" class="form-control" value="<?=$usuario->getNombre_usuario()?>">
                                    </td>
                                </tr>
                                <tr class="tabcell">
                                    <td style="flex-basis: 40%"><label>DNI:</label></td>
                                    <td style="flex-basis: 60%">
                                        <input readonly="" type="text" class="form-control" value="<?=$usuario->getDni_usuario()?>">
                                    </td>
                                </tr>
                                <tr class="tabcell">
                                    <td style="flex-basis: 40%"><label>Area:</label></td>
                                    <td style="flex-basis: 60%">
                                        <input readonly="" type="text" class="form-control" value="<?=$area?>">
                                    </td>
                                </tr>
                                <tr class="tabcell">
                                    <td style="flex-basis: 40%"><label>Fecha de Nacimiento:</label></td>
                                    <td style="flex-basis: 60%">
                                        <input readonly="" type="text" class="form-control" value="<?=date("d/m/Y", strtotime($usuario->getNacimiento_usuario()))?>">
                                    </td>
                                </tr>
                                <tr class="tabcell">
                                    <td style="flex-basis: 40%"><label>Dirección:</label></td>
                                    <td style="flex-basis: 60%">
                                        <input readonly="" type="text" class="form-control" value="<?=$usuario->getDireccion_usuario()?>">
                                    </td>
                                </tr>
                                <tr class="tabcell">
                                    <td style="flex-basis: 40%"><label>Telefono:</label></td>
                                    <td style="flex-basis: 60%">
                                        <input readonly="" type="text" class="form-control" value="<?=$usuario->getTelefono_usuario()?>">
                                    </td>
                                </tr>
                                <tr class="tabcell">
                                    <td style="flex-basis: 40%"><label>Correo:</label></td>
                                    <td style="flex-basis: 60%">
                                        <input readonly="" type="text" class="form-control" value="<?=$usuario->getCorreo_usuario()?>">
                                    </td>
                                </tr>
                            </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</main>
    <!-- Component End  -->
<script src="./recursos/main.js"></script>
</body>
</html>
