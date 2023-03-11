$(document).ready(function(){
   
    function ObtenerSearch(parametro){
        datar = 'dato='+parametro;
        console.log(datar);
        $.ajax({
            url:'controladores/buscador.php',
            type: 'post',
            data: datar,
            success: function(response){
                let contenido = JSON.parse(response);
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
    $(document).on('keyup','#search',function(){
        let valor = $(this).val();
        if(valor==''){
            ObtenerSearch ('');
        }
        else{
            ObtenerSearch (valor);
        }
    })
});