<!DOCTYPE html>

<!--
Proyecto CareVet Veterinaria
-->

<?php
$privilegio = 3;

//---------------------------------------------------------------
include_once './session.php';
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/consultaDAO.php';
include_once '../../Modelo/consulta.php';

$consultaDAO = new consultaDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/clienteDAO.php';
include_once '../../Modelo/cliente.php';

$clienteDAO = new clienteDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/mascotaDAO.php';
include_once '../../Modelo/mascota.php';

$mascotaDAO = new mascotaDAO();
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

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/tratamientoDAO.php';
include_once '../../Modelo/tratamiento.php';

$tratamientoDAO = new tratamientoDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/consulta_tratamientoDAO.php';
include_once '../../Modelo/consulta_tratamiento.php';

$consulta_tratamientoDAO = new consulta_tratamientoDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos Vacuna
include_once '../../DAO/vacunaDAO.php';
include_once '../../DAO/detalle_vacunaDAO.php';
include_once '../../Modelo/vacuna.php';
include_once '../../Modelo/detalle_vacuna.php';

$vacunaDAO = new vacunaDAO();
$detalle_vacunaDAO = new detalle_vacunaDAO();
//---------------------------------------------------------------


$idconsulta = $_REQUEST['idconsulta'];

$consulta = $consultaDAO->seleccionar_idconsulta(new consulta($idconsulta, null, null, null, null, null, null));




//Datos del Cliente
$idcliente = $consulta->getIdcliente();
$cliente = $clienteDAO->seleccionar_idcliente(new cliente($idcliente, null, null, null, null, null, null, null, null, null));
$namecli = $cliente->getNombre_cli(); $apellidocli = $cliente->getApellido_cli();

//Datos del Trabajados
$idtrabajador = $consulta->getIdusu();
$trabajador = $usuarioDAO->seleccionar_idusuario(new usuario($idtrabajador, null, null, null, null, null, null, null, null, null, null, null));
$nametrab = $trabajador->getNombre_usuario(); $apellidotrab = $trabajador->getApellido_usuario();

$idmascota = $consulta->getIdmascota();
$fecha = date("H:s  d/m/Y", strtotime($consulta->getFecha()));
$com = $consulta->getComentario();

//Datos del Usuario
$idusuario = $consulta->getIdusuario();
$usuario = $usuarioDAO->seleccionar_idusuario(new usuario($idusuario, null, null, null, null, null, null, null, null, null, null, null));
$nameusu = $usuario->getNombre_usuario(); $apellidousu = $usuario->getApellido_usuario();


?>
<html lang="en">
<head>
    <?php include './links.php';?>
    <title>CareVet Veterinaria</title>
</head>
<body id="cuerpo">
    
    <!--HEADER -->
    <?php include './Header.php';?>
    <!--HEADER -->
    
<?php include './Modal/Consulta_update.php';?>
<?php include './Modal/Consulta_tratamiento_new.php';?>
<?php include './Modal/Consulta_tratamiento_update.php';?>
<?php include './Modal/vacuna_detalle.php';?>
<?php include './Modal/vacuna_new.php';?>
<?php include './Modal/vacuna_lista.php';?>
<main class="main-content">
    
<div class="container bg-light mt-5 rounded-3" id="Nosotros">
    <div class="container py-4">	
        <div class="row my-3">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h1 class="display-6 fw-bold text-black textoIzquierda">Consulta Médica</h1>
            </div>
        </div>
        <div class="row my-3">
            <!-- Inicio Reserva Temp-------------------------------------------------------------------------- -->  
            <div class="col-sm-12 col-md-12 col-lg-12">
                <form class="formulario" method="post" action="">
                    <table cellpadding="10" class="tabcell">
                        <tr class="tabcell">
                            <td><button type="button" data-bs-toggle="modal" data-bs-target="#update<?=$idconsulta?>" class="btn btn-danger">Editar</button></td>
                        </tr>
                        <tr class="tabcell">
                            <td style="flex-basis: 30%"><label>Usuario:</label></td>
                            <td style="flex-basis: 70%">
                                <input size="30" readonly="" type="text" class="form-control" required="" name="" value="<?=$nameusu." ".$apellidousu?>">
                            </td>
                        </tr>
                        <tr class="tabcell">
                            <td style="flex-basis: 30%"><label>Veterinario:</label></td>
                            <td style="flex-basis: 70%">
                                <input readonly="" type="text" class="form-control" required="" name="" value="<?=$nametrab." ".$apellidotrab?>">
                            </td>
                        </tr>
                        <tr class="tabcell">
                            <td style="flex-basis: 30%"><label>Cliente:</label></td>
                            <td style="flex-basis: 70%">
                                <input readonly="" type="text" class="form-control" required="" name="" value="<?=$namecli." ".$apellidocli?>">
                            </td>
                        </tr>
                        <tr class="tabcell">
                            <td style="flex-basis: 30%"><label>Fecha de registro:</label></td>
                            <td style="flex-basis: 70%">
                                <input readonly="" type="text" class="form-control" required="" name="" value="<?=$fecha?>">
                            </td>
                        </tr>
                        <tr class="tabcell">
                            <td style="flex-basis: 30%"><label>Comentarios:</label></td>
                            <td style="flex-basis: 70%">
                                <textarea class="form-control" rows="3" cols="10" readonly=""><?=$com?></textarea>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            
   
            <div class="row my-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <table>
                        <tr>
                            <td><h2>Mascota</h2></td>
                            <td>&emsp;</td>
                            <td><button data-bs-toggle="modal" data-bs-target="#newVacuna" class="btn btn-primary">Nueva Aplicacion de Vacuna</button></td>
                            <td>&emsp;</td>
                            <td><button data-bs-toggle="modal" data-bs-target="#listaVacuna" class="btn btn-primary">Ver Vacunas</button></td>
                        
                        </tr>
                    </table>
                </div>


                <div class="col-sm-12 col-md-12 col-lg-12">
                    <table border='' class="ttable" width="100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Raza</th>
                                <th>Especie</th>
                                <th></th>
                            </tr>
                        </thead>

                        <!--FOREACH-->
                        <?php
                            $mascota = $mascotaDAO->seleccionar_idmascota(new mascota($idmascota, null, null, null, null, null, null, null, null));
                            $nom_mascota = $mascota->getNom_mascota();
                            $actual = date("Y-m-d");
                            $anios = date_diff(date_create($mascota->getNacimiento_mascota()), date_create($actual))->y;
                            $meses = date_diff(date_create($mascota->getNacimiento_mascota()), date_create($actual))->m;
                            $esteri = $esterilizacionDAO->seleccionar_idesterilizacion(new esterilizacion($mascota->getIdesterilizacion(), null))->getNom_esterilizacion();
                            $raza = $razaDAO->seleccionar_idraza(new raza($mascota->getIdraza(), null, null));
                            $especie = $especieDAO->seleccionar_idespecie(new especie($raza->getIdespecie(), null));
                            ?>
                            <tr>
                                <td><?=$nom_mascota?></td>
                                <td><?=$anios." Años y ".$meses." meses"?></td>
                                <td><?=$raza->getNom_raza()?></td>
                                <td><?=$especie->getNom_especie()?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailsmascota<?=$idmascota?>">
                                        Detalles
                                    </button>
                                </td>
                                <div class="modal fade" id="detailsmascota<?=$idmascota?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=$mascota->getNom_mascota()?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Cliente:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=$mascota->getIdcliente()?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Nacimiento:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=date("d/m/Y", strtotime($mascota->getNacimiento_mascota())) ?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Color:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=$mascota->getColor_mascota()?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Fecha de registro:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=date("H:m d/m/Y", strtotime($mascota->getRegistro_mascota()))?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Foto:</label>
                                                      <a class="btn btn-primary" target="_blanck" href="../<?=substr($mascota->getFoto_mascota(),33)?>">Abrir</a>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Esterilizado:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=$esteri?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Raza:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="<?=$mascota->getIdraza()?>" readonly="">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                      <label style="flex-basis: 40%" class="input-group-text">Especie:</label>
                                                      <input style="flex-basis: 60%" type="text" class="form-control" value="" readonly="">
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update<?=$idmascota?>">Editar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                            </tr>
                        <!--FIN FOREACH-->
                    </table>
                </div>
            </div>
            
            <div class="row my-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <table>
                        <tr>
                            <td><h2>Tratamientos</h2></td>
                            <td>&emsp;</td>
                            <td><button data-bs-toggle="modal" data-bs-target="#newtratamiento" class="btn btn-primary">Tratamiento</button></td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <table border='' class="ttable" width="90%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID_CONSULTA</th>
                                <th>Tratamiento</th>
                                <th>Fecha</th>
                                <th>Comentario</th>
                                <th></th><th></th>
                            </tr>
                        </thead>

                        <!--FOREACH-->
                        <?php
                        foreach ($consulta_tratamientoDAO->seleccionarxConsulta($idconsulta) as $kcontrat=>$dcontrat){
                            //DATOS DE SERVICIO
                            $idconsulta_tratamiento = $dcontrat->getIdconsulta_tratamiento();
                            $tratamiento = $tratamientoDAO->seleccionar_idtratamiento(new tratamiento($dcontrat->getIdtratamiento(), null, null));
                            $com = $dcontrat->getComentario();
                        ?>
                        <tr>
                            <td><?=$idconsulta_tratamiento?></td>
                            <td><?=$dcontrat->getIdconsulta()?></td>
                            <td><?=$tratamiento->getNom_tratamiento()?></td>
                            <td><?=date("H:m d/m/Y", strtotime($dcontrat->getFecha()))?></td>
                            <td><textarea class="form-control" rows="3" cols="25" readonly=""><?=$com?></textarea></td>
                            <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updtate_tratamiento<?=$idconsulta_tratamiento?>">Editar</button></td>
                            <td><a href="#" class="btn btn-danger">Eliminar</a></td>
                        </tr>
                        <?php    
                        }
                        ?>
                    </table>
                </div>
            </div>
            
            
        </div>
        </div>
</div>
</main>
	<!-- Component End  -->

  
</body>
<script src="../recursos/main.js"></script>
</html>
