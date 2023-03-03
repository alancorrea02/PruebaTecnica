<?php 
include('Medicamentos.php');
include('Personas.php');
    class PersonaMedicamento{
        public $medicamentos;
        public $personas;
        public $observaciones;

        public function __construct(){
            $this->medicamentos = new Medicamentos();
            $this->personas = new Personas();
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
    }
?>