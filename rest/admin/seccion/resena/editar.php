<?php
include('../../basedatos.php');

if ($_POST) {
    $idToUpdate = isset($_POST['id']) ? $_POST['id'] : '';
    $nombreToUpdate = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $opinionToUpdate = isset($_POST['opinion']) ? $_POST['opinion'] : '';

    $sql = "SELECT * FROM `resena` WHERE `id` = '" . $idToUpdate . "';";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $resena = $result->fetch_assoc();

        // Actualiza las variables con los valores del formulario
        $id = $resena['id'];
        $nombre = $resena['nombre'];
        $opinion = $resena['opinion'];

        // Consulta de actualización sin la coma antes del WHERE
        $updatesql = "UPDATE `resena` SET
            `id` = '" . $idToUpdate . "',
            `nombre` = '" . $nombreToUpdate . "',
            `opinion` = '" . $opinionToUpdate . "'
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
    <div class="card-header">Reseña</div>
    <div class="card-body">

        <form action="" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" value="<?php echo $id ?>" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" value="<?php echo $nombre ?>" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="opinion" class="form-label">Opinion</label>
                <input type="text" class="form-control" name="opinion" id="opinion" aria-describedby="helpId" value="<?php echo $opinion ?>" placeholder=""/>
            </div>
            <button type=submit class="btn btn-success">Modificar</button>
            <a name="" id="" class="btn btn-secondary" href="resena.php" role="button">VOLVER</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include ('../../templates/footer.php'); ?>