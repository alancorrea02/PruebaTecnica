<?php 
//include("modelos/MysqlStructure.php");
include('modelos/genericCrud.php');
$conexion = new GenericCRUD();
$conexion->readAll();

