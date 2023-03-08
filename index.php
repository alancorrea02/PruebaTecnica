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
                    <nav>
                        <div class="card-title">
                            <div class="btn-group">
                                <a href="#" class="btn btn-primary btn-lg" aria-current="page" id="PersonasTable">Personas</a>
                                <a href="#" class="btn btn-primary btn-lg" id="medicamentosTable">Medicamentos</a>
                                <a href="#" class="btn btn-primary btn-lg" id="prescripcionesTable">Prescripciones médicas</a>
                                <a target="_blank" href="https://www.google.com/search?client=firefox-b-lm&q=personas" class=" btn btn-info btn-lg" id="btnAlumno">Agregar alumno <img src="imagenes/plus-square.svg"></a>
                                <a target="_blank" href="https://www.google.com/search?client=firefox-b-lm&q=medicamentos" class=" btn btn-info btn-lg" id="btnMedicamento">Agregar medicamento <img src="imagenes/plus-square.svg"></a>
                                <a target="_blank" href="https://www.google.com/search?client=firefox-b-lm&q=prescripciones+medicas" class=" btn btn-info btn-lg" id="btnPrescripcion">Agregar prescripcion <img src="imagenes/plus-square.svg"></a>
                            </div>
                        </div>
                    </nav>
                    <div class="card-body" id="bodyt">
                    <form action="" id="updatePersona">
                        <div class="card border-0">
                            <div class="card-title h2 text-center text-dark">Ingresar datos</div>
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
                                    <div class="col-12 justify-content-center text-center align-items-center">
                                        <input class="btn btn-lg btn-success " type="submit" name="envio" value="enviar">
                                    </div>
                                </div>      
                            </div>
                        </div>
                    </form>
                        <form id="busqueda" class="text-dark text-center m-auto d-flex justify-content-center align-items-center" action="" style="margin:5px;">
                            <input  type="text" style="height:35px; margin-right: 10px;">
                            <input class="btn btn-success mb-1" type="submit" value="Búsqueda">
                        </form>
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
<script> //muestra el mensaje del tooltip
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
<script type="text/javascript">
    
</script>
<script type= "text/javascript">
    $(document).ready(function(){
        CargarTabla();
        $(document).on('click','#btnMod',function(e){
            $("#updatePersona").hide();
        });
        $('#busqueda').hide();
        $('#btnAlumno').show();
        $('#btnMedicamento').hide();
        $('#btnPrescripcion').hide();
        $('#tablaMedicamentos').hide();
        $("#tablaPrescripciones").hide();
        $("#PersonasTable").click(function(){
            $('#busqueda').hide();
            $("#tabla").show(400);
            $('#btnMedicamento').hide();
            $('#btnPrescripcion').hide();
            $('#btnAlumno').show(400);
            $('#tablaMedicamentos').hide();
            $("#tablaPrescripciones").hide();
        });
        $("#btnMod").click(function(){
            console.log("ff");
        });
        $("#medicamentosTable").click(function(){
            $('#busqueda').hide();
            $('#btnAlumno').hide();
            $('#btnMedicamento').show(400);
            $('#btnPrescripcion').hide();
            $("#tablaPrescripciones").hide();
            $("#tabla").hide();
            $("#tablaMedicamentos").show(400);
        });
        $("#prescripcionesTable").click(function(){
            $('#busqueda').show(400);

            $("#tabla").hide();
            $('#btnAlumno').hide();
            $('#btnMedicamento').hide();
            $('#btnPrescripcion').show(400);
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
                        <td><button id="btnMod" type="button" style="margin: 10px;" class="btn btn-success"><img src="imagenes/pencil-square.svg"></button><a class="btn btn-danger" href="#"><img src="imagenes/trash3-fill.svg"></a></td>
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

