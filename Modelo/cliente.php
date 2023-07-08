<?php



class cliente {
    
    private $idcliente;
    private $apellido_cli;
    private $nombre_cli;
    private $dni_cli;
    private $nacimiento_cli;
    private $direccion_cli;
    private $telefono_cli;
    private $correo_cli;
    private $registro_cli;
    private $idusuario;
    
    function __construct($idcliente, $apellido_cli, $nombre_cli, $dni_cli, $nacimiento_cli, $direccion_cli, $telefono_cli, $correo_cli, $registro_cli, $idusuario) {
        $this->idcliente = $idcliente;
        $this->apellido_cli = $apellido_cli;
        $this->nombre_cli = $nombre_cli;
        $this->dni_cli = $dni_cli;
        $this->nacimiento_cli = $nacimiento_cli;
        $this->direccion_cli = $direccion_cli;
        $this->telefono_cli = $telefono_cli;
        $this->correo_cli = $correo_cli;
        $this->registro_cli = $registro_cli;
        $this->idusuario = $idusuario;
    }

    function getIdcliente() {
        return $this->idcliente;
    }

    function getApellido_cli() {
        return $this->apellido_cli;
    }

    function getNombre_cli() {
        return $this->nombre_cli;
    }

    function getDni_cli() {
        return $this->dni_cli;
    }

    function getNacimiento_cli() {
        return $this->nacimiento_cli;
    }

    function getDireccion_cli() {
        return $this->direccion_cli;
    }

    function getTelefono_cli() {
        return $this->telefono_cli;
    }

    function getCorreo_cli() {
        return $this->correo_cli;
    }

    function getRegistro_cli() {
        return $this->registro_cli;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    function setApellido_cli($apellido_cli) {
        $this->apellido_cli = $apellido_cli;
    }

    function setNombre_cli($nombre_cli) {
        $this->nombre_cli = $nombre_cli;
    }

    function setDni_cli($dni_cli) {
        $this->dni_cli = $dni_cli;
    }

    function setNacimiento_cli($nacimiento_cli) {
        $this->nacimiento_cli = $nacimiento_cli;
    }

    function setDireccion_cli($direccion_cli) {
        $this->direccion_cli = $direccion_cli;
    }

    function setTelefono_cli($telefono_cli) {
        $this->telefono_cli = $telefono_cli;
    }

    function setCorreo_cli($correo_cli) {
        $this->correo_cli = $correo_cli;
    }

    function setRegistro_cli($registro_cli) {
        $this->registro_cli = $registro_cli;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }


}
