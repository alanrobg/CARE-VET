<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of esterilizacion
 *
 * @author monso
 */
class esterilizacion {
    //put your code here
    private $idesterilizacion;
    private $nom_esterilizacion;
    
    function __construct($idesterilizacion, $nom_esterilizacion) {
        $this->idesterilizacion = $idesterilizacion;
        $this->nom_esterilizacion = $nom_esterilizacion;
    }
    
    function getIdesterilizacion() {
        return $this->idesterilizacion;
    }

    function getNom_esterilizacion() {
        return $this->nom_esterilizacion;
    }

    function setIdesterilizacion($idesterilizacion) {
        $this->idesterilizacion = $idesterilizacion;
    }

    function setNom_esterilizacion($nom_esterilizacion) {
        $this->nom_esterilizacion = $nom_esterilizacion;
    }

}
