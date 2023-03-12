<?php 
include('../modelos/genericCrud.php');
$json = array();

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
                $json['ok'] = 'error';
            }else if(!is_null($conexion->UpdateAll('',''))){
                $json['ok'] = 'ok';
            }  
        }else{
            $json['ok'] = 'error';
        }
    }else if($operacion=='insert'){
        if(isset($_POST['nombre_comercial'])){
            $medicamento = new Medicamentos();
            $medicamento->setNombre_comercial($_POST['nombre_comercial']);
            $conexion = new GenericCRUD('medicamentos',$medicamento);
            $cone = $conexion->CreateRecord('','');
            if(is_null($cone)){
                $json['ok'] = 'error';
            }else{
                $json['ok'] = 'ok';   
            }  
        }else{
            $json['ok'] = 'error';
        }
    }else if($operacion=='delete'){
            $medicamento = new Medicamentos();
            $medicamento->setId($_POST['id']);
            $conexion = new GenericCRUD('medicamentos',$medicamento);
            $cone = $conexion->deleteAll();
            if(is_null($cone)){
                $json['ok'] = 'error';
            }else{
                $json['ok'] = 'ok';   
            }  
    }else{
        $json['ok'] = 'error';
    }
}else{
    $json['ok'] = 'error';
}
$jsonString = json_encode($json);
echo $jsonString;
$desconexion = new MysqlStructure();
$desconexion ->closeConnection();
?>