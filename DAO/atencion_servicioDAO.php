<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of atencion_servicioDAO
 *
 * @author monso
 */
class atencion_servicioDAO {
    //put your code here
    function seleccionar(){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="select * from atencion_servicio";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $atencion_servicio= new atencion_servicio($row['idatencion_servicio'], $row['idatencion'], $row['idservicio'], $row['fecha'], $row['comentario']);
            $vec[]= $atencion_servicio;
        }
        return $vec;
    }
    
    function seleccionar_idtatencion_servicio(atencion_servicio $atencion_servicio){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" select * from atencion_servicio where idatencion_servicio=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $atencion_servicio->getIdatencion_servicion();
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $atencion_servicio= new atencion_servicio($row['idatencion_servicio'], $row['idatencion'], $row['idservicio'], $row['fecha'], $row['comentario']);
            return $atencion_servicio;
        }else{
            return false;
        }
    }
    
    function seleccionarxAtencion($idatencion){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="select * from atencion_servicio where idatencion=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_bind_param($stmt,"i",$idatencion);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $atencion_servicio= new atencion_servicio($row['idatencion_servicio'], $row['idatencion'], $row['idservicio'], $row['fecha'], $row['comentario']);
            $vec[]= $atencion_servicio;
        }
        return $vec;
    }
    
    function crear(atencion_servicio $atencion_servicio){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria"); 
        $sql ="INSERT INTO atencion_servicio (idatencion, idservicio,fecha,comentario) VALUES (?,?,NOW(),?)";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $ida = $atencion_servicio->getIdatencion();
        $ids = $atencion_servicio->getIdservicio();
        $com = $atencion_servicio->getComentario();
        mysqli_stmt_bind_param($stmt, "iis", $ida, $ids, $com);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function actualizar(atencion_servicio $atencion_servicio){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="UPDATE atencion_servicio SET idatencion = ?, idservicio = ?, comentario = ? WHERE idatencion_servicio=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $atencion_servicio->getIdatencion_servicion();
        $ida = $atencion_servicio->getIdatencion();
        $ids = $atencion_servicio->getIdservicio();
        $com = $atencion_servicio->getComentario();
        mysqli_stmt_bind_param($stmt, "iisi",$ida, $ids, $com, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    
    function eliminar(atencion_servicio $atencion_servicio){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" delete from atencion_servicio WHERE idatencion_servicio = ?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $atencion_servicio->getIdatencion_servicion();
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
