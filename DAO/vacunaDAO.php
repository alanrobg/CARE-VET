<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vacunaDAO
 *
 * @author Raul
 */
class vacunaDAO {
    
    function seleccionar(){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="select * from vacunas";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $vacuna = new vacuna($row['idvacuna'], $row['nom_vacuna'],$row['des_vacuna']);
            $vec[]= $vacuna;
        }
        return $vec;
    }
    
    function seleccionar_idvacuna(Vacuna $vacuna){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql = "select * from vacunas where idvacuna= ?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $idvac = $vacuna->getIdvacuna();
        mysqli_stmt_bind_param($stmt, "i", $idvac);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $vacf = new vacuna($idvac,$row['nom_vacuna'],$row['des_vacuna']);
            return $vacf;
        }else{
            return false;
        }
    }
      
    function crear(vacuna $vacuna){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="INSERT INTO vacunas (nom_vacuna,des_vacuna) VALUES (?,?)";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $nom_vac = $vacuna->getNom_vacuna();
        $des_vac = $vacuna->getDes_vacuna();
        mysqli_stmt_bind_param($stmt, "ss",$nom_vac,$des_vac);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function actualizar(vacuna $vacuna){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="UPDATE vacunas SET nom_vacuna = ?, des_vacuna = ? WHERE idvacuna=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $vacuna->getIdvacuna();
        $nom_vacuna = $vacuna->getNom_vacuna();
        $des_vacuna = $vacuna->getDes_vacuna();
        mysqli_stmt_bind_param($stmt, "ssi",$nom_vacuna, $des_vacuna, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
