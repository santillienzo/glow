<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/FAQ.css">
    <link rel="stylesheet" href="style/object/nav.css">
    <link rel="stylesheet" href="style/object/copy.css">
    <link rel="icon" href="Images/ico.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>

    <title>FAQ</title>
</head>
<body>
    
    <?php require 'partials/nav.php' ?>


    <article class="article">
        <div class="title">
            <h3>FAQ</h3>
            <h4>FREQUENTLY ASKED QUESTIONS</h4>
            <h5>(Preguntas más frecuentes)</h5>
        </div>
        <section class="faq">
            <div class="preguntas-container">
                <div class="q1_container q_container">
                    <h4>¿Quíenes somos?</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ducimus id magni molestias ullam, adipisci ab debitis similique, officia sed quisquam quo saepe aliquam autem eum expedita quas, hic tempore.</p>
                </div>
                <div class="q2_container q_container">
                    <h4>¿Por qué hacemos esto?</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi mollitia voluptates repellat nesciunt nulla, tempore natus eos? Maiores nostrum ad tempore quibusdam enim quod esse cupiditate minus magni modi? At?</p>
                </div>
                <div class="q3_container q_container">
                    <h4>¿Cómo comprar?</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi mollitia voluptates repellat nesciunt nulla, tempore natus eos? Maiores nostrum ad tempore quibusdam enim quod esse cupiditate minus magni modi? At?</p>
                </div>
            </div>
            
        </section>
    </article>

    <?php require 'partials/foot.php' ?>



    <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>