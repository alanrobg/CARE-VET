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


$accion = $_REQUEST['accion'];

if($accion=="create"){
    $aux = 0;
    $cliente = new cliente(null, $_POST['apellido_cli'], $_POST['nombre_cli'], $_POST['dni_cli'], $_POST['nacimiento_cli'], $_POST['direccion_cli'],
            $_POST['telefono_cli'], $_POST['email_cli'], null, $_POST['idusuario']);
    
    $clienteDNI = $clienteDAO->seleccionarxDNI($_POST['dni_cli']);
    
    if(empty($clienteDNI)){
        $clienteDAO->crear($cliente);
        $aux = 1;
    }else{
        echo "<script>window.location.href='../Dashboard/Cliente_lista.php?data=$encoded_data&error=dup';</script>";
    }
    //RETORNAR
    if ($aux == 1){
        echo "<script>window.location.href='../Dashboard/Cliente_lista.php?data=$encoded_data';</script>";
    }
    
}

if($accion=="update"){
    $aux = 0;
    $cliente = new cliente($_REQUEST['idcliente'], $_POST['apellido_cli'], $_POST['nombre_cli'], $_POST['dni_cli'], $_POST['nacimiento_cli'], $_POST['direccion_cli'],
            $_POST['telefono_cli'], $_POST['email_cli'], null, null);
    
    $clienteDNI = $clienteDAO->seleccionarxDNIupdate($_REQUEST['idcliente'], $_POST['dni_cli']);
    
    if(empty($clienteDNI)){
        $clienteDAO->actualizar($cliente);
        $aux = 1;
    }else{
        echo "<script>window.location.href='../Dashboard/Cliente_lista.php?data=$encoded_data&error=dup';</script>";
    }
    //RETORNAR
    if ($aux == 1){
        echo "<script>window.location.href='../Dashboard/Cliente_lista.php?data=$encoded_data';</script>";
    }
} 

if($accion=="delete"){
   
}