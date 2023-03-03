<?php
//include('Medicamentos.php');
//include('Personas.php');
include('PersonaMedicamento.php');
require('MysqlStructure.php');
class GenericCRUD{
    public $conexion;

    public function __construct(){
        $this->conexion = new MysqlStructure();
    }
    public function readAll(){
        $this->conexion->setSql("SELECT * FROM personas;");
        $respuesta = $this->conexion->executeQuery();
        $objeto = (object)$respuesta;
        echo '<pre>' .PHP_EOL;
        print_r($objeto);
        echo "</pre>" . PHP_EOL;
        echo $objeto->id;
        //print_r($respuesta); 
    }
}
?>