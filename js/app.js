$(document).ready(function(){
    //Declaro variables
    //c//onsole.log()
    $("#insertPersona").attr("value","juan");
        console.log($("#insertPersona").attr("value"));
    var idPersona; 
    CargarTabla();
    $(document).on('click','#btnMod',function(e){
        

        let template = '';
        $("#updatePersona").show(400);
        template = `<input class="btn btn-lg btn-success " type="submit" name="envio" value="enviar">`;
        $('#btnAccion').html(template);
        $("#updatePersona")[0].reset();
        template = '';
        template += `Update de Persona`;
        $("#tituloInsert").html(template);
        template = '';
        idPersona = $(this).val();
        //console.log("id persona: "+idPersona);
    });

    //Control de Ventanas visibles
    $('#ok').hide();
    $('#busqueda').hide();
    $("#updatePersona").hide();
    $("#insertPersona").hide();

    $('#btnAlumno').show();
    $('#btnMedicamento').hide();
    $('#btnPrescripcion').hide();
    $('#tablaMedicamentos').hide();
    $("#tablaPrescripciones").hide();
    //$('#busqueda').hide();
    $("#PersonasTable").click(function(){
        $("#updatePersona").hide();
        $('#ok').hide();
        $('#busqueda').hide();
        $("#tabla").show(400);
        $('#btnMedicamento').hide();
        $('#btnPrescripcion').hide();
        $('#btnAlumno').show(400);
        $('#tablaMedicamentos').hide();
        $("#tablaPrescripciones").hide();
    });
    $("#btnMod").click(function(){
        //console.log("ff");
    });
    $("#medicamentosTable").click(function(){
        $('#ok').hide();
        $("#updatePersona").hide();
        $('#busqueda').hide();
        $('#btnAlumno').hide();
        $('#btnMedicamento').show(400);
        $('#btnPrescripcion').hide();
        $("#tablaPrescripciones").hide();
        $("#tabla").hide();
        $("#tablaMedicamentos").show(400);
    });
    $("#prescripcionesTable").click(function(){
        $('#ok').hide();
        $('#busqueda').show(400);
        $("#updatePersona").hide();
        $("#tabla").hide();
        $('#btnAlumno').hide();
        $('#btnMedicamento').hide();
        $('#btnPrescripcion').show(400);
        $("#tablaMedicamentos").hide();
        $("#tablaPrescripciones").show();
    });
    //Funciones de JS Para Index
    $(document).on('click','#btnDel',function(e){
        e.preventDefault();
        $.ajax({

        });
    });
    function CargarTabla(){
       $.ajax({
        url: 'controladores/controlTablas.php',
        type: 'GET',
        success: function(response){
            let contenido = JSON.parse(response);
            template = '';
            for(x in contenido){
                template += `
                <tr>
                    <td>${contenido[x].id}</td>
                    <td>${contenido[x].nombre}</td>
                    <td>${contenido[x].apellido}</td>
                    <td>${contenido[x].dni}</td>
                    <td>${contenido[x].fecha_nacimiento}</td>
                    <td><button id="btnMod" value=${contenido[x].id} type="button" style="margin: 10px;" class="btn btn-success"><img src="imagenes/pencil-square.svg"></button><button class="btn btn-danger" id="btnDel" value=${contenido[x].id}><img src="imagenes/trash3-fill.svg"></button></td>
            </tr>
                `;
            }
            $("#personas").html(template);
        }
       }); 
    }
    $('#updatePersona').submit(function(e){
        e.preventDefault();
        let datar = $('#updatePersona').serialize();
        datar = datar+'&id='+idPersona;  
        $.ajax({
            url: 'controladores/updatePersona.php',
            type: 'post',
            data: datar,
            beforeSend: function(){
            },
            success: function(response){
                let contenido = JSON.parse(response);
                let template = '';
                if(contenido.ok=='error'){
                    template = `<div class="alert alert-danger">Error, no se pudo realizar la operación.</div>`;
                }
                else if(contenido.ok=='ok'){
                    template = `<div class="alert alert-success">La operación fué exitosa.</div>`;
                }
                $('#ok').html(template);
                $('#ok').show();
                CargarTabla();  
            },
            error: function(){
                console.log("error function");
            } 
        });

        
    });
    
});