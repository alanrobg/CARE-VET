<?php

class detalle_vacuna {
    
    private $id_detalle;
    private $fecha_detalle;
    private $fecha_proxdet;
    private $obs;
    private $idMascota;
    private $idvacuna;
    
    function __construct($id_detalle,$fecha_detalle,$fecha_proxdet,$obs,$idMascota,$idvacuna) {
       $this->id_detalle = $id_detalle;
       $this->fecha_detalle = $fecha_detalle;
       $this->fecha_proxdet = $fecha_proxdet;
       $this->obs=$obs;
       $this->idMascota=$idMascota;
       $this->idvacuna=$idvacuna;
    }
    
    function getId_detalle() {
        return $this->id_detalle;
    }

    function getFecha_detalle() {
        return $this->fecha_detalle;
    }

    function getFecha_proxdet() {
        return $this->fecha_proxdet;
    }

    function getObs() {
        return $this->obs;
    }

    function getIdMascota() {
        return $this->idMascota;
    }

    function getIdvacuna() {
        return $this->idvacuna;
    }

    function setId_detalle($id_detalle) {
        $this->id_detalle = $id_detalle;
    }

    function setFecha_detalle($fecha_detalle) {
        $this->fecha_detalle = $fecha_detalle;
    }

    function setFecha_proxdet($fecha_proxdet) {
        $this->fecha_proxdet = $fecha_proxdet;
    }

    function setObs($obs) {
        $this->obs = $obs;
    }

    function setIdMascota($idMascota) {
        $this->idMascota = $idMascota;
    }

    function setIdvacuna($idvacuna) {
        $this->idvacuna = $idvacuna;
    }


    
    
    

    
}
