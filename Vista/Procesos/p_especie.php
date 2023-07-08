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
//---------------------------------------------------------------

$accion = $_REQUEST['accion'];

if($accion=="create"){
    $aux = 0;
    $especie = new especie (null, $_POST['nom_especie']);
    
    if(empty($especieDNI)){
        $especieDAO->crear($especie);
        $aux = 1;
    }else{
        echo "<script>window.location.href='../Dashboard/Especie_lista.php?data=$encoded_data&error=dup';</script>";
    }
    //RETORNAR
    if ($aux == 1){
        echo "<script>window.location.href='../Dashboard/Especie_lista.php?data=$encoded_data';</script>";
    }
    
}

if($accion=="update"){
    $aux = 0;
    $especie = new especie ($_REQUEST['idespecie'], $_POST['nom_especie']);
    
    if(empty($especieDNI)){
        $especieDAO->actualizar($especie);
        $aux = 1;
    }else{
        echo "<script>window.location.href='../Dashboard/Especie_lista.php?data=$encoded_data&error=dup';</script>";
    }
    //RETORNAR
    if ($aux == 1){
        echo "<script>window.location.href='../Dashboard/Especie_lista.php?data=$encoded_data';</script>";
    }
} 

if($accion=="delete"){
   
}