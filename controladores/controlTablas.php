<?php
    include('../modelos/genericCrud.php');
    $personas = new personas();
    $crud = new GenericCRUD('personas','');
    $respuesta = (array) $crud->ReadAll();
    $json = array();
    $json = $respuesta;
    $jsonString = json_encode($json);
    echo $jsonString;
    $desconexion = new MysqlStructure();
    $desconexion ->closeConnection(); 
?>