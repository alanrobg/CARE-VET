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
include_once '../../DAO/consulta_tratamientoDAO.php';
include_once '../../Modelo/consulta_tratamiento.php';

$consulta_tratamientoDAO = new consulta_tratamientoDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/consultaDAO.php';
include_once '../../Modelo/consulta.php';

$consultaDAO = new consultaDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/tratamientoDAO.php';
include_once '../../Modelo/tratamiento.php';

$tratamientoDAO = new tratamientoDAO();
//---------------------------------------------------------------

$accion = $_REQUEST['accion'];

if($accion=="create"){
    $idconsulta = $_POST['idconsulta'];
    $consulta_tratamiento = new consulta_tratamiento(null, $_POST['idconsulta'], $_POST['idtratamiento'], null, $_POST['comentario']);
    
    $consulta_tratamientoDAO->crear($consulta_tratamiento);
    
    echo "<script>window.location.href='../Dashboard/Consulta_detalle.php?data=$encoded_data&idconsulta=$idconsulta';</script>";
    
    
}

if($accion=="update"){
    $idconsulta = $_POST['idconsulta'];
    if(isset($_POST['idtratamiento'])){
        $idtratamiento = $_POST['idtratamiento'];
    }else{
        $idtratamiento = $tratamientoDAO->seleccionar_idtratamiento(new tratamiento($_REQUEST['idconsulta_tratamiento'], null, null))->getIdtratamiento();
    }
    $consulta_tratamiento = new consulta_tratamiento($_REQUEST['idconsulta_tratamiento'], $_POST['idconsulta'], $idtratamiento, null, $_POST['comentario']);
    
    $consulta_tratamientoDAO->actualizar($consulta_tratamiento);
    
    echo "<script>window.location.href='../Dashboard/Consulta_detalle.php?data=$encoded_data&idconsulta=$idconsulta';</script>";
}

if($accion=="delete"){
   
}