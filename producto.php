<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/producto.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title id="titulo">Producto</title>
</head>
<body>
    <?php require 'partials/nav.php' ?>

    <article class="article">
        <section class="objeto">
        <?php
                require 'service/producto/get_pro.php';
            ?>
        </section>
        <section class="moreElements">
        <div class="masVendidoTítulo"><h2>MÁS PRODUCTOS</h2></div>
            <div class="objetosMasVendidos-container" id="space-list">
            <?php
                require 'service/producto/get_all_products.php';
            ?>
            </div>
        </section>
    </article>

    <?php require 'partials/foot.php' ?>

    <!-- Número -->
    <script type="text/javascript">
        var numbers = document.getElementById('box');
        for(i=0; i<100;i++){
            var span = document.createElement('span');
            span.textContent = i;
            numbers.appendChild(span);
        }
        var num = numbers.getElementsByTagName('span');
        var index = 0;
        
        function nextNum(){
            num[index].style.display = 'none';
            num[index].classList.remove("cantidad");
            num[index].classList.add('none');
            index = (index + 1) % num.length;
            num[index].style.display = 'initial';
            num[index].classList.remove("none");
            num[index].classList.add("cantidad");
        }

        function prevNum(){
            num[index].style.display = 'none';
            num[index].classList.remove("cantidad");
            num[index].classList.add("none");
            index = (index - 1 + num.length) % num.length;
            num[index].classList.remove("none");
            num[index].classList.add("cantidad");
            num[index].style.display = 'initial';
        }
    </script>

    <!-- Lógica de la compra -->
    <script type="text/javascript">
        var p='<?php echo $_GET["p"]; ?>';
    </script>
    <script src="js/menu.js"></script>
    <script src="js/producto.js"></script>
    <script type="text/javascript">
        function iniciar_compra(){
            var cantidad = 0;
            var cantidad_text = document.querySelector('.cantidad').textContent;
            var cantidad = parseInt(cantidad_text);
            if (cantidad == 0) {
        
            }else{
                $.ajax({
                url:'service/compras/validar_inicio_compra.php',
                type:'POST',
                data:{
                    id_producto:p,
                    cantidad:cantidad
                },
                success:function(data){
                    console.log(data);
                    if(data.state){
                        alert(data.detail);
                    }else{
                        alert(data.detail);
                        if(data.open_login){
                            open_login()
                        }
                    }
                },
                error:function(err){
                    console.log(err);
                }
            });
        }
    }
    function open_login(){
        window.location.href="login.php";
    }
    </script>
</body>
</html>