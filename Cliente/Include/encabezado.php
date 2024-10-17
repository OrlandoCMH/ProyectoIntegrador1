<?php

if (!isset($_SESSION['tiempo'])) {
    $_SESSION['tiempo'] = time();
} else if (time() - $_SESSION['tiempo'] > 300000) {
    session_destroy();
    /* Aquí redireccionas a la url especifica */
    header("Location:../index.php");
    die();
}
$_SESSION['tiempo'] = time(); // Si hay actividad seteamos el valor al tiempo actual
?>
<!doctype html>
<html lang="en">


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    <div class="container" style="background-color: gainsboro ; padding : 5px ;">
        <div class="row"  style="padding-top: 1px;">
            <div class="col-3" style="padding-top: 10px;">
                <img src="imagenes/LOGO.png" height="200px" width="200px" style="padding: 5px; margin: 1px;">
            </div>
            <div class="col" style="padding-top :90px; padding-left: 150px;  ">
                <div class="btn-group" role="group" aria-label="Basic example" style="width: max-content; color-scheme: black;">

                    <?php
                    if ($_SESSION['id_tipo'] == 1) { ?>
                        <a href="inicio.php"><button type="button" class="btn btn-primary">Inicio</button></a>
                        <a href="usuarios.php"><button type="button" class="btn btn-primary">Usuarios</button></a>
                        <a href="productos.php"><button type="button" class="btn btn-primary">Productos</button></a>
                        <a href="categorias.php"><button type="button" class="btn btn-primary">Categorias</button></a>
                        <a href=""><button type="button" class="btn btn-primary">Promociones</button></a>
                        <a href="reportes.php"><button type="button" class="btn btn-primary">Reportes</button></a>
                        <a href="salir.php"><button type="button" class="btn btn-primary" style=" background-color:black; color: white;">Salir</button></a>

                    <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION['id_tipo'] == 2) { ?>
                        <a href="inicio.php"><button type="button" class="btn btn-primary">Inicio</button></a>
                        <a href="usuarios.php"><button type="button" class="btn btn-primary">Usuarios</button></a>
                        <a href="productos.php"><button type="button" class="btn btn-primary">Productos</button></a>
                        <a href="salir.php"><button type="button" class="btn btn-primary" style=" background-color:b; color: black;">Salir</button></a>

                    <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION['id_tipo'] == 3) { ?>
                        <a href="inicio.php"><button type="button" class="btn btn-primary">Inicio</button></a>
                        <a href="usuarios.php"><button type="button" class="btn btn-primary">Usuarios</button></a>
                        <a href="salir.php"><button type="button" class="btn btn-primary" style=" background-color:b; color: black;">Salir</button></a>

                    <?php
                    }
                    ?>

                    <?php
                    if ($_SESSION['id_tipo'] == 4) { ?>
                        <a href="inicio.php"><button type="button" class="btn btn-primary">Inicio</button></a>
                        <a href="usuarios.php"><button type="button" class="btn btn-primary">Usuarios</button></a>
                        <a href="salir.php"><button type="button" class="btn btn-primary" style=" background-color:b; color: black;">Salir</button></a>

                    <?php
                    }
                    ?>






                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>