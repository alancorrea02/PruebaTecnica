<?php 
//include("modelos/MysqlStructure.php");
//include('modelos/Personas.php');

include('modelos/genericCrud.php');
$vector = array();
array_push($vector,'nombre','nombre_comercial');
$persona = new personas();
$persona->setId(2);
$conexion = new GenericCRUD('personas',$persona);
$conexion->readAll();

