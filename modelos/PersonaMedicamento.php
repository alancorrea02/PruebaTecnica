<?php 
    class PersonaMedicamento {
        public $id;
        public $observaciones;

        public function __construct(){
          
            $this->observaciones = '';
        }
        public function getObservaciones()
        {
                return $this->observaciones;
        }
        public function setObservaciones($observaciones)
        {
                $this->observaciones = $observaciones;
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