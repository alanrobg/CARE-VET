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
include_once '../../DAO/tratamientoDAO.php';
include_once '../../Modelo/tratamiento.php';

$tratamientoDAO = new tratamientoDAO();
//---------------------------------------------------------------

$accion = $_REQUEST['accion'];

if($accion=="create"){
    
    $tratamiento = new tratamiento (null, $_POST['nom_tratamiento'], null);
    
    $tratamientoDAO->crear($tratamiento);
    
    echo "<script>window.location.href='../Dashboard/Tratamiento_lista.php?data=$encoded_data';</script>"; 
}

if($accion=="update"){
    
    $tratamiento = new tratamiento ($_REQUEST['idtratamiento'], $_POST['nom_tratamiento'], null);
    
    $tratamientoDAO->actualizar($tratamiento);
    
    echo "<script>window.location.href='../Dashboard/Tratamiento_lista.php?data=$encoded_data';</script>";
}

if($accion=="up"){
    
    $tratamiento = new tratamiento ($_REQUEST['idtratamiento'], null, null);
    
    $tratamientoDAO->actualizarUp($tratamiento);
    
    echo "<script>window.location.href='../Dashboard/Tratamiento_lista.php?data=$encoded_data';</script>";
}

if($accion=="down"){
    
    $tratamiento = new tratamiento ($_REQUEST['idtratamiento'], null, null);
    
    $tratamientoDAO->actualizarDown($tratamiento);
    
    echo "<script>window.location.href='../Dashboard/Tratamiento_lista.php?data=$encoded_data';</script>";
} 

if($accion=="delete"){
   
}