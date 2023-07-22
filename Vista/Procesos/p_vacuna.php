<?php

/* 
 * Proyecto CareVet Veterinaria
 */

//---------------------------------------------------------------
//Recursos usuario
include_once '../Dashboard/session.php';
//---------------------------------------------------------------
//Recursos
include_once '../../DAO/clienteDAO.php';
include_once '../../Modelo/cliente.php';

$clienteDAO = new clienteDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/consultaDAO.php';
include_once '../../Modelo/consulta.php';

$consultaDAO = new consultaDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/mascotaDAO.php';
include_once '../../Modelo/mascota.php';

$mascotaDAO = new mascotaDAO();
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
include_once '../../DAO/detalle_vacunaDAO.php';
include_once '../../Modelo/detalle_vacuna.php';

$detalleVacunaDAO = new detalle_vacunaDAO();
//---------------------------------------------------------------

$accion = $_REQUEST['accion'];
$idconsulta = $_REQUEST['idconsulta'];

if($accion=="create"){
    
    $detalle_vacuna = new detalle_vacuna(null, null, $_POST['fechaproximadv'], $_POST['obsvac'], $_POST['idmascota'], $_POST['idvac']);
    
    $detalleVacunaDAO->crear($detalle_vacuna);
    
    echo "<script>window.location.href='../Dashboard/Consulta_detalle.php?data=$encoded_data&idconsulta=$idconsulta';</script>";
    
}

/*if($accion=="update"){
    $idconsulta = $_REQUEST['idconsulta'];
    $consulta = new consulta($_REQUEST['idconsulta'], $_POST['idcliente'], null, $_POST['comentario'], $_POST['idusu'], $_POST['idmascota'], null);
    
    $consultaDAO->actualizar($consulta);
    
    echo "<script>window.location.href='../Dashboard/Consulta_detalle.php?data=$encoded_data&idconsulta=$idconsulta';</script>";
}*/ 

if($accion=="delete"){
   
}