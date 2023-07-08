<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mascotaDAO
 *
 * @author monso
 */
class mascotaDAO {
    //put your code here
    function seleccionar_idmascota(mascota $mascota){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql = "select * from mascota where idmascota= ?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $idmas = $mascota->getIdmascota();
        mysqli_stmt_bind_param($stmt, "i", $idmas);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $mascota = new mascota($row['idmascota'], $row['nom_mascota'], $row['idcliente'], $row['nacimiento_mascota'], $row['color_mascota'], $row['registro_mascota'],
                    $row['foto_mascota'],$row['esterilizado'], $row['idraza']);
            return $mascota;
        }else{
            return false;
        }
    }
    
    function seleccionar(){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql = "select * from mascota";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $mascota = new mascota($row['idmascota'], $row['nom_mascota'], $row['idcliente'], $row['nacimiento_mascota'], $row['color_mascota'], $row['registro_mascota'],
                    $row['foto_mascota'],$row['esterilizado'], $row['idraza']);
            $vec[]= $mascota;
        }
        return $vec;
    }
    
    function crear(mascota $mascota){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql ="INSERT INTO mascota (nom_mascota, idcliente, nacimiento_mascota, color_mascota, registro_mascota, foto_mascota"
                . ",esterilizado, idraza) VALUES (?,?,?,?,NOW(),?,?,?)";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $nom = $mascota->getNom_mascota();
        $idcli = $mascota->getIdcliente();
        $nac = $mascota->getNacimiento_mascota();
        $color = $mascota->getColor_mascota();
        $foto = $mascota->getFoto_mascota();
        $esteri = $mascota->getIdesterilizacion();
        $idraza = $mascota->getIdraza();
        mysqli_stmt_bind_param($stmt, "sisssii",$nom,$idcli,$nac,$color,$foto,$esteri,$idraza);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function actualizar(mascota $mascota){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql =" UPDATE mascota SET nom_mascota=?,idcliente=?,nacimiento_mascota=?,color_mascota=?,foto_mascota=?,esterilizado=? ,idraza = ? WHERE idmascota = ?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $mascota->getIdmascota();
        $nom = $mascota->getNom_mascota();
        $idcli = $mascota->getIdcliente();
        $nac = $mascota->getNacimiento_mascota();
        $color = $mascota->getColor_mascota();
        $foto = $mascota->getFoto_mascota();
        $esteri = $mascota->getIdesterilizacion();
        $idraza = $mascota->getIdraza();
        mysqli_stmt_bind_param($stmt, "sisssiii", $nom, $idcli, $nac, $color, $foto, $esteri, $idraza, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function eliminar(mascota $mascota){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql =" delete from mascota WHERE idmascota=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $idm = $mascota->getIdmascota();
        mysqli_stmt_bind_param($stmt,"i",$idm);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
}
