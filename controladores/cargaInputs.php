<?php
    include ('../modelos/genericCrud.php');
    $json = array();

    if (isset($_POST['operation'])){
        $operacion = $_POST['operation'];
        if($operacion=='persona'){
            if(isset($_POST['id'])){
                $persona = new personas();
                $persona->setId($_POST['id']);
                $conexion = new GenericCRUD('personas',$persona);
                $resultado = (array)  $conexion->readAllFrom();
                if(!is_null($resultado)){
                    $json = $resultado;
                    
                }else{
                    $json['error'] = 'error';
                }
                
            }else{
                $json['error'] = 'error';
            }
        }else if($operacion=='medicamentos'){
            if(isset($_POST['id'])){
                $medicamento = new Medicamentos();
                $medicamento->setId($_POST['id']);
                $conexion = new GenericCRUD('medicamentos',$medicamento);
                $resultado = (array)  $conexion->readAllFrom();
                if(!is_null($resultado)){
                    $json = $resultado;   
                }else{
                    $json['error'] = 'error';
                }
                
            }else{
                $json['error'] = 'error';
            }
        }else if($operacion=='personaMedicamento'){
            $personaMedicamento = new PersonaMedicamento();
            $personaMedicamento->setId($_POST['id']);
            $conexion = new GenericCRUD('persona_medicamento',$personaMedicamento);
            $resultado = (array)  $conexion->JoinPrescripcionesFrom();
            if(!is_null($resultado)){
                $json = $resultado;   
            }else{
                $json['error'] = 'error';
            }
        }
             
    }else{
        $json['error'] = 'error';
    }
    $jsonString = json_encode($json);
    echo $jsonString;  
    $desconexion = new MysqlStructure();
    $desconexion ->closeConnection();
?>