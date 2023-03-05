<?php
//include('Medicamentos.php');
//include('Personas.php');

use function PHPSTORM_META\type;
include('Personas.php');
include('Medicamentos.php');
include('PersonaMedicamento.php');
require('MysqlStructure.php');
class GenericCRUD {
    public $persona;
    public $conexion;
    public $table;
    public $campos;
    public function __construct($table,$campos){
        $this->campos = $campos;
        $this->conexion = new MysqlStructure();
        $this->table= $table;
    }
    public function readAll(){
        $this->conexion->setSql("SELECT * FROM {$this->table} WHERE id = {$this->campos->getId()};");
        $respuesta = (array) $this->conexion->executeQuery();
        //$respuesta = (array) $respuesta;
        echo '<pre>' .PHP_EOL;
        print_r($respuesta);
        echo "</pre>" . PHP_EOL; 
        foreach ($respuesta as $value){
            echo $value['id'];
        }
    }
    public function deleteAll(){
        $this->conexion->setSql("DELETE FROM {$this->table} WHERE id = {$this->campos->getId()};");
        $respuesta = $this->conexion->executeQuery();
    }
    public function deleteFrom(){
        $this->conexion->setSql("SELECT ".implode(",",$this->campos)." FROM {$this->table} WHERE id = {$this->persona->getId()};");
        echo $this->conexion->getSql();
    }
    public function UpdateAll(){
        if($this->table=='personas'){
            $this->conexion->setSql("UPDATE personas SET nombre = {$this->campos->getNombre()},
             apellido = {$this->campos->getApellido()}, dni = {$this->campos->getDni()},
              fecha_nacimiento = {$this->campos->getFecha_nacimiento()} WHERE id = {$this->campos->getId()};");
            $this->conexion->executeQuery();

        }else if($this->table='medicamentos'){
            $this->conexion->setSql("UPDATE medicamentos SET nombre_comercial = 
            {$this->campos->getNombre_comercial()} WHERE id = {$this->campos->getId()};");
            $this->conexion->executeQuery();

        }else if($this->table == 'persona_medicamento'){
            $this->conexion->setSql("UPDATE persona_medicamento SET observaciones = 
            {$this->campos->getObservaciones()} WHERE id = {$this->campos->getId()};");
            $this->conexion->executeQuery();

        }else{
            echo "Hola";
        }
    }
    public function CreateRecord($idP,$idM){
        if($this->table=='personas'){
            $this->conexion->setSql("INSERT INTO personas (nombre,apellido,dni,fecha_nacimiento) 
            VALUES ('{$this->campos->getNombre()}','{$this->campos->getApellido()}',
            '{$this->campos->getDni()}','{$this->campos->getFecha_nacimiento()}');");
            $this->conexion->executeQuery();

        }else if($this->table='medicamentos'){
            $this->conexion->setSql("INSERT INTO medicamentos (nombre_comercial) VALUES ('{$this->campos->getNombre_comercial()}');");
            $this->conexion->executeQuery();

        }else if($this->table == 'persona_medicamento'){
            $this->conexion->setSql("INSERT INTO persona_medicamento (observaciones,persona_id,medicamento_id) VALUES ('{$this->campos->getObservaciones()}',{$idP},{$idM});");
            $this->conexion->executeQuery();
        }else{
            echo "Hola";
        }
    }
    public function readSingleItem(){ //ver esta secuencia 
        $this->conexion->setSql("SELECT ".implode(",",$this->campos)." FROM {$this->table} WHERE id = {$this->campos->getId()};");
        $respuesta = (array) $this->conexion->executeQuery();
    }
}
?>