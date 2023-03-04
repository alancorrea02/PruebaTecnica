<?php 
include('Medicamentos.php');
include('Personas.php');
    class PersonaMedicamento {
        public $id;
        public $medicamentos;
        public $personas;
        public $observaciones;

        public function __construct($id){
            $this->id = $id;
            $this->medicamentos = new Medicamentos();
            $this->personas = new Personas('','','','','');
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

                return $this;
        }
    }
?>