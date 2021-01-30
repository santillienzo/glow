<header class="header">
        <div id="fondo-menu"></div>
        <div class="menu-container" id="menu-container">
            <div class="cerrar-menu">
                <i class="fas fa-times" id="close-nav"></i>
            </div>
            <nav class="menu-items">
                <div class="items-nav">
                    <a href="/"><li><i class="fas fa-genderless"></i><p>Inicio</p></li></a>
                </div>
                <div class="items-nav">
                    <a href="mas_vendido.php"><li><i class="fas fa-genderless"></i><p>Más vendidos</p></li></a>
                </div>
                <div class="items-nav" id="catalogo-btn">
                    <li><i  id="i-catalogo"></i><p>Catálogo</p></li>
                </div>
                <div id="items-catalogo">
                    <div class="item-catalogo">
                        <a href="complementos.php"><li><i class="fas fa-genderless"></i><p>Complementos</p></li></a>
                    </div>
                    <div class="item-catalogo">
                        <a href="roomdecor.php"><li><i class="fas fa-genderless"></i><p>Room decor</p></li></a>
                    </div>
                </div>
                <div class="items-nav">
                    <a href="contacto.php"><li><i class="fas fa-genderless"></i><p>Contacto</p></li></a>
                </div>
                <div class="items-nav">
                    <a href="politicaDev.php"><li><i class="fas fa-genderless"></i><p>Política de devolución</p></li></a>
                </div>
                <div class="items-nav">
                    <a href="mediospago.php"><li><i class="fas fa-genderless"></i><p>Medios de pago</p></li></a>
                </div>
                <div class="items-nav">
                    <a href="FAQ.php"><li><i class="fas fa-genderless"></i><p>Ayuda</p></li></a>
                </div>
                <div class="items-nav">
                    <a href="pedido.php"><li><i class="fas fa-genderless"></i><p>Mis pedidos</p></li></a>
                </div>
                <?php
                if (isset($_SESSION['cod_user'])) {
                    $cod_admin = $_SESSION['cod_user'];
                    if ($cod_admin == 1) {
                        echo
                            '<div class="items-nav">'.
                                '<a href="admin/admin.php"><li><i class="fas fa-genderless"></i><p>Panel de control</p></li></a>'.
                            '</div>';
                    }
                }
                ?>
                <div class="responsive">
                    <?php

                    if (isset($_SESSION['cod_user'])) {
                        echo
                        '<div class="items-nav">'.
                            '<a href="user.php"><li><i class="fas fa-genderless"></i><p>Perfil</p></li></a>'.
                        '</div>';
                    }else{
                        echo
                        '<div class="items-nav">'.
                            '<a href="login.php"><li><i class="fas fa-genderless"></i><p>Iniciar sesión</p></li></a>'.
                        '</div>';
                    }


                    ?>
                </div>
            </nav>
        </div>
        <div class="part-superior">
            <div class="icono-menu-container">
                <div class="icono-menu"><i class="fas fa-bars" id="menu-bars"></i></div>
            </div>
            <div class="titulo-container"><a href="/"><h1 class="titulo">GLOW</h1></a></div>
            <nav class="option-container">
                <input type="text" id="input-search" placeholder="Busca aquí...">
                <li class="item-option" id="search" title="Buscar"><i class="fas fa-search"></i></li>
                <?php
                if(isset($_SESSION['cod_user'])){
                    echo '<a href="user.php"><li class="item-option" id="user" title="Tu cuenta"><i class="fas fa-user"></i></li></a>';
                    
                }else{
                ?>
                <a href="login.php"><li class="item-option" id="user" title="Iniciar sesión o registrarte"><i class="fas fa-sign-in-alt"></i></li></a>
                <?php
                }
                ?>
                <a href="carrito.php">
                    <li class="item-option" id="cart" title="Carrito"><i class="fas fa-shopping-cart"></i></li>
                </a>
            </nav>
            <div class="responsive menu-responsive">
                <a href="carrito.php">
                    <li class="item-option" id="cart" title="Carrito"><i class="fas fa-shopping-cart"></i></li>
                </a>
            </div>
        </div>
        <div class="part-inferior">
            <div class="text1"><p>ENVÍOS A TODO EL PAÍS</p></div>
            <div class="text2"><p>MADE WITH LOVE</p></div>
        </div>
    </header>