<?php 
//include("modelos/MysqlStructure.php");
//include('modelos/Personas.php');
//include('modelos/genericCrud.php');
//include('controladores/controlTablas.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="estilos/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-ls-12 col-lg-12">
                <div class="card border-0" style="background: rgba(255,255,255,0.1); box-shadow: 0 1px 15px rgba(255,255,255,.1);">
                    <div class="card-title">
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary btn-lg" aria-current="page" id="PersonasTable">Personas</a>
                            <a href="#" class="btn btn-primary btn-lg" id="medicamentosTable">Medicamentos</a>
                            <a href="#" class="btn btn-primary btn-lg" id="prescripcionesTable">Prescripciones médicas</a>
                        </div>
                    <div class="card-body" id="bodyt">
                    <table class="table table-responsive table-light table-border table-hover text-center" id = "tabla">
                        <thead>
                        <tr class="table-dark">
                            <td>id</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Dni</td>
                            <td>Edad</td>
                            <td>Acciones</td>
                        </tr>
                        </thead>
                        <tbody id="personas">

                        </tbody>
                    </table>
                    <table class="table table-responsive table table-light table-border table-hover text-center" id = "tablaMedicamentos">
                        <thead>
                        <tr class="table-dark">
                            <td>id</td>
                            <td>Nombre comercial</td>
                            <td>Acciones</td>
                        </tr>
                        </thead>
                        <tbody id="medicamentos">

                        </tbody>
                    </table>
                    <table class="table table-responsive table table-light table-border table-hover text-center" id = "tablaPrescripciones">
                        <thead>
                        <tr class="table-dark">
                        <td>id</td>
                            <td >Nombre</td>
                            <td>Apellido</td>
                            <td>Dni</td>
                            <td>medicamento</td>
                            <td>observaciones</td>
                            <td>fecha de prescripcion</td>
                            <td>Acciones</td>
                        </tr>
                        </thead>
                        <tbody id="prescripciones">

                        </tbody>
                    </table>
                    </div>
                        <!--<nav>
                            <ul class="pagination pagination-lg">
                               <li class="page-item"><a href="#" class="page-link">Personas</a></li>
                               <li class="page-item"><a href="#" class="page-link">Medicamentos</a></li>
                               <li class="page-item"><a href="#" class="page-link">Persona-medicamento</a></li>
                            </ul>
                        </nav>-->
                    </div>
                </div>
            </div>
                    
            </div>
        </div>
</body>

<!--Scripts de Javascript-->

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery-3.6.3.min.js.js"></script>
<script type="text/javascript">
        
    
</script>
<script type= "text/javascript">
    $("#document").ready(function(){
        CargarTabla();

        $('#tablaMedicamentos').hide();
        $("#tablaPrescripciones").hide();
        $("#PersonasTable").click(function(){
            /*if(v==0){
                v = 1;
                $("#tabla").hide();
            }else{
                v = 0;
                $("#tabla").show();
            }*/
            $("#tabla").show();
            $('#tablaMedicamentos').hide();
            $("#tablaPrescripciones").hide();

        });
        $("#medicamentosTable").click(function(){
            $("#tablaPrescripciones").hide();
            $("#tabla").hide();
            $("#tablaMedicamentos").show();
        });
        $("#prescripcionesTable").click(function(){
            $("#tabla").hide();
            $("#tablaMedicamentos").hide();
            $("#tablaPrescripciones").show();


        });
        function CargarTabla(){
           $.ajax({
            url: 'controladores/controlTablas.php',
            type: 'GET',
            success: function(response){
                console.log(response);

                let contenido = JSON.parse(response);
                console.log(contenido);
                template = '';
                for(x in contenido){
                    template += `
                    <tr>
                        <td>${contenido[x].id}</td>
                        <td>${contenido[x].nombre}</td>
                        <td>${contenido[x].apellido}</td>
                        <td>${contenido[x].dni}</td>
                        <td>${contenido[x].fecha_nacimiento}</td>
                        <td><a class="btn btn-success"><img src="imagenes/pencil-square.svg"></a> <a class="btn btn-danger"href="#"><img src="imagenes/trash3-fill.svg"></a></td>
                </tr>
                    `;
                }
                $("#personas").html(template);
            }
           }); 
        }
    });
</script>

</html>

