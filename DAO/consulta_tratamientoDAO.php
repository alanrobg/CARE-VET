<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of consulta_tratamientoDAO
 *
 * @author monso
 */
class consulta_tratamientoDAO {
    //put your code here
    function seleccionar(){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="select * from consulta_tratamiento";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $consulta_tratamiento= new consulta_tratamiento($row['idconsulta_tratamiento'], $row['idconsulta'], $row['idtratamiento'], $row['fecha'], $row['comentario']);
            $vec[]= $consulta_tratamiento;
        }
        return $vec;
    }
    
    function seleccionar_idconsulta_tratamiento(consulta_tratamiento $consulta_tratamiento){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" select * from consulta_tratamiento where idconsulta_tratamiento=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $consulta_tratamiento->getIdconsulta_tratamiento();
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $consulta_tratamiento= new consulta_tratamiento($row['idconsulta_tratamiento'], $row['idconsulta'], $row['idtratamiento'], $row['fecha'], $row['comentario']);
            return $consulta_tratamiento;
        }else{
            return false;
        }
    }
    
    function seleccionarxConsulta($idconsulta){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" select * from consulta_tratamiento where idconsulta=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_bind_param($stmt,"i",$idconsulta);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $consulta_tratamiento= new consulta_tratamiento($row['idconsulta_tratamiento'], $row['idconsulta'], $row['idtratamiento'], $row['fecha'], $row['comentario']);
            $vec[]= $consulta_tratamiento;
        }
        return $vec;
    }
    
    function crear(consulta_tratamiento $consulta_tratamiento){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria"); 
        $sql ="INSERT INTO consulta_tratamiento (idconsulta, idtratamiento,fecha,comentario) VALUES (?,?,NOW(),?)";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $idconsulta = $consulta_tratamiento->getIdconsulta();
        $idtratamiento = $consulta_tratamiento->getIdtratamiento();
        $com = $consulta_tratamiento->getComentario();
        mysqli_stmt_bind_param($stmt, "iis", $idconsulta, $idtratamiento, $com);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function actualizar(consulta_tratamiento $consulta_tratamiento){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="UPDATE consulta_tratamiento SET idconsulta = ?, idtratamiento = ?, comentario = ? WHERE idconsulta_tratamiento=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $consulta_tratamiento->getIdconsulta_tratamiento();
        $idconsulta = $consulta_tratamiento->getIdconsulta();
        $idtratamiento = $consulta_tratamiento->getIdtratamiento();
        $com = $consulta_tratamiento->getComentario();
        mysqli_stmt_bind_param($stmt, "iisi",$idconsulta, $idtratamiento, $com, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    
    function eliminar(consulta_tratamiento $consulta_tratamiento){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" delete from consulta_tratamiento WHERE idconsulta_tratamiento = ?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $consulta_tratamiento->getIdconsulta_tratamiento();
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
