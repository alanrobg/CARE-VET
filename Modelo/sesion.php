<?php



class sesion {
    
    private $idsesion;
    private $key_ses;
    private $idusuario;
    
    function __construct($idsesion, $key_ses, $idusuario) {
        $this->idsesion = $idsesion;
        $this->key_ses = $key_ses;
        $this->idusuario = $idusuario;
    }
    
    function getIdsesion() {
        return $this->idsesion;
    }

    function getKey_ses() {
        return $this->key_ses;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function setIdsesion($idsesion) {
        $this->idsesion = $idsesion;
    }

    function setKey_ses($key_ses) {
        $this->key_ses = $key_ses;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }
    
}
