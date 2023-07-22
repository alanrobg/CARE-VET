<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of tratamiento
 *
 * @author monso
 */
class tratamiento {
    //put your code here
    private $idtratamiento;
    private $nom_tratamiento;
    private $estado;
    
    public function __construct($idtratamiento, $nom_tratamiento, $estado) {
        $this->idtratamiento = $idtratamiento;
        $this->nom_tratamiento = $nom_tratamiento;
        $this->estado = $estado;
    }
    public function getIdtratamiento() {
        return $this->idtratamiento;
    }

    public function getNom_tratamiento() {
        return $this->nom_tratamiento;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setIdtratamiento($idtratamiento) {
        $this->idtratamiento = $idtratamiento;
    }

    public function setNom_tratamiento($nom_tratamiento) {
        $this->nom_tratamiento = $nom_tratamiento;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
    
}
