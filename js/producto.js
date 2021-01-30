$(document).ready(function(){
    $.ajax({
        url:'service/producto/get_all_products.php',
        type:'POST',
        data:{},
        success:function(data){
            let html='';
            for(var i = 0; i<data.datos.length; i++){

                if (data.datos[i].id_producto == p){
                    document.getElementById("id_imagen").src="Images/productos/"+data.datos[i].rut_imagen;
                    document.getElementById("id_nombre").innerHTML=data.datos[i].nombre_producto;
                    document.getElementById("id_precio").innerHTML=formato_precio(data.datos[i].pre_pro);
                    document.getElementById("id_descri").innerHTML=data.datos[i].des_producto;
                }

                html+=
                '<div class="MVcard">'+
                    '<a href="producto.php?p='+data.datos[i].id_producto+'">'+
                        '<div class="tituloMV-container"><h3>'+data.datos[i].nombre_producto+'</h3></div>'+
                        '<div class="imgMV-container">'+
                            '<img src="Images/productos/'+ data.datos[i].rut_imagen+'" alt="">'+
                        '</div>'+
                        '<div class="precioMV-container"><p>'+formato_precio(data.datos[i].pre_pro)+'</p></div>'+
                    '</a>'+
                '</div>';
                
            }
            document.getElementById("space-list").innerHTML= html;
        },
        error:function(err){
            console.error(err);
        }
    });
});

//Le doy formato al precio
function formato_precio(valor){
    return 'ARS $' + valor;
}

