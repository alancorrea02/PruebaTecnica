<?php
include('../modelos/genericCrud.php');
$json = array();

if (isset($_POST['operation'])){
    $operacion = $_POST['operation'];
    if($operacion=='insert'){
        if(isset($_POST['nombre'])){
            $prescripcion = new PersonaMedicamento();
            $prescripcion->setObservaciones($_POST['observaciones']);
            $conexion = new GenericCRUD('persona_medicamento',$prescripcion);
            $cone = $conexion->CreateRecord($_POST['nombre'],$_POST['medicamento']);
            if(is_null($cone)){
                    $json['ok'] = 'error';
            }else if(!is_null($cone)){
                    $json['ok'] = 'ok';
                }  
        }else{
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
                $json['ok'] = $cone;
            }else if(!is_null($cone)){
                $json['ok'] = 'ok';
            }  
        }else{
            $json['ok'] = 'error';   
        }
    }else if($operacion=='delete'){
        if(isset($_POST['id'])){
            $prescripcion = new PersonaMedicamento();
            $prescripcion->setId($_POST['id']);
            $conexion = new GenericCRUD('persona_medicamento',$prescripcion);
            $cone = $conexion->deleteAll();
            if(is_null($cone)){
                $json['ok'] = $cone;
            }else if(!is_null($cone)){
                $json['ok'] = 'ok';
            }  
    }else{
        $json['ok'] = 'error';   
    }
}else{
    $json['ok'] = 'error';   
}

}
$jsonString = json_encode($json);
echo $jsonString;
$desconexion = new MysqlStructure();
$desconexion ->closeConnection();
?>