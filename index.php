<?php 
//include("modelos/MysqlStructure.php");
//include('modelos/Personas.php');

include('modelos/genericCrud.php');
$vector = array();
array_push($vector,'nombre','nombre_comercial');
$persona = new personas();
$persona->setId(1);
$conexion = new GenericCRUD('personas',$persona,$vector);
$conexion->deleteFrom();

