<?php 
    class personas{
        public $id;
        protected $nombre;
        protected $apellido;
        protected $dni;
        protected $fecha_nacimiento;

        function __construct(){
                $this->id = ''; 
                $this->nombre = '';
                $this->apellido = '';
                $this->dni = '';
                $this->fecha_nacimiento = '';
        }
        public function getNombre()
        {
                return $this->nombre;
        }
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;
        }

        public function getApellido()
        {
                return $this->apellido;
        }
        public function setApellido($apellido)
        {
                $this->apellido = $apellido;
        }
        public function getDni()
        {
                return $this->dni;
        }
        public function setDni($dni)
        {
                $this->dni = $dni;
        }
        public function getFecha_nacimiento()
        {
                return $this->fecha_nacimiento;
        }
        public function setFecha_nacimiento($fecha_nacimiento)
        {
                $this->fecha_nacimiento = $fecha_nacimiento;
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