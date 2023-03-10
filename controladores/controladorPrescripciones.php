<?php
include('../modelos/genericCrud.php');

if (isset($_POST['operation'])){
    $operacion = $_POST['operation'];
    if($operacion=='insert'){
        if(isset($_POST['nombre'])){
            $prescripcion = new PersonaMedicamento();
            $prescripcion->setObservaciones($_POST['observaciones']);
            $conexion = new GenericCRUD('persona_medicamento',$prescripcion);
            $cone = $conexion->CreateRecord($_POST['nombre'],$_POST['medicamento']);
            if(is_null($cone)){
                    $json = array();
                    $json['ok'] = 'error';
            }else if(!is_null($cone)){
                    $json = array();
                    $json['ok'] = 'ok';
                }  
        }else{
            $json = array();
            $json['ok'] = 'error';   
        }
    }else if($operacion=="update"){
        if(isset($_POST['nombre'])){
            $prescripcion = new PersonaMedicamento();
            $prescripcion->setId($_POST['id']);
            $prescripcion->setObservaciones($_POST['observaciones']);
            $conexion = new GenericCRUD('persona_medicamento',$prescripcion);
            $p = $_POST['nombre'];
            $m = $_POST['medicamento'];
            $cone = $conexion->UpdateAll($p,$m);
            if(is_null($cone)){
                $json = array();
                $json['ok'] = $cone;
            }else if(!is_null($cone)){
                $json = array();
                $json['ok'] = 'ok';
            }  
        }else{
            $json = array();
            $json['ok'] = 'error';   
        }
    }else if($operacion=='delete'){
        if(isset($_POST['id'])){
            $prescripcion = new PersonaMedicamento();
            $prescripcion->setId($_POST['id']);
            $conexion = new GenericCRUD('persona_medicamento',$prescripcion);
            $cone = $conexion->deleteAll();
            if(is_null($cone)){
                $json = array();
                $json['ok'] = $cone;
            }else if(!is_null($cone)){
                $json = array();
                $json['ok'] = 'ok';
            }  
    }else{
        $json = array();
        $json['ok'] = 'error';   
    }
}else{
    $json = array();
    $json['ok'] = 'error';   
}
$jsonString = json_encode($json);
    echo $jsonString;
}

?>