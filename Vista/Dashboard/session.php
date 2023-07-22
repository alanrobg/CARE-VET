
<?php
$privilegio = 3;
//---------------------------------------------------------------
//Recursos usuario
include_once '../../DAO/usuarioDAO.php';
include_once '../../DAO/usuario_areaDAO.php';
include_once '../../DAO/sesionDAO.php';
include_once '../../Modelo/usuario.php';
include_once '../../Modelo/usuario_area.php';
include_once '../../Modelo/sesion.php';


$usuarioDAO = new usuarioDAO();
$usuario_areaDAO = new usuario_areaDAO();
$sesionDAO = new sesionDAO();
//---------------------------------------------------------------

//---------------------------------------------------------------
//Inicio de sesión
if(isset($_GET['data'])){
    $encoded_data = $_GET['data'];
    $data = unserialize(base64_decode($encoded_data));
    if(isset($data['key'])){
        $key = $data['key'];
        //----------------------------------------
        $sesion = $sesionDAO->seleccionar_key_ses(new sesion(null, $key, null));
        if($sesion==false){
            try{
                $sesionDAO->eliminar_key_ses(new sesion(null, $data['key'], null));
            } catch (Exception $ex) {
                echo $ex;
                echo "<script>window.location.href='../login.php?error=sesion_no_encontrada';</script>";
            }
            echo "<script>window.location.href='../login.php?error=sesionexpirada';</script>";
        }
        //----------------------------------------
        $usuario =  $usuarioDAO->seleccionar_idusuario(new usuario($sesion->getIdusuario(), null, null, null, null, null, null, null, null, null, null, null));
        $acceso = $usuario->getIdarea();
        if($acceso <= $privilegio){
        }else{
            echo "<script>window.location.href='../inicio.php?data=$encoded_data';</script>";
        }
        if($usuario==false){
            echo "<script>window.location.href='../login.php?error=sesionexpirada';</script>";
        }
    }else{
        echo "<script>window.location.href='../login.php?error=sesion_no_encontrada';</script>";
    }
}else{
    echo "<script>window.location.href='../login.php?error=sesion_no_recibida';</script>";
}
//---------------------------------------------------------------
?>