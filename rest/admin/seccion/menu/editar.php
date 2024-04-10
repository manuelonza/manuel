<?php
include('../../basedatos.php');

if ($_POST) {
    $idToUpdate = isset($_POST['id']) ? $_POST['id'] : '';
    $platoToUpdate = isset($_POST['plato']) ? $_POST['plato'] : '';
    $descriptionToUpdate = isset($_POST['description']) ? $_POST['description'] : '';
    $precioToUpdate = isset($_POST['precio']) ? $_POST['precio'] : '';

    $imagen=isset($_FILES["imgen"]["name"])?$_FILES["imgen"]["name"]:"";

    $sql = "SELECT * FROM `menu` WHERE `id` = '" . $idToUpdate . "';";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $menu = $result->fetch_assoc();

        // Actualiza las variables con los valores del formulario
        $id = $menu['id'];
        $plato = $menu['plato'];
        $description = $menu['description'];
        $precio = $menu['precio'];

        $imagen=$menu['imagen'];
        

        // Consulta de actualización sin la coma antes del WHERE
        $updatesql = "UPDATE `colaboradores` SET
            `id` = '" . $idToUpdate . "',
            `plato` = '" . $platoToUpdate . "',
            `description` = '" . $descriptionToUpdate . "',
            `precio` = '" . $precioToUpdate . "'
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
    <div class="card-header">Menu -Nuestras Recomendaciones -</div>
    <div class="card-body">

        <form action="" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" value="<?php echo $id ?>" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="plato" class="form-label">Plato</label>
                <input type="text" class="form-control" name="plato" id="plato" aria-describedby="helpId" value="<?php echo $plato ?>" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label><br>
                <?php
                    $ruta = "../../../images/colaboradores/" .$imagen;
                    echo $imagen; 
                    echo '<img src="'.$ruta.'" width="50"/>';
                ?>
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Insertar la imagen aqui" accept="image/*"/>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" value="<?php echo $ingredientes ?>" placeholder=""/>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" id="precio" aria-describedby="helpId" value="<?php echo $precio ?>" placeholder=""/>
            </div>
            <button type=submit class="btn btn-success">Modificar</button>
            <a name="" id="" class="btn btn-secondary" href="menu.php" role="button">VOLVER</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include ('../../templates/footer.php'); ?>