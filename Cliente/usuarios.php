<?php
$alert = "";
session_start();
include_once("../Servicio/conexion.php");

if (!empty($_POST)) {

    if (empty($_POST['cam1']) || empty($_POST['cam2']) || empty($_POST['cam3']) || empty($_POST['cam4']) || empty($_POST['cam5']) || empty($_POST['cam6']) || empty($_POST['cam7'])) {
        $alert = '<div class="alert alert-primary" role="alert">TODOS LOS DATOS SON OBLIGATORIOS</div>';
    } else {
        // Solo se asigna si todos los campos están llenos
        $c1 = $_POST['cam1'];
        $c2 = $_POST['cam2'];
        $c3 = $_POST['cam3'];
        $c4 = $_POST['cam4'];
        $c5 = $_POST['cam5'];
        $c6 = $_POST['cam6'];
        $c7 = $_POST['cam7'];
        $c8 = md5($_POST['cam5']);
        $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo_Usu = '$c4'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {

            $alert = '<div class = "alert alert-danger" role = "alert">El correo y/o usuario ya existe!!!</div>';
        } else {

            $consulta = mysqli_query($conexion, "INSERT INTO usuarios(nom_Usu,ap_Usu,am_Usu,correo_Usu,pass_Usu,tel_Usu,id_tipo) 
                VALUES('$c1','$c2','$c3','$c4','$c5',$c6,$c7)");

            if ($consulta) {
                $alert = '<div class = "alert alert-danger" role = "alert">DATOS REGISTRADOS!!!</div>';
            } else {
                $alert = '<div class = "alert alert-danger" role = "alert">ERROR AL REGISTRAR!!!</div>';
            }
        }

        // Aquí puedes agregar la lógica que necesites con los valores asignados

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

    <div class="container" style="text-align: center;">
        <h2>ADMINISTACIÓN DE USUARIOS</h2>
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Agregar Usuario
        </button>
        <!-- Termina Button trigger modal -->

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>

                    <?php if ($_SESSION['id_tipo'] == 1) { // Administrador 
                    ?>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Tipo de Usuario</th>
                        <th scope="col">Acciones</th>
                    <?php } ?>

                </tr>
            </thead>
            <tbody>
                <?php
                include_once("../Servicio/conexion.php");
                $con = mysqli_query($conexion, "SELECT u.id_Usuario, u.nom_Usu, u.ap_Usu, u.am_Usu, u.correo_Usu, u.tel_Usu, t.TipoUsu 
                    FROM usuarios u INNER JOIN tipousuarios t ON u.id_tipo = t.id_Tipo");
                $res = mysqli_num_rows($con);
                while ($datos = mysqli_fetch_assoc($con)) {
                ?>
                    <tr>
                        <td><?php echo $datos['nom_Usu']; ?></td>
                        <td><?php echo $datos['ap_Usu']; ?></td>
                        <td><?php echo $datos['am_Usu']; ?></td>

                        <?php if ($_SESSION['id_tipo'] == 1) { // Administrador 
                        ?>
                            <td><?php echo $datos['correo_Usu']; ?></td>
                            <td><?php echo $datos['tel_Usu']; ?></td>
                            <td><?php echo $datos['TipoUsu']; ?></td>
                            <td>
                                <a href="editar_usuario.php?id=<?php echo $datos['id_Usuario'];?>"><button type="button" class="btn btn-secondary"><i class="fi fi-rr-edit-alt"></i></button></a>
                            </td>
                            <td>
                                <a href="../Servicio/borrar_usuario.php?id=<?php echo $datos['id_Usuario'];?>"><button type="button" class="btn btn-danger"><i class="fi fi-rr-trash"></i></button></a>
                            </td>
                        <?php } ?>


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
                    <h5 class="modal-title" id="exampleModalLabel">Registro de Usuarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- INICIA FORM-->
                    <form style="padding: 25px;" method="POST">
                        <div>
                            <?php echo isset($alert) ? $alert : ""  ?>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nombre(s)</label>
                            <input type="text" class="form-control" id="cam1" name="cam1" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Apellido Paterno</label>
                            <input type="text" class="form-control" id="cam2" name="cam2" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Apellido Materno</label>
                            <input type="text" class="form-control" id="cam3" name="cam3" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Correo</label>
                            <input type="text" class="form-control" id="cam4" name="cam4" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Contraseña</label>
                            <input type="text" class="form-control" id="cam5" name="cam5" placeholder="Example input">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Telefono</label>
                            <input type="text" class="form-control" id="cam6" name="cam6" placeholder="Example input">
                        </div>
                        <select class="form-select" aria-label="Default select example" id="cam7" name="cam7">
                            <option selected>Tipo de Usuario:</option>
                            <?php
                            include_once("../Servicio/conexion.php");
                            $cone = mysqli_query($conexion, "SELECT *FROM tipousuarios");
                            $resu = mysqli_num_rows($cone);
                            while ($dat = mysqli_fetch_assoc($cone)) {
                            ?>
                                <option value=<?php echo $dat['id_Tipo']; ?>><?php echo $dat['TipoUsu']; ?></option>
                            <?php
                            }
                            ?>

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

    <footer style=" bottom: 0; width: 100%; height: 40px;">
        <?php include_once("Include/pie.php"); ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>