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

    <div class="container">
        <h2 style="text-align: center;">Reportes de Usuario</h2>

        <br>
        <br>

        <div class="row" id="iconos">

            <div class="col">
                <a href="R_Usu_pdf.php">
                    <img src="imagenes/PDF.png" alt="" width="180" height="120">
                </a>
            </div>

            <div class="col">
                <a href="R_Usu_excel.php">
                    <img src="imagenes/Excel.png" alt="" width="180" height="120">
                </a>

            </div>

            <div class="col">
                <a href="R_Usu_grafica.php">
                    <img src="imagenes/Graf.png" alt="" width="180" height="120">
                </a>
            </div>

        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container">
        <h2 style="text-align: center;">Reportes de Productos</h2>

        <br>
        <br>

        <div class="row" id="iconos">

            <div class="col">
                <a href="R_Prod_pdf.php">
                    <img src="imagenes/PDF.png" alt="" width="180" height="120">
                </a>
            </div>

            <div class="col">
                <a href="R_Prod_excel.php">
                    <img src="imagenes/Excel.png" alt="" width="180" height="120">
                </a>

            </div>

            <div class="col">
                <a href="R_Prod_grafica.php">
                    <img src="imagenes/Graf.png" alt="" width="180" height="120">
                </a>
            </div>

        </div>
    </div>
    <br>
    <br>
    <br>



    <footer style=" bottom: 0; width: 100%; height: 40px;">
        <?php include_once("include/pie.php"); ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>