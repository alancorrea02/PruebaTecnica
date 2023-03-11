<?php
//include('Medicamentos.php');
//include('Personas.php');

use function PHPSTORM_META\type;
include('Personas.php');
include('Medicamentos.php');
include('PersonaMedicamento.php');
require('MysqlStructure.php');
class GenericCRUD {
    public $conexion;
    public $table;
    public $campos;
    public function __construct($table,$campos){
        $this->campos = $campos;
        $this->conexion = new MysqlStructure();
        $this->table= $table;
    }
    public function ReadAll(){
        $this->conexion->setSql("SELECT * FROM {$this->table};");
        $respuesta = $this->conexion->executeQuery();
        return $respuesta;
    }
    public function readAllFrom(){
        $this->conexion->setSql("SELECT * FROM {$this->table} WHERE id = {$this->campos->getId()};");
        $respuesta = (array) $this->conexion->executeSoloQuery();
        return $respuesta;
        
    }
    public function deleteAll(){
        $this->conexion->setSql("DELETE FROM {$this->table} WHERE id = {$this->campos->getId()};");
        $respuesta = $this->conexion->executeSoloQuery();
        return $respuesta;
    }   
    public function UpdateAll($p,$m){
        if($this->table=='personas'){
            $this->conexion->setSql("UPDATE personas SET nombre = '{$this->campos->getNombre()}',
             apellido = '{$this->campos->getApellido()}', dni = '{$this->campos->getDni()}',
              fecha_nacimiento = '{$this->campos->getFecha_nacimiento()}' WHERE id = {$this->campos->getId()};");
            $variable = $this->conexion->executeQuery();
            return $variable;
        }else if($this->table=='medicamentos'){
            $this->conexion->setSql("UPDATE medicamentos SET nombre_comercial = 
            '{$this->campos->getNombre_comercial()}' WHERE id = {$this->campos->getId()};");
            //$this->conexion->executeQuery();
            $variable = $this->conexion->executeQuery();
            return $variable;
        }else if($this->table == 'persona_medicamento'){
            $this->conexion->setSql("UPDATE persona_medicamento SET observaciones = 
            '{$this->campos->getObservaciones()}',persona_id = {$p}, medicamento_id={$m} WHERE id = {$this->campos->getId()};");
            $variable = $this->conexion->executeSoloQuery();
            return $variable;
        }else{
            echo "Hola";
        }
    }
    public function CreateRecord($idP,$idM){
        if($this->table=='personas'){
            $this->conexion->setSql("INSERT INTO personas (nombre,apellido,dni,fecha_nacimiento) 
            VALUES ('{$this->campos->getNombre()}','{$this->campos->getApellido()}',
            '{$this->campos->getDni()}','{$this->campos->getFecha_nacimiento()}');");
            $variable = $this->conexion->executeSoloQuery();
            return $variable;

        }else if($this->table=='medicamentos'){
                $this->conexion->setSql("INSERT INTO medicamentos (nombre_comercial) VALUES ('{$this->campos->getNombre_comercial()}');");
                $variable = $this->conexion->executeSoloQuery();
                return $variable;    
        }else if($this->table == 'persona_medicamento'){
            $this->conexion->setSql("INSERT INTO persona_medicamento (observaciones,persona_id,medicamento_id) VALUES ('{$this->campos->getObservaciones()}',{$idP},{$idM});");
            //$this->conexion->executeSoloQuery();
            $variable = $this->conexion->executeSoloQuery();
            return $variable;    
        }
    }
    public function JoinPrescripciones(){
        $this->conexion->setSql("SELECT pm.id,pm.persona_id,pm.medicamento_id,pm.observaciones,pm.created_at,md.nombre_comercial,pr.nombre,pr.apellido,pr.dni FROM persona_medicamento pm 
        INNER JOIN personas pr ON pm.persona_id = pr.id INNER JOIN medicamentos md ON md.id = pm.medicamento_id;");
        $variable=$this->conexion->executeQuery();
        return $variable;
    }
    public function JoinPrescripcionesWhere ($clave){
        $this->conexion->setSql("SELECT pm.id,pm.persona_id,pm.medicamento_id,pm.observaciones,pm.created_at,md.nombre_comercial,pr.nombre,pr.apellido,pr.dni FROM persona_medicamento pm 
        INNER JOIN personas pr ON pm.persona_id = pr.id  INNER JOIN medicamentos md ON md.id = pm.medicamento_id WHERE ((pr.dni LIKE '%{$clave}%') OR (md.nombre_comercial LIKE '%{$clave}%'));");
        $variable = $this->conexion->executeQuery();
        return $variable;
    }
}
?>