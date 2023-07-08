<?php



class usuario_area {
    
    private $idusuario_area;
    private $nom_area;
    
    function __construct($idusuario_area, $nom_area) {
        $this->idusuario_area = $idusuario_area;
        $this->nom_area = $nom_area;
    }
    
    function getIdusuario_area() {
        return $this->idusuario_area;
    }

    function getNom_area() {
        return $this->nom_area;
    }

    function setIdusuario_area($idusuario_area) {
        $this->idusuario_area = $idusuario_area;
    }

    function setNom_area($nom_area) {
        $this->nom_area = $nom_area;
    }

}
