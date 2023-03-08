<?php
include('../modelos/genericCrud.php');

//$id = $_SESSION['idPersona'];
$nombre = $_POST['nombre'];
//echo $nombre;
if (isset($_POST['nombre'])){
    echo true;
}
else{
    $json = array();
    $json['error'] = 'error';
    $jsonString = json_encode($json);
    echo $jsonString;
}
?>