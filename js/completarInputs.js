$(document).ready(function(){
    var id;
    $(document).on('click','#btnMod',function(e){ //btn mod son los botones de modificacion---------------
        id = $(this).val();
        datar = "id="+id+"&operation=persona";
        console.log(id);
        $.ajax({
            url:'controladores/cargaInputs.php',
            type:'post',
            data:datar,
            success: function (response){
                console.log(response);
                let contenido = JSON.parse(response);
                console.log(contenido);
                if(contenido.error!='error'){
                    $("#nombre").val(contenido[0].nombre);
                    $("#apellido").val(contenido[0].apellido);
                    $("#dni").val(contenido[0].dni);
                    $("#fecha").val(contenido[0].fecha_nacimiento);
                }                
            }
        });
    });
    $(document).on('click','#btnMod1',function(e){ //btn mod son los botones de modificacion---------------
        id = $(this).val();
        datar = "id="+id+"&operation=medicamentos";
        console.log(datar);
        $.ajax({
            url:'controladores/cargaInputs.php',
            type:'post',
            data:datar,
            success: function (response){
                console.log(response);
                let contenido = JSON.parse(response);
                console.log(contenido);
                if(contenido.error!='error'){
                    $("#nombre_comercial").val(contenido[0].nombre_comercial);    
                }                
            }
        });
    });
    $(document).on('click','#btnMod2',function(e){ //btn mod son los botones de modificacion---------------
        id = $(this).val();
        datar = "id="+id+"&operation=personaMedicamento";
        console.log(datar);
        $.ajax({
            url:'controladores/cargaInputs.php',
            type:'post',
            data:datar,
            success: function (response){
                console.log(response);
                let contenido = JSON.parse(response);
                console.log(contenido);
                if(contenido.error!='error'){
                    $("#selectNombre").val(contenido[0].persona_id);
                    $("#selectMedicamento").val(contenido[0].medicamento_id);
                    $("#observaciones").val(contenido[0].observaciones);    
                }                
            }
        });
    });
});