<?php
    session_start();
    include("conexion.php");
    if(!isset($_SESSION['usuario'])){
        ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Error</title>
                </head>
                <body>
                    <h1>No has iniciado sesion</h1>
                        <p>Puedes intentar entrar creando un registro <br>
                        o puedes registrar otro correo</p>
                        <button id='devuelta'> Aceptar </button>
                </body>
                </html>
                <script>
                    var regresar= document.getElementById('devuelta');
                    regresar.addEventListener('click',()=>{
                        window.location.href='/../CuerpoInicio.htm';
                    });
                </script>
        <?php
        die();
    }else{
        $ultusuario=$_SESSION['usuario'];
        $consulta="SELECT * FROM clientes WHERE usuario='$ultusuario'";
        $resultado=mysqli_query($conexion, $consulta);
        if($resultado){
            while ($linea=$resultado->fetch_array()) {
                $id_cliente=$linea['id_cliente'];
                $nombre=$linea['nombre'];
                $apellido=$linea['apellido'];
                $edad=$linea['edad'];
                $fecha=$linea['fecha'];
                $correo=$linea['correo'];
            }
        }
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/d363d10441.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/Estandar.css">
    <link rel="stylesheet" href="/CSS/Sesion.css">
    <title>Perfil</title>
</head>
<body>
    <header>
        <img src="/IMG/llave.jpg" alt="" id="ico">
        <nav class="nav">
            <div class="busqueda">
                <input type="search" name="" id="" placeholder="Buscar Curso">
                <button>Buscar</button>
            </div>
            <ul>
                <li><a href="/CuerpoInicio.htm" class="enlace">Inicio</a></li>
                <li><a href="" class="enlace">Promociones</a></li>
                <li><a href="" class="enlace">Cursos</a></li>
                <li><a href="" class="enlace">Antivirus</a></li>
            </ul>
            <div class="perfil">
                <button>Modificar</button>
                <button id="devuelta2">Cerrar sesion</button>
            </div>
        </nav>
    </header>
    <div class="contper">
        <div class="fotpor">
            <form action="" method="post">
                <input type="file" value="Cambiar imagen">
                <button class="btn-m" type="submit">Modificar</button>
            </form>
            <div class="fotper">
                <form action="" method="post">
                    <input type="file" value="cambiar foto">
                    <button class="btn-m" type="submit">Modificar</button>
                </form>
            </div>
            <h1><?php echo $ultusuario;?></h1>
        </div>
    </div>
    <div class="dataper">
        <h2>Mis datos personales</h2>
        <div class="ep1">ID del cliente: <?php echo $id_cliente;?></div>
        <div class="ep2">Nombre: <?php echo $nombre;?></div>
        <div class="ep3">Apellido: <?php echo $apellido;?></div>
        <div class="ep4">Edad: <?php echo $edad;?></div>
        <div class="ep5">Fecha: <?php echo $fecha;?></div>
        <div class="ep6">Correo: <?php echo $correo;?></div>
    </div>
    <article>
        <h3>Mis cursos</h3>
        <section class="Diseño">
            <h4>Diseño</h4>
            <p>No tienes ningun curso actualmente</p>
        </section>
        <section class="Programacion">
            <h4>Programacion</h4>
            <p>No tienes ningun curso actualmente</p>
        </section>
        <section class="Finanzas">
            <h4>Finanzas</h4>
            <p>No tienes ningun curso actualmente</p>
        </section>
    </article>
    <script src="/JS/Diseño.js"></script>
    <script src="/JS/SesionDiseño.js"></script>
    <script>
        var regresar= document.getElementById('devuelta2');
        regresar.addEventListener('click',()=>{
        window.location.href='/PHP/Cerrar.php';
        });
    </script>
</body>
</html>
        <?php
    }
?>
