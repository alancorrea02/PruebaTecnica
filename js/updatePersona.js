$(document).ready(function(){
    $('#updatePersona').submit(function(e){
        e.preventDefault();
        //var data = new FormData($('#updatePersona')[0]);
       
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