<?php 
include ('../../basedatos.php');

if ($_POST){
    $nombre =(isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    
    $password =(isset($_POST['password'])) ? $_POST['password'] : '';
    $password =md5($password); //Encriptamos la contraseña con MD5 para que no se vea en texto 

    $correo =(isset($_POST['correo'])) ? $_POST['correo'] : '';

    $sql="INSERT INTO `usuarios` (`nombre`, `password`, `correo`) VALUES ('".$nombre."', '".$password."', '".$correo."');";

    $result = $conn->query($sql);

    header('Location: usuarios.php');
    // echo "<p>Se han insertado los datos: <strong>".$titulo." ".$description." ".$enlace.".</strong>";
}

include ('../../templates/header.php');
?>

<br>
<div class="card">
    <div class="card-header">Usuario</div>
    <div class="card-body">

        <form action="" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Escribir el usuario aqui"/>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Escribir la password aqui"/>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailhelpId" placeholder="Escribir el correo aqui"/>
            </div>
            <button type=submit class="btn btn-success">Crear</button>
            <a name="" id="" class="btn btn-secondary" href="usuarios.php" role="button">VOLVER</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include ('../../templates/footer.php'); ?>