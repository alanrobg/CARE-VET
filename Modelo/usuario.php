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
    private $idarea;
    private $usu_usuario;
    private $pass_usuario;
    
    public function __construct($idusuario, $apellido_usuario, $nombre_usuario, $dni_usuario, $direccion_usuario, $nacimiento_usuario, $telefono_usuario, $correo_usuario, $contrato_usuario, $idarea, $usu_usuario, $pass_usuario) {
        $this->idusuario = $idusuario;
        $this->apellido_usuario = $apellido_usuario;
        $this->nombre_usuario = $nombre_usuario;
        $this->dni_usuario = $dni_usuario;
        $this->direccion_usuario = $direccion_usuario;
        $this->nacimiento_usuario = $nacimiento_usuario;
        $this->telefono_usuario = $telefono_usuario;
        $this->correo_usuario = $correo_usuario;
        $this->contrato_usuario = $contrato_usuario;
        $this->idarea = $idarea;
        $this->usu_usuario = $usu_usuario;
        $this->pass_usuario = $pass_usuario;
    }
    
    public function getIdusuario() {
        return $this->idusuario;
    }

    public function getApellido_usuario() {
        return $this->apellido_usuario;
    }

    public function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    public function getDni_usuario() {
        return $this->dni_usuario;
    }

    public function getDireccion_usuario() {
        return $this->direccion_usuario;
    }

    public function getNacimiento_usuario() {
        return $this->nacimiento_usuario;
    }

    public function getTelefono_usuario() {
        return $this->telefono_usuario;
    }

    public function getCorreo_usuario() {
        return $this->correo_usuario;
    }

    public function getContrato_usuario() {
        return $this->contrato_usuario;
    }

    public function getIdarea() {
        return $this->idarea;
    }

    public function getUsu_usuario() {
        return $this->usu_usuario;
    }

    public function getPass_usuario() {
        return $this->pass_usuario;
    }

    public function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    public function setApellido_usuario($apellido_usuario) {
        $this->apellido_usuario = $apellido_usuario;
    }

    public function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function setDni_usuario($dni_usuario) {
        $this->dni_usuario = $dni_usuario;
    }

    public function setDireccion_usuario($direccion_usuario) {
        $this->direccion_usuario = $direccion_usuario;
    }

    public function setNacimiento_usuario($nacimiento_usuario) {
        $this->nacimiento_usuario = $nacimiento_usuario;
    }

    public function setTelefono_usuario($telefono_usuario) {
        $this->telefono_usuario = $telefono_usuario;
    }

    public function setCorreo_usuario($correo_usuario) {
        $this->correo_usuario = $correo_usuario;
    }

    public function setContrato_usuario($contrato_usuario) {
        $this->contrato_usuario = $contrato_usuario;
    }

    public function setIdarea($idarea) {
        $this->idarea = $idarea;
    }

    public function setUsu_usuario($usu_usuario) {
        $this->usu_usuario = $usu_usuario;
    }

    public function setPass_usuario($pass_usuario) {
        $this->pass_usuario = $pass_usuario;
    }

}
