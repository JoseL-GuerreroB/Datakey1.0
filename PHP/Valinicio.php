<?php
    session_start();
    include("conexion.php");
    if($conexion){
        $usuario=$_POST['usuarioi'];
        $clave=$_POST['clavei'];
        $Openu=mysqli_query($conexion,"SELECT * FROM clientes WHERE usuario='$usuario'");
        $Comp=mysqli_query($conexion, "SELECT * FROM clientes WHERE usuario='$usuario' AND clave='$clave'");
        if(mysqli_num_rows($Openu)<1){
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
                <h1>Error</h1>
                <p>El usuario aun no a sido registrado</p>
                <button id='devuelta'> Volver </button>
            </body>
            </html>
            <script>
                var regresar= document.getElementById('devuelta');
                regresar.addEventListener('click',()=>{
                    window.location.href='/CuerpoInicio.htm';
                });
            </script>
            <?php
        } elseif(mysqli_num_rows($Comp)<1){
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
                <h1>Error</h1>
                <p>La contraseña no corresponde con el usuario</p>
                <button id='devuelta'> Volver </button>
            </body>
            </html>
            <script>
                var regresar= document.getElementById('devuelta');
                regresar.addEventListener('click',()=>{
                    window.location.href='/CuerpoInicio.htm';
                });
            </script>
            <?php
        } else{
            $resultado=$Comp;
            $file=mysqli_num_rows($resultado);
            if($file==1){
                $_SESSION['usuario']=$usuario;
                header("Location: /PHP/Sesion.php");
            }
        }
    }
?>