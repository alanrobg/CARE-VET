<?php

/**
 * Description of consulta
 *
 * @author monso
 */
class consulta {
    //put your code here
    private $idconsulta;
    private $idcliente;
    private $fecha;
    private $comentario;
    private $idusu;
    private $idmascota;
    private $idusuario;
    
    public function __construct($idconsulta, $idcliente, $fecha, $comentario, $idusu, $idmascota, $idusuario) {
        $this->idconsulta = $idconsulta;
        $this->idcliente = $idcliente;
        $this->fecha = $fecha;
        $this->comentario = $comentario;
        $this->idusu = $idusu;
        $this->idmascota = $idmascota;
        $this->idusuario = $idusuario;
    }
    
    public function getIdconsulta() {
        return $this->idconsulta;
    }

    public function getIdcliente() {
        return $this->idcliente;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function getIdusu() {
        return $this->idusu;
    }

    public function getIdmascota() {
        return $this->idmascota;
    }

    public function getIdusuario() {
        return $this->idusuario;
    }

    public function setIdconsulta($idconsulta) {
        $this->idconsulta = $idconsulta;
    }

    public function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function setIdusu($idusu) {
        $this->idusu = $idusu;
    }

    public function setIdmascota($idmascota) {
        $this->idmascota = $idmascota;
    }

    public function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

}
