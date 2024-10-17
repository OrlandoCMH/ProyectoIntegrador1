<?php
session_start();


include_once("../Servicio/conexion.php");

if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['cam2'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    El campo de categoría es obligatorio.
                </div>';
    } else {
        $cam2 = mysqli_real_escape_string($conexion, $_POST['cam2']);

        // Comprobar si la categoría ya existe
        $query = mysqli_query($conexion, "SELECT * FROM categorias WHERE categoria = '$cam2'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<div class="alert alert-danger" role="alert">
                        La categoría ya existe!!!
                    </div>';
        } else {
            // Insertar nueva categoría
            $consulta = mysqli_query($conexion, "INSERT INTO categorias (categoria) VALUES('$cam2')");
            if ($consulta) {
                $alert = '<div class="alert alert-success" role="alert">
                       Categoría registrada!!!
                    </div>';
            } else {
                $alert = '<div class="alert alert-danger" role="alert">
                        Error al guardar la información: ' . mysqli_error($conexion) . '
                    </div>';
            }
        }
    }
}
?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>
</head>

<body>

    <header>
        <?php include_once("Include/encabezado.php"); ?>
    </header>

    <div class="container">
        <h2>Categorias</h2>

        <div class="container" style="text-align: center;">
            <h2>ADMINISTACIÓN DE CATEGORIAS</h2>
            <br>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Categoria
            </button>
            <!-- Termina Button trigger modal -->

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Categoria</th>
                        <th scope="col" style="align-content: center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once("../Servicio/conexion.php");
                    $con = mysqli_query($conexion, "SELECT * FROM categorias");
                    $res = mysqli_num_rows($con);
                    while ($datos = mysqli_fetch_assoc($con)) {
                    ?>
                        <tr>
                            <td><?php echo $datos['id_cat']; ?></td>
                            <td><?php echo $datos['categoria']; ?></td>
                            <td>
                                <a href="editar_cat.php?id=<?php echo $datos['id_cat']; ?>"><button type="button" class="btn btn-secondary"><i class="fi fi-rr-edit-alt"></i></button></a>
                            </td>
                            <td>
                                <a href="../Servicio/borrar_cat.php?id=<?php echo $datos['id_cat']; ?>"><button type="button" class="btn btn-danger"><i class="fi fi-rr-trash"></i></button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <br>

        </div>
        <!-- inicia Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registro de Categorias</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- INICIA FORM-->
                        <form style="padding: 25px;" method="POST">
                            <div>
                                <?php echo isset($alert) ? $alert : ""  ?>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Categoria Nueva</label>
                                <input type="text" class="form-control" id="cam2" name="cam2" placeholder="">
                            </div>


                            </select>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Información</button>
                            </div>
                        </form>
                        <!-- FINALIZA FORM-->
                    </div>
                </div>
            </div>
        </div>
        <!-- TERMINA MODAL -->











    </div>

    <footer style=" bottom: 0; width: 100%; height: 40px;">
        <?php include_once("Include/pie.php"); ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>