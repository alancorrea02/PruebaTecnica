<?php
    class Medicamentos{
        public $id;
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
        public function getId()
        {
                return $this->id;
        }
        public function setId($id)
        {
                $this->id = $id;
        }
    }
?>