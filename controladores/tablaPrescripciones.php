<?php
    include('../modelos/genericCrud.php');
    $prescripciones = new PersonaMedicamento();
    $crud = new GenericCRUD('persona_medicamento','');
    $respuesta = (array) $crud->JoinPrescripciones();
    $json = array();
    $json = $respuesta;
    $jsonString = json_encode($json);
    echo $jsonString;
    $desconexion = new MysqlStructure();
    $desconexion ->closeConnection(); 
?>