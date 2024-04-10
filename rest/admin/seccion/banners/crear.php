<?php 
include ('../../basedatos.php');

if ($_POST){
    $titulo =(isset($_POST['titulo'])) ? $_POST['titulo'] : '';
    $description =(isset($_POST['description'])) ? $_POST['description'] : '';
    $enlace =(isset($_POST['enlace'])) ? $_POST['enlace'] : '';

    $sql="INSERT INTO `banners` (`titulo`, `description`, `enlace`) VALUES ('".$titulo."', '".$description."', '".$enlace."');";

    $result = $conn->query($sql);

    header('Location: banners.php');
    // echo "<p>Se han insertado los datos: <strong>".$titulo." ".$description." ".$enlace.".</strong>";
}

include ('../../templates/header.php');
?>

<br>
<div class="card">
    <div class="card-header">Banners</div>
    <div class="card-body">

        <form action="" method="post">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Escribir el titulo aqui"/>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descriprion</label>
                <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="Escribir la descriprion aqui"/>
            </div>
            <div class="mb-3">
                <label for="enlace" class="form-label">Enlace</label>
                <input type="text" class="form-control" name="enlace" id="enlace" aria-describedby="helpId" placeholder="Escribir el link aqui"/>
            </div>
            <button type=submit class="btn btn-success">Crear</button>
            <a name="" id="" class="btn btn-secondary" href="banners.php" role="button">VOLVER</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include ('../../templates/footer.php'); ?>