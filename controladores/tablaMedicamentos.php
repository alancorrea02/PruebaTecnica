<?php
    include('../modelos/genericCrud.php');
    $personas = new Medicamentos();
    
    $crud = new GenericCRUD('medicamentos','');
    $respuesta = (array) $crud->ReadAll();
    $json = array();
    $json = $respuesta;
    $jsonString = json_encode($json);
    echo $jsonString;
    $desconexion = new MysqlStructure();
    $desconexion ->closeConnection(); 
?>