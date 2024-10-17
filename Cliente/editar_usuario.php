<?php

session_start();

include "../Cliente/Include/encabezado.php";
include "../Servicio/conexion.php";

if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['correo']) || empty($_POST['contra']) || empty($_POST['telefono']) || empty($_POST['rol'])) {
        $alert = '<p class"error">Todo los campos son requeridos</p>';
    } else { //DATOS QUE SE ALMACENAN EN EL FORMULARIO (NOMBRE DE LOS CAMPOS)
        $idusuario = $_GET['id'];
        $correo = $_POST['correo'];
        $contra = $_POST['contra'];
        $telefono = $_POST['telefono'];
        $rol = $_POST['rol'];

        $sql_update = mysqli_query($conexion, "UPDATE usuarios SET correo_Usu= '$correo', pass_Usu = '$contra' , tel_Usu = '$telefono', id_tipo= $rol WHERE id_Usuario = $idusuario");
        $alert = '<p>Usuario Actualizado</p>';
        header("Location: usuarios.php");
        exit();
    }
}

// Mostrar Datos

if (empty($_REQUEST['id'])) {
    header("Location:usuarios.php");
    exit();
}
$idusuario = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id_Usuario= $idusuario");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
    header("Location: usuarios.php");
    exit();
} else {
    if ($data = mysqli_fetch_array($sql)) {
        $idcliente = $data['id_Usuario'];
        $nombre = $data['nom_Usu'];
        $ApaUsu = $data['ap_Usu'];
        $AmaUsu = $data['am_Usu'];
        $correo = $data['correo_Usu'];
        $contra = $data['pass_Usu'];
        $telefono = $data['tel_Usu'];
        $rol = $data['id_tipo'];
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 m-auto">
            <form class="" action="" method="post">
                <?php echo isset($alert) ? $alert : ''; ?>
                <input type="hidden" name="id" value="<?php echo $idusuario; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" placeholder="Ingrese nombre" class="form-control" name="nombre" id="nombre"
                        value="<?php echo $nombre; ?>" readonly>
                </div>
                <div class="form-group">
                <label for="ApasUsu">Apellido Paterno: </label>
                <input type="text" class="form-control" id="ApaUsu" name="ApaUsu" placeholder="Ingrese el Apellido Paterno"
                        value="<?php echo $ApaUsu; ?>" readonly>
              </div>
              <div class="form-group">
                <label for="AmasUsu">Apellido Materno: </label>
                <input type="text" class="form-control" id="AmaUsu" name="AmaUsu" placeholder="Ingrese el Apellido Materno"
                        value="<?php echo $AmaUsu; ?>" readonly>
              </div>
                <div class="form-group">
                    <label for="correo">Correo: </label>
                    <input type="text" placeholder="Ingrese el Correo" class="form-control" name="correo" id="correo"
                        value="<?php echo $correo; ?>">

                </div>
                <div class="form-group">
                    <label for="contra">Contraseña: </label>
                    <input type="text" placeholder="Ingrese la Contraseña" class="form-control" name="contra" id="contra"
                        value="<?php echo $contra; ?>">

                </div>
                <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa el Numero Telefonico"
                        value="<?php echo $telefono; ?>">
              </div>
                <div class="form-group">
                    <label for="rol">Rol</label>
                    <select name="rol" id="rol" class="form-control">
                        <option value="1" <?php
                                            if ($rol == 1) {
                                                echo "selected";
                                            }
                                            ?>>Administrador</option>
                        <option value="2" <?php
                                            if ($rol == 2) {
                                                echo "selected";
                                            }
                                            ?>>Gerente</option>
                        <option value="3" <?php
                                            if ($rol == 3) {
                                                echo "selected";
                                            }
                                            ?>>Empleado</option>
                        <option value="4" <?php
                                            if ($rol == 4) {
                                                echo "selected";
                                            }
                                            ?>>Cliente</option>
                    </select>
                </div>
                <a href="usuarios.php"><button type="button" class="btn btn-primary"><i class="fas fa-user-edit"></i>
                        Cancelar</button></a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar
                    Usuario</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->
<footer style="position: absolute; bottom: 0; width: 100%; height: 40px;">
    <?php include_once("../Cliente/Include/pie.php"); ?>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>