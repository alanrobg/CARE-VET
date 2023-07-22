<?php

class vacuna {
    
    private $idvacuna;
    private $nom_vacuna;
    private $des_vacuna;
    
    public function __construct($idvacuna, $nom_vacuna, $des_vacuna) {
        $this->idvacuna = $idvacuna;
        $this->nom_vacuna = $nom_vacuna;
        $this->des_vacuna = $des_vacuna;
    }
    
    public function getIdvacuna() {
        return $this->idvacuna;
    }

    public function getNom_vacuna() {
        return $this->nom_vacuna;
    }

    public function getDes_vacuna() {
        return $this->des_vacuna;
    }

    public function setIdvacuna($idvacuna) {
        $this->idvacuna = $idvacuna;
    }

    public function setNom_vacuna($nom_vacuna) {
        $this->nom_vacuna = $nom_vacuna;
    }

    public function setDes_vacuna($des_vacuna) {
        $this->des_vacuna = $des_vacuna;
    }
    
}