<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of raza
 *
 * @author monso
 */
class raza {
    //put your code here
    private $idraza;
    private $nom_raza;
    private $idespecie;
    
    function __construct($idraza, $nom_raza, $idespecie) {
        $this->idraza = $idraza;
        $this->nom_raza = $nom_raza;
        $this->idespecie = $idespecie;
    }
    
    function getIdraza() {
        return $this->idraza;
    }

    function getNom_raza() {
        return $this->nom_raza;
    }

    function getIdespecie() {
        return $this->idespecie;
    }

    function setIdraza($idraza) {
        $this->idraza = $idraza;
    }

    function setNom_raza($nom_raza) {
        $this->nom_raza = $nom_raza;
    }

    function setIdespecie($idespecie) {
        $this->idespecie = $idespecie;
    }

}
