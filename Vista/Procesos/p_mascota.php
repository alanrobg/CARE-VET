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
include_once '../../DAO/mascotaDAO.php';
include_once '../../Modelo/mascota.php';

$mascotaDAO = new mascotaDAO();
//---------------------------------------------------------------


//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/clienteDAO.php';
include_once '../../Modelo/cliente.php';

$clienteDAO = new clienteDAO();
//---------------------------------------------------------------



$accion = $_REQUEST['accion'];

if($accion=="create"){
    
    $cliente = $clienteDAO->seleccionar_idcliente(new cliente($_POST['idcli'], null, null, null, null, null, null, null, null, null));
    $nomcli = $cliente->getNombre_cli(); $apecli = $cliente->getApellido_cli(); $dni = $cliente->getDni_cli();
    
    $fecha = date("h-i-s_d-m-Y");
    
    //$carpeta = "/xampp/htdocs/carevet_proy/Vista/Mascotas_Fotos/".$_POST['nombre']."-".$nomcli."_".$apecli."_".$dni."/";
    $carpeta = "/public_html/Vista/Mascotas_Fotos/".$_POST['nombre']."-".$nomcli."_".$apecli."_".$dni."/";
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    
    $exten = strtolower(pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION));
    $direc_archivo = $carpeta.$fecha.".".$exten;
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $direc_archivo)){
        echo "The file " . htmlspecialchars(basename($_FILES['fileToUpload']['name'])) . "has been uploaded.";
    }else{
        echo "Sorry there was an error uploading your file.";
    }
    
    $mascota = new mascota(null, $_POST['nombre'], $_POST['idcli'], $_POST['nacimiento'], $_POST['color'], null, $direc_archivo,$_POST['esterilizado'], $_POST['raza']);
    $mascotaDAO->crear($mascota);
    echo "<script>window.location.href='../Dashboard/Mascota_lista.php?data=$encoded_data';</script>";
    
}

if($accion=="update"){
    
    $cliente = $clienteDAO->seleccionar_idcliente(new cliente($_POST['idcli'], null, null, null, null, null, null, null, null, null));
    $nomcli = $cliente->getNombre_cli(); $apecli = $cliente->getApellido_cli(); $dni = $cliente->getDni_cli();
    
    if($_FILES['fileToUpload'] ['error'] === UPLOAD_ERR_OK){
        
        $fecha = date("h-i-s_d-m-Y");

        //$carpeta = "/xampp/htdocs/carevet_proy/Vista/Mascotas_Fotos/".$_POST['nombre']."-".$nomcli."_".$apecli."_".$dni."/";
        $carpeta = "/public_html/Vista/Mascotas_Fotos/".$_POST['nombre']."-".$nomcli."_".$apecli."_".$dni."/";
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        $exten = strtolower(pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION));
        $direc_archivo = $carpeta.$fecha.".".$exten;
        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $direc_archivo)){
            echo "The file " . htmlspecialchars(basename($_FILES['fileToUpload']['name'])) . "has been uploaded.";
        }else{
            echo "Sorry there was an error uploading your file.";
        }

        $mascota = new mascota($_REQUEST['idmascota'], $_POST['nombre'], $_POST['idcli'], $_POST['nacimiento'], $_POST['color'], null, $direc_archivo,$_POST['esterilizado'], $_POST['raza']);
        $mascotaDAO->actualizar($mascota);
        
        echo "<script>window.location.href='../Dashboard/Mascota_lista.php?data=$encoded_data';</script>";
        
    }else{
        $mascotatp = $mascotaDAO->seleccionar_idmascota(new mascota($_REQUEST['idmascota'], null, null, null, null, null, null, null, null)) ;
        $foto = $mascotatp->getFoto_mascota();

        $mascota = new mascota($_REQUEST['idmascota'], $_POST['nombre'], $_POST['idcli'], $_POST['nacimiento'], $_POST['color'], null, $foto,$_POST['esterilizado'], $_POST['raza']);
        $mascotaDAO->actualizar($mascota);

        echo "<script>window.location.href='../Dashboard/Mascota_lista.php?data=$encoded_data';</script>";

        
    }
    
} 

if($accion=="delete"){
   
}