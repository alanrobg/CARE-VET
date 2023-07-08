<?php

/* 
 * Proyecto CareVet Veterinaria
 */

include '../Dashboard/session.php';

//---------------------------------------------------------------
//Recursos sesion
include_once '../../DAO/sesionDAO.php';
include_once '../../Modelo/sesion.php';
$sesionDAO = new sesionDAO();
//---------------------------------------------------------------

$accion = $_REQUEST['accion'];

if($accion=="delete"){
    
    $sesion = new sesion(null, $data['key'], null);
    $sesionDAO->eliminar_key_ses($sesion);
    
    echo "<script>window.location.href='../login.php?error=sesion_terminada';</script>";
    
}