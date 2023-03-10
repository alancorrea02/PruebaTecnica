<?php 
include('../modelos/genericCrud.php');

if (isset($_POST['operation'])){
    $operacion = $_POST['operation'];
    if($operacion=='update'){
        if(isset($_POST['id'])){
            $medicamento = new Medicamentos();
            $medicamento->setId($_POST['id']);
            $medicamento->setNombre_comercial($_POST['nombre_comercial']);
            $conexion = new GenericCRUD('medicamentos',$medicamento);
            $conexion->UpdateAll('','');
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
        if(isset($_POST['nombre_comercial'])){
            $medicamento = new Medicamentos();
            $medicamento->setNombre_comercial($_POST['nombre_comercial']);
            $conexion = new GenericCRUD('medicamentos',$medicamento);
            $cone = $conexion->CreateRecord('','');
            if(is_null($cone)){
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
            $medicamento = new Medicamentos();
            $medicamento->setId($_POST['id']);
            $conexion = new GenericCRUD('medicamentos',$medicamento);
            $cone = $conexion->deleteAll();
            if(is_null($cone)){
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
$jsonString = json_encode($json);
echo $jsonString;
?>