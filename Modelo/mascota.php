<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mascota
 *
 * @author monso
 */
class mascota {
    //put your code here
    private $idmascota;
    private $nom_mascota;
    private $idcliente;
    private $nacimiento_mascota;
    private $color_mascota;
    private $registro_mascota;
    private $foto_mascota;
    private $idesterilizacion;
    private $idraza;
    
    function __construct($idmascota, $nom_mascota, $idcliente, $nacimiento_mascota, $color_mascota, $registro_mascota, $foto_mascota, $idesterilizacion, $idraza) {
        $this->idmascota = $idmascota;
        $this->nom_mascota = $nom_mascota;
        $this->idcliente = $idcliente;
        $this->nacimiento_mascota = $nacimiento_mascota;
        $this->color_mascota = $color_mascota;
        $this->registro_mascota = $registro_mascota;
        $this->foto_mascota = $foto_mascota;
        $this->idesterilizacion = $idesterilizacion;
        $this->idraza = $idraza;
    }

    function getIdmascota() {
        return $this->idmascota;
    }

    function getNom_mascota() {
        return $this->nom_mascota;
    }

    function getIdcliente() {
        return $this->idcliente;
    }

    function getNacimiento_mascota() {
        return $this->nacimiento_mascota;
    }

    function getColor_mascota() {
        return $this->color_mascota;
    }

    function getRegistro_mascota() {
        return $this->registro_mascota;
    }

    function getFoto_mascota() {
        return $this->foto_mascota;
    }

    function getIdesterilizacion() {
        return $this->idesterilizacion;
    }

    function getIdraza() {
        return $this->idraza;
    }

    function setIdmascota($idmascota) {
        $this->idmascota = $idmascota;
    }

    function setNom_mascota($nom_mascota) {
        $this->nom_mascota = $nom_mascota;
    }

    function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
    }

    function setNacimiento_mascota($nacimiento_mascota) {
        $this->nacimiento_mascota = $nacimiento_mascota;
    }

    function setColor_mascota($color_mascota) {
        $this->color_mascota = $color_mascota;
    }

    function setRegistro_mascota($registro_mascota) {
        $this->registro_mascota = $registro_mascota;
    }

    function setFoto_mascota($foto_mascota) {
        $this->foto_mascota = $foto_mascota;
    }

    function setIdesterilizacion($idesterilizacion) {
        $this->idesterilizacion = $idesterilizacion;
    }

    function setIdraza($idraza) {
        $this->idraza = $idraza;
    }

}
