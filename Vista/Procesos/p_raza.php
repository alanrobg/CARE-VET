<?php

/* 
 * Proyecto CareVet Veterinaria
 */


//---------------------------------------------------------------
//Recursos usuario
include_once '../Dashboard/session.php';
//---------------------------------------------------------------
//Recursos
include_once '../../DAO/especieDAO.php';
include_once '../../Modelo/especie.php';

$especieDAO = new especieDAO();
//---------------------------------------------------------------
//
//
//Recursos usuario
include_once '../../DAO/razaDAO.php';
include_once '../../Modelo/raza.php';

$razaDAO = new razaDAO();
//---------------------------------------------------------------

$accion = $_REQUEST['accion'];

if($accion=="create"){
    
    $raza = new raza (null, $_POST['nom_raza'], $_POST['idespecie']);
   
    $razaDAO->crear($raza);
    
    echo "<script>window.location.href='../Dashboard/Raza_lista.php?data=$encoded_data';</script>";
    
    
}

if($accion=="update"){
    
    $raza = new raza ($_REQUEST['idraza'], $_POST['nom_raza'], $_POST['idespecie']);
    
    $razaDAO->actualizar($raza);
    
    echo "<script>window.location.href='../Dashboard/Raza_lista.php?data=$encoded_data';</script>";
} 

if($accion=="delete"){
   
}