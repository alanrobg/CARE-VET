<?php



class usuario_areaDAO {
    
    
    function seleccionar(){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql = "select * from usuario_area";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }

        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $usu_are = new usuario_area($row['idusuario_area'], $row['nom_area']);
            $vec[]= $usu_are;
        }
        return $vec;
    }
    
    function seleccionar_idusuario_area(usuario_area $usuario_area){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql = "select * from usuario_area where idusuario_area= ?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $idusu_are = $usuario_area->getIdusuario_area();
        mysqli_stmt_bind_param($stmt, "i", $idusu_are);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $usu_are = new usuario_area($row['idusuario_area'], $row['nom_area']);
            return $usu_are;
        }else{
            return false;
        }
    }
    
    
}
