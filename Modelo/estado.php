<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of estado
 *
 * @author monso
 */
class estado {
    //put your code here
    private $idestado;
    private $estado;
    public function __construct($idestado, $estado) {
        $this->idestado = $idestado;
        $this->estado = $estado;
    }
    
    public function getIdestado() {
        return $this->idestado;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setIdestado($idestado) {
        $this->idestado = $idestado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

}
