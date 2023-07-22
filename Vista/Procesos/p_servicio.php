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
include_once '../../DAO/servicioDAO.php';
include_once '../../Modelo/servicio.php';

$servicioDAO = new servicioDAO();
//---------------------------------------------------------------

$accion = $_REQUEST['accion'];

if($accion=="create"){
    
    $servicio = new servicio (null, $_POST['nom_servicio'], null);
    
    $servicioDAO->crear($servicio);
    
    echo "<script>window.location.href='../Dashboard/Servicios_lista.php?data=$encoded_data';</script>";
    
    
}

if($accion=="update"){
    
    $servicio = new servicio ($_REQUEST['idservicio'], $_POST['nom_servicio'], null);
    
    $servicioDAO->actualizar($servicio);
    
    echo "<script>window.location.href='../Dashboard/Servicios_lista.php?data=$encoded_data';</script>";
}

if($accion=="up"){
    
    $servicio = new servicio ($_REQUEST['idservicio'], null, null);
    
    $servicioDAO->actualizarUp($servicio);
    
    echo "<script>window.location.href='../Dashboard/Servicios_lista.php?data=$encoded_data';</script>";
}

if($accion=="down"){
    
    $servicio = new servicio ($_REQUEST['idservicio'], null, null);
    
    $servicioDAO->actualizarDown($servicio);
    
    echo "<script>window.location.href='../Dashboard/Servicios_lista.php?data=$encoded_data';</script>";
} 

if($accion=="delete"){
   
}