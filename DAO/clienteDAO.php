<?php




class clienteDAO {
    
    function seleccionar(){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql ="select * from cliente";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $vec = [];
        while($row = mysqli_fetch_assoc($resultData)){
            $cli= new cliente($row['idcliente'], $row['apellido_cli'],$row['nombre_cli'],$row['dni_cli'],$row['nacimiento_cli'],$row['direccion_cli'],$row['telefono_cli'],
                    $row['correo_cli'],$row['registro_cli'],$row['idusuario']);
            $vec[]= $cli;
        }
        return $vec;
    }
    
    function seleccionarxDNI($dni){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql ="select * from cliente where dni_cli =? limit 1";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_bind_param($stmt,"s",$dni);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $cli= new cliente($row['idcliente'], $row['apellido_cli'],$row['nombre_cli'],$row['dni_cli'],$row['nacimiento_cli'],$row['direccion_cli'],$row['telefono_cli'],
                    $row['correo_cli'],$row['registro_cli'],$row['idusuario']);
            return $cli;
        }else{
            return false;
        }
    }
    
    function seleccionarxDNIupdate($id, $dni){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql ="select * from cliente where idcliente != ? AND dni_cli =? limit 1";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        mysqli_stmt_bind_param($stmt,"is",$id,$dni);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $cli= new cliente($row['idcliente'], $row['apellido_cli'],$row['nombre_cli'],$row['dni_cli'],$row['nacimiento_cli'],$row['direccion_cli'],$row['telefono_cli'],
                    $row['correo_cli'],$row['registro_cli'],$row['idusuario']);
            return $cli;
        }else{
            return false;
        }
    }
    
    function seleccionar_idcliente(cliente $cliente){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql =" select * from cliente where idcliente=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $idcliente=$cliente->getidcliente();
        mysqli_stmt_bind_param($stmt,"i",$idcliente);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            $cli= new cliente($row['idcliente'], $row['apellido_cli'],$row['nombre_cli'],$row['dni_cli'],$row['nacimiento_cli'],$row['direccion_cli'],$row['telefono_cli'],
                    $row['correo_cli'],$row['registro_cli'],$row['idusuario']);
            return $cli;
        }else{
            return false;
        }
    }
    
    function crear(cliente $cliente){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql =" INSERT INTO cliente (apellido_cli, nombre_cli, dni_cli, nacimiento_cli, direccion_cli, telefono_cli, correo_cli,"
                . "registro_cli, idusuario) VALUES (?,?,?,?,?,?,?,CURRENT_TIME,?)";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $ape_cli = $cliente->getApellido_cli();
        $nom_cli = $cliente->getNombre_cli();
        $dni_cli = $cliente->getDni_cli();
        $nacimiento_cli = $cliente->getNacimiento_cli();
        $direccion_cli = $cliente->getDireccion_cli();
        $telefono_cli = $cliente->getTelefono_cli();
        $correo_cli = $cliente->getCorreo_cli();
        $idusuario = $cliente->getIdusuario();
        mysqli_stmt_bind_param($stmt, "sssssssi", $ape_cli, $nom_cli, $dni_cli, $nacimiento_cli, $direccion_cli, $telefono_cli, $correo_cli, $idusuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function actualizar(cliente $cliente){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql =" UPDATE cliente SET apellido_cli=?,nombre_cli=?,dni_cli=?,nacimiento_cli=?,direccion_cli=?,telefono_cli=?,correo_cli=? WHERE idcliente=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $ape_cli = $cliente->getApellido_cli();
        $nom_cli = $cliente->getNombre_cli();
        $dni_cli = $cliente->getDni_cli();
        $nacimiento_cli = $cliente->getNacimiento_cli();
        $direccion_cli = $cliente->getDireccion_cli();
        $telefono_cli = $cliente->getTelefono_cli();
        $correo_cli = $cliente->getCorreo_cli();
        $id = $cliente->getIdcliente();
        mysqli_stmt_bind_param($stmt, "sssssssi", $ape_cli, $nom_cli, $dni_cli, $nacimiento_cli, $direccion_cli, $telefono_cli, $correo_cli, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    function eliminar(cliente $cliente){
        $cn = mysqli_connect("localhost", "root", "123456", "bd_veterinaria", "3308");
        $sql =" delete from cliente WHERE idcliente=?";
        $stmt = mysqli_stmt_init($cn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "Error statement";
        }
        $idc = $cliente->getidcliente();
        mysqli_stmt_bind_param($stmt,"i",$idc);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
}
