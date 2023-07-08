<!DOCTYPE html>

<!--
Proyecto CareVet Veterinaria
-->


<?php

//---------------------------------------------------------------
include_once './session.php';
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/mascotaDAO.php';
include_once '../../Modelo/mascota.php';

$mascotaDAO = new mascotaDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/clienteDAO.php';
include_once '../../Modelo/cliente.php';

$clienteDAO = new clienteDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/esterilizacionDAO.php';
include_once '../../Modelo/esterilizacion.php';

$esterilizacionDAO = new esterilizacionDAO();
//---------------------------------------------------------------


//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/razaDAO.php';
include_once '../../Modelo/raza.php';

$razaDAO = new razaDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/especieDAO.php';
include_once '../../Modelo/especie.php';

$especieDAO = new especieDAO();
//---------------------------------------------------------------

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
                    <h1 class="display-6 fw-bold text-black izquierdo">Mascota Registrados</h1>
                </div>
            </div>
            <?php include './Modal/Mascota_new.php';?>
            <?php include './Modal/Mascota_update.php';?>
            <style>
                .filtro{
                    display: none;
                }
            </style>
            
                <div class="row my-3">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div style="display: flex; justify-content: flex-end">
                            <button data-bs-toggle="modal" data-bs-target="#newMascota" class="btn btn-primary">Crear Mascota</button>
                        </div>
                        <table border="1" width="100%" class="ttable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre mascota</th>
                                    <th>Cliente</th>
                                    <th>Raza</th>
                                    <th>Especie</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <!--FOREACH-->
                                <?php
                                foreach ($mascotaDAO->seleccionar() as $km=>$dm){
                                    $id = $dm->getIdmascota();
                                    $nom = $dm->getNom_mascota();
                                    $idcli = $dm->getIdcliente();
                                    $cliente = $clienteDAO->seleccionar_idcliente(new cliente($dm->getIdcliente(), null, null, null, null, null, null, null, null, null));
                                    $esteri = $esterilizacionDAO->seleccionar_idesterilizacion(new esterilizacion($dm->getIdesterilizacion(), null))->getNom_esterilizacion();
                                    $nomcli = $cliente->getNombre_cli();
                                    $apecli = $cliente->getApellido_cli();
                                    $raza = $razaDAO->seleccionar_idraza(new raza($dm->getIdraza(), null, null));
                                    $especie = $especieDAO->seleccionar_idespecie(new especie($raza->getIdespecie(), null));
                                    
                                ?>
                                <tr class="articulo">
                                    <td><?=$id?></td>
                                    <td><?=$nom?></td>
                                    <td><?=$nomcli." ".$apecli?></td>
                                    <td><?=$raza->getNom_raza()?></td>
                                    <td><?=$especie->getNom_especie()?></td>
                                    <td><div style="display:flex; flex-direction: row; justify-content: space-around">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#detailsmascota<?=$id?>">
                                            Detalles</button>
                                        <button class="btn btn-danger" type="button">Eliminar</button></div></td>
                                    <div class="modal fade" id="detailsmascota<?=$dm->getIdmascota()?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-title">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Datos de la Mascota</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Nombre:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=$dm->getNom_mascota()?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Cliente:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=$dm->getIdcliente()?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Nacimiento:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=date("d/m/Y", strtotime($dm->getNacimiento_mascota())) ?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Color:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=$dm->getColor_mascota()?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Fecha de registro:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=date("H:m d/m/Y", strtotime($dm->getRegistro_mascota()))?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Foto:</label>
                                                      <a class="btn btn-primary" target="_blanck" href="../<?=substr($dm->getFoto_mascota(),33)?>">Abrir</a>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Esterilizado:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=$esteri?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Raza:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=$dm->getIdraza()?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Especie:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="" readonly="">
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update<?=$dm->getIdmascota()?>">Editar</button>
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
