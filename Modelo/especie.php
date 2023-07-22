<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of especie
 *
 * @author monso
 */
class especie {
    //put your code here
    
    private $idespecie;
    private $nom_especie;
    
    function __construct($idespecie, $nom_especie) {
        $this->idespecie = $idespecie;
        $this->nom_especie = $nom_especie;
    }

    function getidespecie() {
        return $this->idespecie;
    }

    function getnom_especie() {
        return $this->nom_especie;
    }

    function setidespecie($idespecie) {
        $this->idespecie = $idespecie;
    }

    function setnom_especie($nom_especie) {
        $this->nom_especie = $nom_especie;
    }
}
