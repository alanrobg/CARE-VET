<?php



class sesionDAO {
    
    
    function crear(sesion $sesion){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql = "INSERT INTO sesion (key_ses,idusuario,fexpiracion_ses) values (?,?,DATE_ADD(now(),interval 1 hour))";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $hash = hash('sha256', rand());
        $idusu =$sesion->getIdusuario();
        mysqli_stmt_bind_param($stmt, "si",$hash, $idusu);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function seleccionar_key_ses(sesion $sesion){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql = "select * from sesion where key_ses= ? AND fexpiracion_ses > now()";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $key = $sesion->getKey_ses();
        mysqli_stmt_bind_param($stmt, "s", $key);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $ses = new sesion($row['idsesion'], $row['key_ses'], $row['idusuario']);
            return $ses;
        }else{
            return false;
        }
    }
    
    function seleccionar_idusuario(sesion $sesion){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql = "select * from sesion where idusuario= ? AND fexpiracion_ses > now()";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $idusu = $sesion->getIdusuario();
        mysqli_stmt_bind_param($stmt, "i", $idusu);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $ses = new sesion($row['idsesion'], $row['key_ses'], $row['idusuario']);
            return $ses;
        }else{
            return false;
        }
    }
    
    function eliminar(sesion $sesion){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" delete from sesion WHERE idsesion=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $ids = $sesion->getidsesion();
        mysqli_stmt_bind_param($stmt,"i",$ids);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function eliminar_key_ses(sesion $sesion){
        $cn = mysqli_connect("localhost", "id19715028_admin", "Admin123$", "id19715028_bd_veterinaria");
        $sql =" delete from sesion WHERE key_ses=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $key_ses = $sesion->getKey_ses();
        mysqli_stmt_bind_param($stmt,"s",$key_ses);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
