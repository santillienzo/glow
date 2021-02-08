$(document).ready(function(){
    var product = "<?php echo $_GET['product']; ?>";
    $.ajax({
        url:'service/producto/result.php',
        type:'POST',
        data:{
            product:product
        },
        success:function(data){
            let html='';
            for(var i = 0; i<data.datos.length; i++){
                html+=
                '<div class="MVcard">'+
                    '<a href="producto.php?p='+data.datos[i].id_producto+'">'+
                        '<div class="imgMV-container">'+
                            '<img src="Images/productos/'+ data.datos[i].rut_imagen+'" alt="">'+
                        '</div>'+
                        '<div class="tituloMV-container"><h3>'+data.datos[i].nombre_producto+'</h3></div>'+
                        '<div class="descripcionMV-container"><p>'+data.datos[i].des_producto+'</p></div>'+
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