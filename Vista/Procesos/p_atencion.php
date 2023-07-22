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
include_once '../../DAO/atencionDAO.php';
include_once '../../Modelo/atencion.php';

$atencionDAO = new atencionDAO();
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


$accion = $_REQUEST['accion'];

if($accion=="create"){
    
    $atencion = new atencion(null, $_POST['idcliente'], null, $_POST['comentario'], $_POST['idusu'], $_POST['idmascota'], $_POST['idusuario']);
    
    $atencionDAO->crear($atencion);
    
    echo "<script>window.location.href='../Dashboard/Atencion_lista.php?data=$encoded_data';</script>";
    
}

if($accion=="update"){
    $idatencion = $_REQUEST['idatencion'];
    $atencion = new atencion($_REQUEST['idatencion'], $_POST['idcliente'], null, $_POST['comentario'], $_POST['idusu'], $_POST['idmascota'], null);
    
    $atencionDAO->actualizar($atencion);
    
    echo "<script>window.location.href='../Dashboard/Atencion_detalle.php?data=$encoded_data&idatencion=$idatencion';</script>";
} 

if($accion=="delete"){
   
}