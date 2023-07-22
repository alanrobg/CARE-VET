<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of consulta_tratamiento
 *
 * @author monso
 */
class consulta_tratamiento {
    //put your code here
    private $idconsulta_tratamiento;
    private $idconsulta;
    private $idtratamiento;
    private $fecha;
    private $comentario;
    
    public function __construct($idconsulta_tratamiento, $idconsulta, $idtratamiento, $fecha, $comentario) {
        $this->idconsulta_tratamiento = $idconsulta_tratamiento;
        $this->idconsulta = $idconsulta;
        $this->idtratamiento = $idtratamiento;
        $this->fecha = $fecha;
        $this->comentario = $comentario;
    }
    
    public function getIdconsulta_tratamiento() {
        return $this->idconsulta_tratamiento;
    }

    public function getIdconsulta() {
        return $this->idconsulta;
    }

    public function getIdtratamiento() {
        return $this->idtratamiento;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function setIdconsulta_tratamiento($idconsulta_tratamiento) {
        $this->idconsulta_tratamiento = $idconsulta_tratamiento;
    }

    public function setIdconsulta($idconsulta) {
        $this->idconsulta = $idconsulta;
    }

    public function setIdtratamiento($idtratamiento) {
        $this->idtratamiento = $idtratamiento;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

}
