$(document).ready(function(){
    function ObtenerSearch(parametro){
        $.ajax({
            url:'',
            data: parametro,
            success: function(response){

            }

        });
    }
    $(documento).on('keyup','#search',function(){
        let valor = $(this).val();
        if(valor==''){
            CargarTablaPrescripciones();
        }
        else{
            ObtenerSearch (valor);
        }
    })
});