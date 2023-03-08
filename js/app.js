$(document).ready(function(){
    //Declaro variables
    var idPersona; 
    CargarTabla();
    $(document).on('click','#btnMod',function(e){
        //print_r(e);
        $("#updatePersona").show();
        let template = '';
        template += `Update de Persona`;
        $("#tituloInsert").html(template);
        template = '';
        idPersona = $(this).val();
        console.log("id persona: "+idPersona);
    });
    //Control de Ventanas visibles
    $('#busqueda').hide();
    $("#updatePersona").hide();
    $('#btnAlumno').show();
    $('#btnMedicamento').hide();
    $('#btnPrescripcion').hide();
    $('#tablaMedicamentos').hide();
    $("#tablaPrescripciones").hide();
    //$('#busqueda').hide();
    $("#PersonasTable").click(function(){
        $("#updatePersona").hide();
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
                    <td><button id="btnMod" value=${contenido[x].id} type="button" style="margin: 10px;" class="btn btn-success"><img src="imagenes/pencil-square.svg"></button><a class="btn btn-danger" href="#"><img src="imagenes/trash3-fill.svg"></a></td>
            </tr>
                `;
            }
            $("#personas").html(template);
        }
       }); 
    }
    $('#updatePersona').submit(function(e){
        e.preventDefault();   
        $.ajax({
            url: '../controladores/updatePersona.php',
            type: 'post',
            data: $('#updatePersona').serialize(),
            beforeSend: function(){
                console.log("Enviado");
            },
            success: function(response){
                console.log(response);

                let contenido = JSON.parse(response);
                console.log(contenido);
            },
            error: function(response){
                console.log("error function")
                console.log (response);

                //let contenido = JSON.parse(response);
                //console.log(contenido);
            } 
        });

        
    });
    
});