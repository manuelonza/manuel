<?php
include('../../basedatos.php');

if ($_POST) {
    $idToUpdate = isset($_POST['id']) ? $_POST['id'] : '';
    $tituloToUpdate = isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $descriptionToUpdate = isset($_POST['description']) ? $_POST['description'] : '';
    $enlaceToUpdate = isset($_POST['enlace']) ? $_POST['enlace'] : '';

    $sql = "SELECT * FROM `banners` WHERE `id` = '" . $idToUpdate . "';";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $banner = $result->fetch_assoc();

        // Actualiza las variables con los valores del formulario
        $id = $banner['id'];
        $titulo = $banner['titulo'];
        $description = $banner['description'];
        $enlace = $banner['enlace'];

        // Consulta de actualización sin la coma antes del WHERE
        $updatesql = "UPDATE `banners` SET
            `id` = '" . $idToUpdate . "',
            `titulo` = '" . $tituloToUpdate . "',
            `description` = '" . $descriptionToUpdate . "',
            `enlace` = '" . $enlaceToUpdate . "'
            WHERE `id` = '" . $idToUpdate . "';";

        if ($conn->query($updatesql) === TRUE) {
            echo "<p style='text-align:center; background-color:blue; color:white; font-size:30px;'>Estás MODIFICANDO el REGISTRO</p>";
        } else {
            echo "Error al modificar el registro: " . $conn->error;
        }
    }
    // Cierra la conexión a la base de datos
    $conn->close();
}
include('../../templates/header.php');
?>

<br>
<div class="card">
    <div class="card-header">Banners</div>
    <div class="card-body">

        <form action="" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" value="<?php echo $id ?>" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" value="<?php echo $titulo ?>" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descriprion</label>
                <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" value="<?php echo $description ?>" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="enlace" class="form-label">Enlace</label>
                <input type="text" class="form-control" name="enlace" id="enlace" aria-describedby="helpId" value="<?php echo $enlace ?>" placeholder=""/>
            </div>
            <button type=submit class="btn btn-success">Modificar</button>
            <a name="" id="" class="btn btn-secondary" href="banners.php" role="button">VOLVER</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include ('../../templates/footer.php'); ?>