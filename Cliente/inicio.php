<?php
$alert = "";
session_start();
?>

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

    <header>
        <?php include_once("include/encabezado.php"); ?>
    </header>
    <br>
    <br>

    <div class="container" style="text-align: center;">
        <h1>¡BIENVENID@!</h1>
        <br>
        <br>
    </div>
    <br>
    <div class="container" style="font-family: 'Times New Roman', Times, serif; font-weight:800; font-size:0.75cm; text-align: center;">
        <p>
            <?php
            echo $_SESSION['nom_Usu'];
            echo " ";
            echo $_SESSION['ap_Usu'];
            echo " ";
            echo $_SESSION['am_Usu'];
            ?>
        </p>
    </div>
    <br>
    <br>
    <div class="container">
        <h2 style="text-align: center;">-----INICIO-----</h2>
    </div>
    <br>
    <br>
    <div class="container">
        <!--INICIA CARRUSEL-->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imagenes/Plasma.jpg" class="d-block w-100" alt="fondo1" width="200" height="400">
                </div>
                <div class="carousel-item">
                    <img src="imagenes/infra.jpg" class="d-block w-100" alt="fondo2" width="200" height="400">
                </div>
                <div class="carousel-item">
                    <img src="imagenes/Martillo.jpeg" class="d-block w-100" alt="fondo3" width="200" height="400">
                </div>
                <div class="carousel-item">
                    <img src="imagenes/JuegoPinzas.jpg" class="d-block w-100" alt="fondo4" width="200" height="400">
                </div>
                <div class="carousel-item">
                    <img src="imagenes/Cortadora.jpg" class="d-block w-100" alt="fondo5" width="200" height="400">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!--FIN DE CARRUSEL-->

    <footer style=" bottom: 0; width: 100%; height: 40px;">
        <?php include_once("include/pie.php"); ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>