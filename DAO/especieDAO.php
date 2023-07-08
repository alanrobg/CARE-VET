<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of especieDAO
 *
 * @author monso
 */
class especieDAO {
    //put your code here
    
    function seleccionar(){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql ="select * from especie";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $esp= new especie($row['idespecie'], $row['nom_especie']);
            $vec[]= $esp;
        }
        return $vec;
    }
    
    function seleccionar_idespecie(especie $especie){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql =" select * from especie where idespecie=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $idespecie=$especie->getidespecie();
        mysqli_stmt_bind_param($stmt,"i",$idespecie);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $esp= new especie($row['idespecie'], $row['nom_especie']);
            return $esp;
        }else{
            return false;
        }
    }
    
    function crear(especie $especie){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql ="INSERT INTO especie (nom_especie) VALUES (?)";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $nom_esp = $especie->getnom_especie();
        mysqli_stmt_bind_param($stmt, "s",$nom_esp);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function actualizar(especie $especie){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql ="UPDATE especie SET nom_especie=? WHERE idespecie=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $especie->getidespecie();
        $nom_esp = $especie->getnom_especie();
        mysqli_stmt_bind_param($stmt, "si",$nom_esp, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    /*
    function crear(especie $especie){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        if (!$cn) {
            echo "Error de conexión: " . mysqli_connect_error();
            return;
        }
        $sql = "INSERT INTO especie (nom_especie) VALUES (?)";
        $stmt = mysqli_stmt_init($cn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error en la preparación de la declaración: " . mysqli_stmt_error($stmt);
            mysqli_close($cn);
            return;
        }

        $nom_especie = $especie->getnom_especie();
        mysqli_stmt_bind_param($stmt, "s", $nom_especie);

        if (!mysqli_stmt_execute($stmt)){
            echo "Error al ejecutar la consulta: " . mysqli_stmt_error($stmt);
        } else {
            echo "Registro insertado correctamente.";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($cn);
    }
    
    function actualizar(especie $especie){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        if (!$cn) {
            echo "Error de conexión: " . mysqli_connect_error();
            return;
        }

        $sql = "UPDATE especie SET nom_especie=? WHERE idespecie=?";
        $stmt = mysqli_stmt_init($cn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error en la preparación de la declaración: " . mysqli_stmt_error($stmt);
            mysqli_close($cn);
            return;
        }

        $nom_especie = $especie->getnom_especie();
        $idespecie = $especie->getidespecie();
        mysqli_stmt_bind_param($stmt, "si", $nom_especie, $idespecie);

        if (!mysqli_stmt_execute($stmt)){
            echo "Error al ejecutar la consulta: " . mysqli_stmt_error($stmt);
        } else {
            echo "Registro actualizado correctamente.";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($cn);
    }
    */
    function eliminar(especie $especie){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql =" delete from especie WHERE idespecie=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $ide = $especie->getidespecie();
        mysqli_stmt_bind_param($stmt,"i",$ide);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
