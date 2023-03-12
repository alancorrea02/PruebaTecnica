<?php
include('../modelos/genericCrud.php');

if (isset($_POST['operation'])){
    $operacion = $_POST['operation'];
    if($operacion=='update'){
        if(isset($_POST['id'])){
            $persona = new personas();
            $persona->setNombre($_POST['nombre']);
            $persona->setApellido($_POST['apellido']);
            $persona->setFecha_nacimiento($_POST['fecha']);
            $persona->setDni($_POST['dni']);
            $persona->setId($_POST['id']);
            $conexion = new GenericCRUD('personas',$persona);
            if(is_null($conexion->UpdateAll('',''))){
                    $json = array();
                    $json['ok'] = 'error';
            }else if(!is_null($conexion->UpdateAll('',''))){
                    $json = array();
                    $json['ok'] = 'ok';
                }  
        }else{
            $json = array();
            $json['ok'] = 'error';   
        }
    }else if($operacion=='insert'){
            if(isset($_POST['nombre'])){
            $persona = new personas();
            $persona->setNombre($_POST['nombre']);
            $persona->setApellido($_POST['apellido']);
            $persona->setFecha_nacimiento($_POST['fecha']);
            $persona->setDni($_POST['dni']);
            $conexion = new GenericCRUD('personas',$persona);
            if(is_null($conexion->CreateRecord('',''))){
                $json = array();
                $json['ok'] = 'error';
            }else{
                $json = array();
                $json['ok'] = 'ok';
            }  
        }else{
            $json = array();
            $json['ok'] = 'error';   
        }   
    }else if($operacion=='delete'){
        if(isset($_POST['id'])){
            $persona = new personas();
            $persona->setId($_POST['id']);
            $conexion = new GenericCRUD('personas',$persona);
            if(is_null($conexion->deleteAll())){
                $json = array();
                $json['ok'] = 'error';
            }else{
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
}else{
    $json = array();
    $json['ok'] = 'error';
}
$jsonString = json_encode($json);
echo $jsonString;
$desconexion = new MysqlStructure();
$desconexion ->closeConnection();
?>