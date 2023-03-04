<?php
//include('Medicamentos.php');
//include('Personas.php');

use function PHPSTORM_META\type;
include('Personas.php');
include('Medicamentos.php');
//include('PersonaMedicamento.php');
require('MysqlStructure.php');
class GenericCRUD {
    public $persona;
    public $conexion;
    public $table;
    public $campos;
    public function __construct($table,$persona,$campos){
        $this->campos = $campos;
        $this->persona= $persona;
        $this->conexion = new MysqlStructure();
        $this->table= $table;
    }
    public function readAll(){
        $this->conexion->setSql("SELECT * FROM {$this->table} WHERE id = {$this->persona->getId()};");
        $respuesta = $this->conexion->executeQuery();
        echo '<pre>' .PHP_EOL;
        print_r($respuesta);
        echo "</pre>" . PHP_EOL; 
    }
    public function deleteAll(){
        $this->conexion->setSql("DELETE FROM {$this->table} WHERE id = {$this->persona->getId()};");
        $respuesta = $this->conexion->executeQuery();
    }
    public function deleteFrom(){
        $this->conexion->setSql("SELECT ".implode(",",$this->campos)." FROM {$this->table} WHERE id = {$this->persona->getId()};");
        echo $this->conexion->getSql();
    }
}
?>