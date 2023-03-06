<?php
    include('../modelos/genericCrud.php');
    $personas = new personas();
    $crud = new GenericCRUD('personas','');
    $respuesta = (array) $crud->ReadAll();
    $json = array();
    $json = $respuesta;
    $jsonString = json_encode($json);
    echo $jsonString; 
    /*echo '<pre>' .PHP_EOL;
    print_r($jsonString); 
        
        echo "</pre>" . PHP_EOL;*/ 
    
?>