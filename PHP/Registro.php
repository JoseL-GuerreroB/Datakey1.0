<?php
    session_start();
    include("conexion.php");
    if($conexion){
        $nombre=trim($_POST['nombre']);
        $apellido=trim($_POST['apellido']);
        $edad=trim($_POST['edad']);
        $fecha=$_POST['fechaName'];
        $usuario=trim($_POST['usuario']);
        $correo=trim($_POST['correo']);
        $clave=$_POST['clave'];
        $verUsu=mysqli_query($conexion,"SELECT * FROM clientes WHERE usuario='$usuario'");
        $verCor=mysqli_query($conexion,"SELECT * FROM clientes WHERE correo='$correo'");
        if(mysqli_num_rows($verUsu)>0){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Error de registro</title>
            </head>
            <body>
                <h1>Error</h1>
                <p>El usuario ya existe, favor de colocar otro diferente</p>
                <button id='devuelta'> Aceptar </button>
            </body>
            </html>
            <script>
                var regresar= document.getElementById('devuelta');
                regresar.addEventListener('click',()=>{
                    window.location.href='/CuerpoInicio.htm';
                });
            </script>
            <?php
        }else if(mysqli_num_rows($verCor)>0){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Error de registro</title>
            </head>
            <body>
                <h1>Error</h1>
                    <p>El correo ya existe, favor de colocar otro diferente</p>
                    <button id='devuelta'> Aceptar </button>
            </body>
            </html>
            <script>
                var regresar= document.getElementById('devuelta');
                regresar.addEventListener('click',()=>{
                    window.location.href='/CuerpoInicio.htm';
                });
            </script>
            <?php
        }else{
            $consulta="INSERT INTO clientes(nombre,apellido,edad,fecha,usuario,correo,clave) VALUE ('$nombre','$apellido','$edad','$fecha','$usuario','$correo','$clave')";
            $resultado=mysqli_query($conexion,$consulta);
            $_SESSION['usuario']=$usuario;
            if ($resultado) {
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Bienvenido</title>
                </head>
                <body>
                    <h1>Cliente registrado</h1>
                        <p>Emos preparado un perfil personal donde podras ver los cursos que <br>
                        tengas por categoria. da click en aceptar para comenzar</p>
                        <button id='devuelta'> Aceptar </button>
                </body>
                </html>
                <script>
                    var regresar= document.getElementById('devuelta');
                    regresar.addEventListener('click',()=>{
                        window.location.href='/PHP/Sesion.php';
                    });
                </script>
                <?php
            } else {
                echo 'A ocurrido un error';
            }
        }
    }else {
        echo "ha ocurrido un error";
    }
?>