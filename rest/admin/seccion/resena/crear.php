<?php 
include ('../../basedatos.php');

if ($_POST){
    $nombre =(isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $opinion =(isset($_POST['opinion'])) ? $_POST['opinion'] : '';

    $sql="INSERT INTO `resena` (`nombre`, `opinion`) VALUES ('".$nombre."', '".$opinion."');";

    $result = $conn->query($sql);

    header('Location: resena.php');
    // echo "<p>Se han insertado los datos: <strong>".$titulo." ".$description." ".$enlace.".</strong>";
}

include ('../../templates/header.php');
?>

<br>
<div class="card">
    <div class="card-header">Reseña</div>
    <div class="card-body">

        <form action="" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Escribir el titulo aqui"/>
            </div>
            <div class="mb-3">
                <label for="opinion" class="form-label">Opinion</label>
                <input type="text" class="form-control" name="opinion" id="opinion" aria-describedby="helpId" placeholder="Escribir la descriprion aqui"/>
            </div>
            <button type=submit class="btn btn-success">Crear</button>
            <a name="" id="" class="btn btn-secondary" href="resena.php" role="button">VOLVER</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include ('../../templates/footer.php'); ?>