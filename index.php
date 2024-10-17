<?php

$alert = "";
session_start();

if (!empty($_SESSION['activa'])) {
  header('location: Cliente/inicio.php');
} else {
  if (!empty($_POST)) {
    if (empty($_POST['correo']) || empty($_POST['pass'])) {
      $alert = '<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
    Correo y contraseña son obligatorios
  </div>';
    } else {
      require_once('Servicio/conexion.php');
      $usuario = mysqli_real_escape_string($conexion, $_POST['correo']);
      $pass =  mysqli_real_escape_string($conexion, $_POST['pass']);
      $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo_Usu = '$usuario' AND pass_Usu='$pass'");
      mysqli_close($conexion);
      $resultado = mysqli_num_rows($query);
      if ($resultado > 0) {

        $dato = mysqli_fetch_array($query);

        $_SESSION['activa'] = true;
        $_SESSION['nom_Usu'] = $dato['nom_Usu'];
        $_SESSION['ap_Usu'] = $dato['ap_Usu'];
        $_SESSION['am_Usu'] = $dato['am_Usu'];
        $_SESSION['id_tipo'] = $dato['id_tipo'];
        header('location: Cliente/inicio.php');
      } else {
        $alert = '<div class="alert alert-danger d-flex align-items-center" role="alert">
<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
         Usuario y/o contraseña incorrecta!!!
    </div>
</div>';
        session_destroy();
      }
    }
  }
}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>



  <div class="container" style="margin-top:150px; border: 10px;  ">

    <div class="row" style="background-color: purple; text-align: center;">

      <div class="col" style="background-color:midnightblue; padding: 25px; border: 10px;"> <!-- Columna1 / Imagen-->
        <img src="Cliente/imagenes/LOGO.png" height="350px" width="350px">
      </div>

      <div class="col" style="background-color: black; padding: 25px;"> <!-- Columna2 -->
        <div class="row">
          <h1 style="color: grey;  text-align: center; color:white;">AUTENTIFICACIÓN</h1>
          <h1>HOLA MUNDO</h1>
          <h2>HOLA Mundo</h2>
        </div>

        <form style="padding: 25px;" method="POST">
          <div>
            <?php echo isset($alert) ? $alert : ""  ?>
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="color: wheat;">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo" aria-describedby="emailHelp" name="correo">
            <div id="emailHelp" class="form-text">No olvides tu correo Electrónico.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" style="color: wheat;">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" style="text-align: left; color:aquamarine;">
            <label class="form-check-label" for="exampleCheck1">Guardar Sesión</label>
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>