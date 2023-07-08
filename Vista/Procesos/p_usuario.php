<?php


/* 
 * Proyecto CareVet Veterinaria
 */


include_once '../../Modelo/usuario.php';
include_once '../../DAO/usuarioDAO.php';
include_once '../../Modelo/sesion.php';
include_once '../../DAO/sesionDAO.php';

$usuarioDAO = new usuarioDAO();
$sesionDAO = new sesionDAO();


$usuario_usu = $_POST['usuario_usu'];
$password_usu = $_POST['password_usu'];

$usuario = new usuario(null, null, null, null, null, null, null, null, null, null, $usuario_usu, $password_usu);

$usu = $usuarioDAO->seleccionar_usuario_usu_password_usu($usuario);
if($usu==false){
    echo "<script>window.location.href='../login.php?error=noencontrado';</script>";
    exit();
    //echo "usuario no encontrado";
}else{
    $sesion = new sesion(null, null, $usu->getIdusuario());
    $sesionDAO->crear($sesion);
    $ses = $sesionDAO->seleccionar_idusuario($sesion);
    
    // Set the data to be sent
    $data = array(
        'key' => $ses->getkey_ses(),
    );

    // Encode the data
    $encoded_data = base64_encode(serialize($data));

    // Build the URL with the encoded data
    $url = 'inicio.php?data=' . urlencode($encoded_data);
    echo "<script>window.location.href='../$url';</script>";
    exit();
    //echo "usuario encontrado";
}
exit();