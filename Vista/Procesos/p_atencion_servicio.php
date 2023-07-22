<?php

/* 
 * Proyecto CareVet Veterinaria
 */


//---------------------------------------------------------------
//Recursos usuario
include_once '../Dashboard/session.php';
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/atencion_servicioDAO.php';
include_once '../../Modelo/atencion_servicio.php';

$atencion_servicioDAO = new atencion_servicioDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/atencionDAO.php';
include_once '../../Modelo/atencion.php';

$atencionDAO = new atencionDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/servicioDAO.php';
include_once '../../Modelo/servicio.php';

$servicioDAO = new servicioDAO();
//---------------------------------------------------------------

$accion = $_REQUEST['accion'];

if($accion=="create"){
    $idatencion = $_POST['idatencion'];
    $atencion_servicio = new atencion_servicio(null, $_POST['idatencion'], $_POST['idservicio'], null, $_POST['comentario']);
    
    $atencion_servicioDAO->crear($atencion_servicio);
    
    echo "<script>window.location.href='../Dashboard/Atencion_detalle.php?data=$encoded_data&idatencion=$idatencion';</script>";
    
    
}

if($accion=="update"){
    $idatencion = $_POST['idatencion'];
    if(isset($_POST['idservicio'])){
        $idservicio = $_POST['idservicio'];
    }else{
        $idservicio = $atencion_servicioDAO->seleccionar_idtatencion_servicio(new atencion_servicio($_REQUEST['idatencion'], null, null, null, null))->getIdservicio();
    }
    $atencion_servicio = new atencion_servicio($_REQUEST['idatencion'], $_POST['idatencion'], $idservicio, null, $_POST['comentario']);
    
    $atencion_servicioDAO->actualizar($atencion_servicio);
    
    echo "<script>window.location.href='../Dashboard/Atencion_detalle.php?data=$encoded_data&idatencion=$idatencion';</script>";
}

if($accion=="delete"){
   
}