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
include_once '../../DAO/vacunaDAO.php';
include_once '../../Modelo/vacuna.php';

$vacunaDAO = new vacunaDAO();
//---------------------------------------------------------------

$accion = $_REQUEST['accion'];

if($accion=="create"){
    
    $vacuna = new vacuna(null, $_POST['nom_vacuna'], $_POST['des_vacuna']);
    
    $vacunaDAO->crear($vacuna);
    
    echo "<script>window.location.href='../Dashboard/vacuna_lista.php?data=$encoded_data';</script>";
    
}

if($accion=="update"){
    $idvac = $_REQUEST['idvac'];
    $vacuna = new vacuna($idvac, $_POST['nom_vacuna'], $_POST['des_vacuna']);
    
    $vacunaDAO->actualizar($vacuna);
    
    echo "<script>window.location.href='../Dashboard/vacuna_lista.php?data=$encoded_data';</script>";
}

if($accion=="delete"){
   
}