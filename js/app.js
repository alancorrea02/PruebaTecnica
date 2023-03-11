$(document).ready(function(){
    //variable que constantemente guarda el id de la tabla, cualquiera.
    var idPersona; 
   

//---------------Funciones de JS Para Index---------------
//---------------Clicks---------------
    
CargarTabla();
$('#ok').hide();
$('#busqueda').hide();
$("#updatePersona").hide();
$("#insertPersona").hide();
$("#updateMedicamento").hide();
$("#updatePrescripciones").hide();
$('#btnPersona').show();
$('#btnMedicamento').hide();
$('#btnPrescripcion').hide();
$('#tablaMedicamentos').hide();
$("#tablaPrescripciones").hide();

//---------------Clicks en ventanas botones para cambiar ventanas---------------

$("#PersonasTable").click(function(){
    $("#updatePrescripciones").hide();
    $("#updateMedicamento").hide();
    $("#updatePersona").hide();
    $('#ok').hide();
    $('#busqueda').hide();
    $("#tabla").show(400);
    $('#btnMedicamento').hide();
    $('#btnPrescripcion').hide();
    $('#btnPersona').show(400);
    $('#tablaMedicamentos').hide();
    $("#tablaPrescripciones").hide();
});
$("#medicamentosTable").click(function(){
    $("#updatePrescripciones").hide();
    CargarTablaMedicamentos();
    $("#updateMedicamento").hide();
    $('#ok').hide();
    $("#updatePersona").hide();
    $('#busqueda').hide();
    $('#btnPersona').hide();
    $('#btnMedicamento').show(400);
    $('#btnPrescripcion').hide();
    $("#tablaPrescripciones").hide();
    $("#tabla").hide();
    $("#tablaMedicamentos").show(400);
});
$("#prescripcionesTable").click(function(){
    $("#updatePrescripciones").hide();
    CargarTablaPrescripciones();
    $("#updateMedicamento").hide();
    $('#ok').hide();
    $('#busqueda').show(400);
    $("#updatePersona").hide();
    $("#tabla").hide();
    $('#btnPersona').hide();
    $('#btnMedicamento').hide();
    $('#btnPrescripcion').show(400);
    $("#tablaMedicamentos").hide();
    $("#tablaPrescripciones").show();
});

//----------------Clicks en botones de funcion---------------

$(document).on('click','#btnMod',function(e){ //btn mod son los botones de modificacion---------------
    $("#updatePersona").attr("value","updatePersona");
    let template = '';
    $("#updatePersona").show(400);
    $("#updatePersona")[0].reset();
    template = `Update de Persona`;
    $("#tituloInsert").html(template);
    template = '';
    idPersona = $(this).val();
    $('#ok').hide();
});
$(document).on('click','#btnMod1',function(e){
    $("#updateMedicamento").attr("value","updateMedicamento");
    let template = '';
    $("#updateMedicamento").show(400);
    $("#updateMedicamento")[0].reset();
    template = `Update de Medicamento`;
    $("#tituloInsert1").html(template);
    template = '';
    idPersona = $(this).val();
    console.log(idPersona);
    $('#ok1').hide();
});
$(document).on('click','#btnMod2',function(e){
    $("#selectNombre").show();
    $("#selectMedicamento").show();
    $("#updatePrescripciones").attr("value","updatePrescripciones");
    let template = '';
    $("#updatePrescripciones").show(400);
    $("#updatePrescripciones")[0].reset();
    template = `Update de Prescripciones`;
    $("#tituloInsert2").html(template);
    template = '';
    idPersona = $(this).val();
    CargaSelect();
    $('#ok2').hide();
});
$(document).on('click','#btnPersona',function(e){ //Btn con el nombre de la tabla es el de insertar---------------
    $("#updatePersona").attr("value","insertPersona");
    let template = '';
    $("#updatePersona").show(400);
    $("#updatePersona")[0].reset();
    template = `Insert de Persona`;
    $("#tituloInsert").html(template);
    template = '';
    $('#ok').hide();
});
$(document).on('click','#btnMedicamento',function(e){
    $("#updateMedicamento").attr("value","insertMedicamento");
    let template = '';
    $("#updateMedicamento").show(400);
    $("#updateMedicamento")[0].reset();
    template = `Insert de Medicamento`;
    $("#tituloInsert1").html(template);
    template = '';
    $('#ok1').hide();
});
$(document).on('click','#btnPrescripcion',function(e){
    $("#updatePrescripciones").attr("value","insertPrescripcion");
    $("#selectNombre").show();
    let template = '';
    $("#updatePrescripciones").show(400);
    $("#updatePrescripciones")[0].reset();
    template = `Insert de Prescripcion`;
    $("#tituloInsert2").html(template);
    template = '';
    $('#ok2').hide();
    CargaSelect();
});

    $(document).on('click','#btnDel',function(e){ //clicks en btnDel estos btnDel son botones de eliminar, están numerados---------------
        $("#updatePersona").hide(400);
        $("#updatePersona")[0].reset();
        let datar = $(this).val();
        datar = 'id='+datar+'&operation=delete';
        console.log(datar);
        $.ajax({
            url: 'controladores/controladorPersona.php',
            type: 'post',
            data: datar,
            beforeSend: function(){
            },
            success: function(response){
                console.log(response);
                let contenido = JSON.parse(response);
                let template = '';
                if(contenido.ok=='error'){
                    alert("Error, no se pudo borrar")
                }
                else if(contenido.ok=='ok'){
                    alert("Operacion exitosa")
                }
                CargarTabla();  
            },
            error: function(){
                console.log("error function");
            } 
        });
    });
    $(document).on('click','#btnDel1',function(e){
        $("#updateMedicamento").hide(400);
        $("#updateMedicamento")[0].reset();
        let datar = $(this).val();
        datar = 'id='+datar+'&operation=delete';
        console.log(datar);
        $.ajax({
            url: 'controladores/controladorMedicamento.php',
            type: 'post',
            data: datar,
            beforeSend: function(){
            },
            success: function(response){
                console.log(response);
                let contenido = JSON.parse(response);
                let template = '';
                if(contenido.ok=='error'){
                    alert("Error, no se pudo borrar")
                }
                else if(contenido.ok=='ok'){
                    alert("Operacion exitosa")
                }
                //$('#ok').html(template);
                //$('#ok').show();
                CargarTablaMedicamentos();  
            },
            error: function(){
                console.log("error function");
            } 
        });
    });
    $(document).on('click','#btnDel2',function(e){
        $("#updatePrescripciones").hide(400);
        $("#updatePrescripciones")[0].reset();
        let datar = $(this).val();
        datar = 'id='+datar+'&operation=delete';
        console.log(datar);
        $.ajax({
            url: 'controladores/controladorPrescripciones.php',
            type: 'post',
            data: datar,
            beforeSend: function(){
            },
            success: function(response){
                console.log(response);
                let contenido = JSON.parse(response);
                let template = '';
                if(contenido.ok=='error'){
                    alert("Error, no se pudo borrar")
                }
                else if(contenido.ok=='ok'){
                    alert("Operacion exitosa")
                }
                //$('#ok').html(template);
                //$('#ok').show();
                CargarTablaPrescripciones();  
            },
            error: function(){
                console.log("error function");
            } 
        });
    });

    //---------------Funciones Principales---------------
   
    //---------------Funciones de Carga para tablas y selects---------------
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
 function CargarTablaMedicamentos(){
    $.ajax({
        url: 'controladores/tablaMedicamentos.php',
        type : 'GET',
        success: function (response){
            let contenido = JSON.parse(response);
            let template = '';
            for (x in contenido){
                template +=`
                    <tr>
                        <td>${contenido[x].id}</td>
                        <td>${contenido[x].nombre_comercial}</td>  
                        <td><button id="btnMod1" value=${contenido[x].id} type="button" style="margin: 10px;" class="btn btn-success"><img src="imagenes/pencil-square.svg"></button><button class="btn btn-danger" id="btnDel1" value=${contenido[x].id}><img src="imagenes/trash3-fill.svg"></button></td>
                    </tr>
                `;
            }
            $("#medicamentos").html(template);
        }
    });
}
function CargarTablaPrescripciones(){
    $.ajax({
        url: 'controladores/tablaPrescripciones.php',
        type : 'GET',
        success: function (response){
            //console.log(response);
            let contenido = JSON.parse(response);
            //console.log(contenido);
            let template = '';
            for (x in contenido){
                template +=`
                    <tr>
                        <td>${contenido[x].id}</td>
                        <td>${contenido[x].nombre}</td>
                        <td>${contenido[x].apellido}</td>
                        <td>${contenido[x].dni}</td>  
                        <td>${contenido[x].nombre_comercial}</td>
                        <td>${contenido[x].observaciones}</td>
                        <td>${contenido[x].created_at}</td>    
                        <td><button id="btnMod2" value=${contenido[x].id} type="button" style="margin: 10px;" class="btn btn-success"><img src="imagenes/pencil-square.svg"></button><button class="btn btn-danger" id="btnDel2" value=${contenido[x].id}><img src="imagenes/trash3-fill.svg"></button></td>
                    </tr>
                `;
            }
            $("#prescripciones").html(template);
        }
    });
}
function CargaSelect(){
    $.ajax({
        url: 'controladores/controlTablas.php',
        type : 'GET',
        success: function (response){
            //console.log(response);
            let contenido = JSON.parse(response);
            //console.log(contenido);
            let template = '';
            for (x in contenido){
                template +=`
                   <option value=${contenido[x].id}>${contenido[x].id}-${contenido[x].nombre}</option>
                `;
            }
            $("#selectNombre").html(template);

        }
    });
    $.ajax({
        url: 'controladores/tablaMedicamentos.php',
        type : 'GET',
        success: function (response){
            let contenido = JSON.parse(response);

            let template = '';
            for (x in contenido){
                template +=`
                   <option value=${contenido[x].id}>${contenido[x].id}-${contenido[x].nombre_comercial}</option>
                `;
            }
            $("#selectMedicamento").html(template);
        }
    });
}
    
    //---------------Funciones de Submit de formularios---------------

    $('#updatePersona').submit(function(e){
        e.preventDefault();
        let datar = $('#updatePersona').serialize();
        //let url1='';
        if($("#updatePersona").attr("value")=='updatePersona'){
            datar = datar+'&id='+idPersona;
            datar = datar+'&operation=update';  
        }else if($("#updatePersona").attr("value")=='insertPersona'){
            datar = datar+'&operation=insert'; 
        }
        console.log(datar);
        $.ajax({
            url: 'controladores/controladorPersona.php',
            type: 'post',
            data: datar,
            beforeSend: function(){
            },
            success: function(response){
                console.log(response);
                let contenido = JSON.parse(response);
                let template = '';
                if(contenido.ok=='error'){
                    template = `<div class="alert alert-danger alert-lg">Error, no se pudo realizar la operación.</div>`;
                }else if(contenido.ok=='ok'){
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
    $('#updateMedicamento').submit(function(e){
        e.preventDefault();
        let datar = $('#updateMedicamento').serialize();
        //let url1='';
        if($("#updateMedicamento").attr("value")=='updateMedicamento'){
            datar = datar+'&id='+idPersona;
            datar = datar+'&operation=update';  
        }else if($("#updateMedicamento").attr("value")=='insertMedicamento'){
            datar = datar+'&operation=insert'; 
        }
        console.log(datar);
        $.ajax({
            url: 'controladores/controladorMedicamento.php',
            type: 'post',
            data: datar,
            beforeSend: function(){
            },
            success: function(response){
                console.log(response);
                let contenido = JSON.parse(response);
                let template = '';
                if(contenido.ok=='error'){
                    template = `<div class="alert alert-danger">Error, no se pudo realizar la operación.</div>`;
                }else if(contenido.ok=='ok'){
                    template = `<div class="alert alert-success">La operación fué exitosa.</div>`;
                }
                $('#ok1').html(template);
                $('#ok1').show();
                CargarTablaMedicamentos();  
            },
            error: function(){
                console.log("error function");
            } 
        }); 
    });
    $('#updatePrescripciones').submit(function(e){
        e.preventDefault();
        let datar = $('#updatePrescripciones').serialize();
        //let url1='';
        if($("#updatePrescripciones").attr("value")=='updatePrescripciones'){
            datar = datar+'&id='+idPersona;
            datar = datar+'&operation=update';  
        }else if($("#updatePrescripciones").attr("value")=='insertPrescripcion'){
            datar = datar+'&operation=insert'; 
        }
        console.log(datar);
        $.ajax({
            url: 'controladores/controladorPrescripciones.php',
            type: 'post',
            data: datar,
            beforeSend: function(){
            },
            success: function(response){
                console.log(response);
                let contenido = JSON.parse(response);
                console.log(contenido);
                let template = '';
                if(contenido.ok=='error'){
                    template = `<div class="alert alert-danger">Error, no se pudo realizar la operación.</div>`;
                }else if(contenido.ok=='ok'){
                    template = `<div class="alert alert-success">La operación fué exitosa.</div>`;
                }
                $('#ok2').html(template);
                $('#ok2').show();
                CargarTablaPrescripciones();  
            },
            error: function(){
                console.log("error function");
            } 
        }); 
    });
});