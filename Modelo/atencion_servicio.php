<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of atencion_servicio
 *
 * @author monso
 */
class atencion_servicio {
    //put your code here
    private $idatencion_servicion;
    private $idatencion;
    private $idservicio;
    private $fecha;
    private $comentario;
    
    public function __construct($idatencion_servicion, $idatencion, $idservicio, $fecha, $comentario) {
        $this->idatencion_servicion = $idatencion_servicion;
        $this->idatencion = $idatencion;
        $this->idservicio = $idservicio;
        $this->fecha = $fecha;
        $this->comentario = $comentario;
    }
    
    public function getIdatencion_servicion() {
        return $this->idatencion_servicion;
    }

    public function getIdatencion() {
        return $this->idatencion;
    }

    public function getIdservicio() {
        return $this->idservicio;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function setIdatencion_servicion($idatencion_servicion) {
        $this->idatencion_servicion = $idatencion_servicion;
    }

    public function setIdatencion($idatencion) {
        $this->idatencion = $idatencion;
    }

    public function setIdservicio($idservicio) {
        $this->idservicio = $idservicio;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }
    
}
