<?php

class detalle_vacunaDAO{
    
    /*function seleccionar($id){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="select a.nom_vacuna,a.des_vacuna,b.fechadetallevac,b.fechaproximadetallevac,b.obsdetallevac "
                . "from vacunas a join detallevacuna b on a.idvacuna=b.idvacuna where idmascota=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $dv= new detalle_vacuna2($row['nom_vacuna'],$row['des_vacuna'],$row['fechadetallevac'],$row['fechaproximadetallevac'],
                    $row['obsdetallevac']);
            $vec[] = $dv;
        }
            return $vec;
    }*/
    
    function seleccionar($id){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql ="select * from detallevacuna where idmascota=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $dv= new detalle_vacuna($row['iddetallevac'],$row['fechadetallevac'],$row['fechaproximadetallevac'],$row['obsdetallevac'],$row['idmascota'],
                    $row['idvacuna']);
            $vec[] = $dv;
        }
            return $vec;
    }
    
    function crear(detalle_vacuna $dv){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" INSERT INTO detallevacuna (fechadetallevac,fechaproximadetallevac,obsdetallevac,idmascota,idvacuna) VALUES (CURRENT_DATE,?,?,?,?)";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $fecproxima_dv = $dv->getFecha_proxdet();
        $obs_dv = $dv->getObs();
        $id_mas = $dv->getIdMascota();
        $id_vac = $dv->getIdvacuna();
        mysqli_stmt_bind_param($stmt, "ssss", $fecproxima_dv , $obs_dv, $id_mas, $id_vac);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    
}