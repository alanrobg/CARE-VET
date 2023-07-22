<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of servicio
 *
 * @author monso
 */
class servicio {
    //put your code here
    private $idservicio;
    private $nom_servicio;
    private $estado;
    
    public function __construct($idservicio, $nom_servicio, $estado) {
        $this->idservicio = $idservicio;
        $this->nom_servicio = $nom_servicio;
        $this->estado = $estado;
    }
    
    public function getIdservicio() {
        return $this->idservicio;
    }

    public function getNom_servicio() {
        return $this->nom_servicio;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setIdservicio($idservicio) {
        $this->idservicio = $idservicio;
    }

    public function setNom_servicio($nom_servicio) {
        $this->nom_servicio = $nom_servicio;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

}
