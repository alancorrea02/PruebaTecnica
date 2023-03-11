$(document).ready(function(){
    //Ambos archivos funcionan en conjunto app.js y showData.js los dividí solo para que sean más legibles a mi parecer
    var idPersona; 
    CargarTabla();

    //Funciones de JS Para Index
    //Clicks
    $(document).on('click','#btnDel',function(e){ //clicks en btnDel estos btnDel son botones de eliminar, están numerados
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

    //Funciones Principales
    //Funciones de carga
    
    
    //Funciones de Submit de formularios

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