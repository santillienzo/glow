const menu = document.getElementById("menu-container");
const barras = document.getElementById('menu-bars');
const close = document.getElementById('close-nav');
const fondoMenu = document.getElementById('fondo-menu')

//ABRIR Y CERRAR MENÚ
barras.addEventListener("click",()=>{
    menu.style.display = "block";
    menu.style.animation = "abrirMenu .5s ease forwards";
    fondoMenu.style.display = "block";
    fondoMenu.style.animation = "fondo .5s ease forwards";
});


close.addEventListener("click",()=>{
    menu.style.animation = "cerrarMenu .5s ease forwards";
    fondoMenu.style.display = "none";
});

fondoMenu.addEventListener("click",()=>{
    menu.style.animation = "cerrarMenu .5s ease forwards";
    fondoMenu.style.display = "none";
});
//ABRIR Y CERRAR MENÚ

//ABRIR Y CERRAR ELEMENTOS DESPLEGABLES
const catalogo_btn = document.getElementById('catalogo-btn');
const items_catalogo = document.getElementById('items-catalogo');
const icon_catalogo = document.getElementById('i-catalogo');
var v = false;


icon_catalogo.classList.add("fas");
icon_catalogo.classList.add("fa-chevron-right");

catalogo_btn.addEventListener("click",()=>{
    
    if(v == false){
        items_catalogo.style.display = "block";
        icon_catalogo.classList.replace("fas", "fas");
        icon_catalogo.classList.replace("fa-chevron-right", "fa-chevron-down");
        v = true;
    }
    else if(v == true){
        items_catalogo.style.display = "none";
        icon_catalogo.classList.replace("fas", "fas");
        icon_catalogo.classList.replace("fa-chevron-down", "fa-chevron-right");
        v = false;
    }
});
//ABRIR Y CERRAR ELEMENTOS DESPLEGABLES


//DESPLEGAR INPUT
const input_search = document.getElementById('input-search');
const btn_search = document.getElementById('search');
const btn_buscar = document.getElementById('buscar');

btn_search.addEventListener("click",()=>{
    input_search.style.display = "inline-block";
    btn_search.style.display = "none";
    btn_buscar.style.display = "inline-block"
});

//BUSCADOR
$(document).ready(function(){
    $("#input-search").keyup(function(e){
        if(e.keyCode==13){
            search_product();
        }
    });
});
btn_buscar.addEventListener("click",()=>{
    search_product()
});

function search_product(){
    window.location.href="busquedas.php?product="+$("#input-search").val();
}

//BUSCADOR RESPONSIVE

const btn_buscar_r = document.getElementById('buscar-r');

btn_buscar_r.addEventListener("click",()=>{
    search_product_r()
});


function search_product_r(){
    window.location.href="busquedas.php?product="+$("#input-search-r").val();
}


//ABRIR Y CERRAR PANEL DEL PERFIL
const user = document.getElementById('user');
const panel = document.getElementById('panel');
var deci = false

user.addEventListener("click",()=>{
    if (deci == false) {
        panel.style.display = 'block';
        deci = true
    }else{
        panel.style.display = 'none';
        deci = false
    }
});

