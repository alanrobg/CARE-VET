<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of esterilizacionDAO
 *
 * @author monso
 */
class esterilizacionDAO {
    //put your code here
    function seleccionar_idesterilizacion(esterilizacion $esterilizacion){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql = "select * from esterilizacion where idesterilizacion= ?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $idest = $esterilizacion->getIdesterilizacion();
        mysqli_stmt_bind_param($stmt, "i", $idest);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $est = new esterilizacion($row['idesterilizacion'], $row['nom_esterilizacion']);
            return $est;
        }else{
            return false;
        }
    }
    
    function seleccionar(){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql = "select * from esterilizacion";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $esterilizacion = new esterilizacion($row['idesterilizacion'], $row['nom_esterilizacion']);
            $vec[]= $esterilizacion;
        }
        return $vec;
    }
    
}
