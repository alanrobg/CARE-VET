<!DOCTYPE html>

<!--
Proyecto CareVet Veterinaria
-->


<?php

//---------------------------------------------------------------
include_once './session.php';
//---------------------------------------------------------------

//--------------------------------------------------------------
include_once '../../DAO/usuario_areaDAO.php';
include_once '../../Modelo/usuario_area.php';


$usuarioDAO_area = new usuario_areaDAO();
?>
<html lang="en" >
<head>
    <?php include './links.php';?>
    <title>CareVet Veterinaria</title>
</head>

<!-------------------------------------------------SCRIPT PARA USU_DUPLIADOS------------------------------------------------->
<script>
    <?php
    if(isset($_REQUEST['error'])){
        if($_REQUEST['error'] == "dup"){
            ?>
            window.onload = function() {
            alert("El DNI / Usuario ingresado se repite en otro Usuario");
            }
            <?php
        }
    }
    ?>
</script>

<body id="cuerpo">
    
    <!--HEADER -->
    <?php include '../Dashboard/Header.php';?>
    <!--HEADER -->


<main class="main-content">
    <div class="container bg-light mt-5 rounded-3" id="Nosotros">
        <div class="container py-4">
            <div class="row my-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1 class="display-6 fw-bold text-black izquierdo">Usuario Registrados</h1>
                </div>
            </div>
            <?php 
            include './Modal/Usuario_new.php';
            include './Modal/Usuario_update.php';
            ?>
            <style>
                .filtro{
                    display: none;
                }
            </style>
                <div class="row my-3">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div style="display: flex; justify-content: flex-end">
                            <button data-bs-toggle="modal" data-bs-target="#newUsuario" class="btn btn-primary">Crear Usuario</button>
                        </div>
                        <table border="1" width="100%" class="ttable">
                            <thead>
                                <tr>
                                    <th>Apellido</th>
                                    <th>Nombre</th>
                                    <th>DNI</th>
                                    <th>Area</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <!--FOREACH-->
                                <?php
                                foreach ($usuarioDAO->seleccionar() as $k=>$d){
                                    $id = $d->getIdusuario();
                                    $apellido = $d->getApellido_usuario();
                                    $nom = $d->getNombre_usuario();
                                    $dni = $d->getDni_usuario();
                                    $area = $usuario_areaDAO->seleccionar_idusuario_area(new usuario_area($d->getIdearea(), null))->getNom_area();
                                    $direccion = $d->getDireccion_usuario();
                                    $nacimiento = date("d-m-Y", strtotime($d->getNacimiento_usuario()));
                                    $telefono = $d->getTelefono_usuario();
                                    $correo = $d->getCorreo_usuario();
                                    $contrato = $d->getContrato_usuario();
                                    $nom_usuario = $d->getUsu_usuario();
                                ?>
                                <tr class="articulo">
                                    <td><?=$apellido?></td>
                                    <td><?=$nom?></td>
                                    <td><?=$dni?></td>
                                    <td><?=$area?></td>
                                    <td><div style="display:flex; flex-direction: row; justify-content: space-around">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#DetallesUsuario<?=$id?>">
                                            Detalles</button>
                                        <button class="btn btn-danger" type="button">Eliminar</button></div></td>
                                    <div class="modal fade" id="DetallesUsuario<?=$id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-title">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Datos del Usuario</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Apellido:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$apellido?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Nombre:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$nom?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">DNI:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$dni?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Area:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$area?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Dirección:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$direccion?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Fecha de Nacimiento:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$nacimiento?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Telefono:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$telefono?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Correo:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$correo?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Contrato:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$contrato?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Usuario:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" name="" value="<?=$nom_usuario?>" readonly="">
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update<?=$id?>">Editar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>           

                                <?php    
                                } 
                                ?>
                                <!--FIN FOREACH-->
                        </table>
                    </div>

                </div>
        </div>
    </div>
</main>
	<!-- Component End  -->

<script src="../recursos/main.js"></script>
</body>
</html>
