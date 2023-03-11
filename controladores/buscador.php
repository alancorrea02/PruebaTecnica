<?php
    include('../modelos/genericCrud.php');

    if (isset($_POST['dato'])){
        $prescripciones = new PersonaMedicamento();
        $conexion = new GenericCRUD('persona_medicamento','');
        if ($_POST['dato']==''){
            $respuesta = $conexion->JoinPrescripciones();
        }
        else if ($_POST['dato']!=''){
            $respuesta = $conexion->JoinPrescripcionesWhere($_POST['dato']);  
        }
        $json = array();
        $json = $respuesta;
        $jsonString = json_encode($json);
        echo $jsonString; 
    }
?>