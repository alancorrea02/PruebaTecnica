<?php
    class Medicamentos{
        public $nombre_comercial;
        public function __construct(){
            $this->nombre_comercial = '';
        }
        public function getNombre_comercial()
        {
                return $this->nombre_comercial;
        }
        public function setNombre_comercial($nombre_comercial)
        {
                $this->nombre_comercial = $nombre_comercial;
        }
    }
?>