<?php



class usuario {
    
    private $idusuario;
    private $apellido_usuario;
    private $nombre_usuario;
    private $dni_usuario;
    private $direccion_usuario;
    private $nacimiento_usuario;
    private $telefono_usuario;
    private $correo_usuario;
    private $contrato_usuario;
    private $idearea;
    private $usu_usuario;
    private $pass_usuario;
    
    function __construct($idusuario, $apellido_usuario, $nombre_usuario, $dni_usuario, $direccion_usuario, $nacimiento_usuario, $telefono_usuario, $correo_usuario, $contrato_usuario, $idearea, $usu_usuario, $pass_usuario) {
        $this->idusuario = $idusuario;
        $this->apellido_usuario = $apellido_usuario;
        $this->nombre_usuario = $nombre_usuario;
        $this->dni_usuario = $dni_usuario;
        $this->direccion_usuario = $direccion_usuario;
        $this->nacimiento_usuario = $nacimiento_usuario;
        $this->telefono_usuario = $telefono_usuario;
        $this->correo_usuario = $correo_usuario;
        $this->contrato_usuario = $contrato_usuario;
        $this->idearea = $idearea;
        $this->usu_usuario = $usu_usuario;
        $this->pass_usuario = $pass_usuario;
    }
    
    function getIdusuario() {
        return $this->idusuario;
    }

    function getApellido_usuario() {
        return $this->apellido_usuario;
    }

    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getDni_usuario() {
        return $this->dni_usuario;
    }

    function getDireccion_usuario() {
        return $this->direccion_usuario;
    }

    function getNacimiento_usuario() {
        return $this->nacimiento_usuario;
    }

    function getTelefono_usuario() {
        return $this->telefono_usuario;
    }

    function getCorreo_usuario() {
        return $this->correo_usuario;
    }

    function getContrato_usuario() {
        return $this->contrato_usuario;
    }

    function getIdearea() {
        return $this->idearea;
    }

    function getUsu_usuario() {
        return $this->usu_usuario;
    }

    function getPass_usuario() {
        return $this->pass_usuario;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setApellido_usuario($apellido_usuario) {
        $this->apellido_usuario = $apellido_usuario;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setDni_usuario($dni_usuario) {
        $this->dni_usuario = $dni_usuario;
    }

    function setDireccion_usuario($direccion_usuario) {
        $this->direccion_usuario = $direccion_usuario;
    }

    function setNacimiento_usuario($nacimiento_usuario) {
        $this->nacimiento_usuario = $nacimiento_usuario;
    }

    function setTelefono_usuario($telefono_usuario) {
        $this->telefono_usuario = $telefono_usuario;
    }

    function setCorreo_usuario($correo_usuario) {
        $this->correo_usuario = $correo_usuario;
    }

    function setContrato_usuario($contrato_usuario) {
        $this->contrato_usuario = $contrato_usuario;
    }

    function setIdearea($idearea) {
        $this->idearea = $idearea;
    }

    function setUsu_usuario($usu_usuario) {
        $this->usu_usuario = $usu_usuario;
    }

    function setPass_usuario($pass_usuario) {
        $this->pass_usuario = $pass_usuario;
    }
    
}
