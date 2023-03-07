<?php
$id = $_GET['id'];
$_SESSION['id'] = $id;
include('../controladores/updatePersona.php');  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../estilos/style.css">
    <title>Document</title>
</head>

<body>
<div class="container">
    <div class="row ">
        <div class="col-xl-12 col-sm-12 col-ls-12 col-md-12 text-dark text-center m-auto d-flex justify-content-center align-items-center my-5">
            <form action="">
                <div class="card border-0">
                    <div class="card-title h2 ">Ingresar datos</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-ls-2 col-sm-2 justify-content-center text-center align-items-center">
                                <label class="h5"for="nombre">Nombre</label><br>
                                <input type="text" name="nombre" id="nombre" required>
                            </div>
                            <div class="col-xl-4 col-ls-2 col-sm-2 ">
                                <label class="h5"for="apellido">Apellido</label><br>
                                <input type="text" name = "apellido" id="apellido" required>
                            </div>
                            <div class="col-xl-4 col-ls-2 col-sm-2 col-md-2 ">
                                <label class="h5"for="dni">Dni</label><br>
                                <input type="text" name="dni" id="dni" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class=" col-xl-4  col-sm-12  justify-content-center text-center align-items-center my-5">
                                <label class="h5"for="fecha">Fecha de Nacimiento</label><br>
                                <input type="date" class="form-control" name="fecha" id="fecha" placeholder="fecha" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 justify-content-center ext-center align-items-center">
                                <input class="btn btn-lg btn-success " type="submit" name="envio" value="enviar">
                            </div>
                        </div>    
                            
                            
                    </div>
                </div>
            </form>
                
        </div>
    </div>
</div>
    
</body>
<!--Scripts de Javascript-->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery-3.6.3.min.js.js"></script>
<script type="text/javascript"></script>
<script src="../js/updatePersona.js"></script>
</html>