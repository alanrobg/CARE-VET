<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of tratamientoDAO
 *
 * @author monso
 */
class tratamientoDAO {
    //put your code here
    function seleccionar(){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="select * from tratamiento";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $tratamiento= new tratamiento($row['idtratamiento'], $row['nom_tratamiento'], $row['estado']);
            $vec[]= $tratamiento;
        }
        return $vec;
    }
    
    function seleccionarxDisponibles(){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="select * from tratamiento where estado = 1";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $tratamiento= new tratamiento($row['idtratamiento'], $row['nom_tratamiento'], $row['estado']);
            $vec[]= $tratamiento;
        }
        return $vec;
    }
    
    function seleccionar_idtratamiento(tratamiento $tratamiento){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" select * from tratamiento where idtratamiento=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $tratamiento->getIdtratamiento();
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $tratamiento= new tratamiento($row['idtratamiento'], $row['nom_tratamiento'], $row['estado']);
            return $tratamiento;
        }else{
            return false;
        }
    }
    
    function crear(tratamiento $tratamiento){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria"); 
        $sql ="INSERT INTO tratamiento (nom_tratamiento, estado) VALUES (?,1)";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $nom_trat = $tratamiento->getNom_tratamiento();
        mysqli_stmt_bind_param($stmt, "s", $nom_trat);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function actualizar(tratamiento $tratamiento){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="UPDATE tratamiento SET nom_tratamiento = ? WHERE idtratamiento=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $tratamiento->getIdtratamiento();
        $nom_trat = $tratamiento->getNom_tratamiento();
        mysqli_stmt_bind_param($stmt, "si",$nom_trat, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function actualizarUp(tratamiento $tratamiento){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="UPDATE tratamiento SET  estado = 1 WHERE idtratamiento=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $tratamiento->getIdtratamiento();
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function actualizarDown(tratamiento $tratamiento){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="UPDATE tratamiento SET estado = 0 WHERE idtratamiento=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $tratamiento->getIdtratamiento();
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function eliminar(tratamiento $tratamiento){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" delete from tratamiento WHERE idtratamiento = ?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $id = $tratamiento->getIdtratamiento();
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
