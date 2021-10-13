<?php
    session_start();
    session_destroy();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error de Inicio</title>
    </head>
    <body>
        <h1>Cerraste sesion</h1>
        <p>Da click en volver para regresar a la pagina de inicio</p>
        <button id='devuelta3'> Volver </button>
    </body>
    </html>
    <script>
        var regresar= document.getElementById('devuelta3');
        regresar.addEventListener('click',()=>{
            window.location.href='/../CuerpoInicio.htm';
        });
    </script>
    <?php
    die();
?>