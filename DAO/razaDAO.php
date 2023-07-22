<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of razaDAO
 *
 * @author monso
 */
class razaDAO {
    //put your code here
    
    
    function seleccionar(){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="select * from raza";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $raza= new raza($row['idraza'], $row['nom_raza'], $row['idespecie']);
            $vec[]= $raza;
        }
        return $vec;
    }
    
    function seleccionar_idraza(raza $raza){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" select * from raza where idraza=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $idraza = $raza->getIdraza();
        mysqli_stmt_bind_param($stmt,"i",$idraza);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $raza= new raza($row['idraza'], $row['nom_raza'], $row['idespecie']);
            return $raza;
        }else{
            return false;
        }
    }
    
    function seleccionarxEspecie(raza $raza){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" select * from raza where idespecie=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $idespecie = $raza->getidespecie();
        mysqli_stmt_bind_param($stmt,"i",$idespecie);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $raza= new raza($row['idraza'], $row['nom_raza'], $row['idespecie']);
            return $raza;
        }else{
            return false;
        }
    }
    
    function crear(raza $raza){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria"); 
        $sql ="INSERT INTO raza (nom_raza, idespecie) VALUES (?,?)";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $nom_raza = $raza->getNom_raza();
        $idespecie = $raza->getIdespecie();
        mysqli_stmt_bind_param($stmt, "si", $nom_raza, $idespecie);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function actualizar(raza $raza){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="UPDATE raza SET nom_raza = ?, idespecie = ? WHERE idraza=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $raza->getIdraza();
        $nom_raza = $raza->getNom_raza();
        $idespecie = $raza->getIdespecie();
        mysqli_stmt_bind_param($stmt, "sii",$nom_raza, $idespecie, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    
    function eliminar(raza $raza){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" delete from raza WHERE idraza=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $raza->getIdraza();
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
