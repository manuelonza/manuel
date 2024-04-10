<?php
include('../../basedatos.php');

if ($_POST) {
    $idToUpdate = isset($_POST['id']) ? $_POST['id'] : '';
    $nombreToUpdate = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $infoToUpdate = isset($_POST['info']) ? $_POST['info'] : '';
    $link_fbToUpdate = isset($_POST['link_fb']) ? $_POST['link_fb'] : '';
    $link_instaToUpdate = isset($_POST['link_insta']) ? $_POST['link_insta'] : '';
    $link_linkedinToUpdate = isset($_POST['link_linkedin']) ? $_POST['link_linkedin'] : '';

    $sql = "SELECT * FROM `colaboradores` WHERE `id` = '" . $idToUpdate . "';";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $colaboradores = $result->fetch_assoc();

        // Actualiza las variables con los valores del formulario
        $id = $colaboradores['id'];
        $nombre = $colaboradores['nombre'];
        $info = $colaboradores['info'];
        $link_fb = $colaboradores['link_fb'];
        $link_insta = $colaboradores['link_insta'];
        $link_linkedin = $colaboradores['link_linkedin'];
        $imagen = $colaboradores['imagen'];


        $imagen_fecha = $imagen;
        // Verificar si se ha subido una nueva imagen
        if (isset($_FILES["imagen"]["name"]) && !empty($_FILES["imagen"]["name"])) {
            // Eliminar la imagen anterior si existe
            if (!empty($imagen)) {
                $ruta_anterior = "../../../images/colaboradores/" . $imagen;
                if (file_exists($ruta_anterior)) {
                    // Intenta eliminar la imagen anterior
                    unlink($ruta_anterior);                       
                }
            }

            // Obtener la información de la imagen subida
            $imagen_temporal = $_FILES['imagen']['tmp_name'];
            $imagen = $_FILES["imagen"]["name"];
            // Generar un nombre único para la imagen
            $fechafoto = new DateTime();
            $imagen_fecha = $fechafoto->getTimestamp() . '_' . $imagen;
            // Ruta donde se almacenará la imagen
            $ruta = "../../../images/colaboradores/" . $imagen_fecha;
            // Mover la imagen subida a la ubicación deseada
            move_uploaded_file($imagen_temporal, $ruta);
        }

        // Consulta de actualización 
        $updatesql = "UPDATE `colaboradores` SET
            `nombre` = '" . $nombreToUpdate . "',
            `info` = '" . $infoToUpdate . "',
            `link_fb` = '" . $link_fbToUpdate . "',
            `link_insta` = '" . $link_instaToUpdate . "',
            `link_linkedin` = '" . $link_linkedinToUpdate . "',
            `imagen` = '" . $imagen_fecha . "'
            WHERE `id` = '" . $idToUpdate . "';";

        if ($conn->query($updatesql) === TRUE) {
            echo "<p style='text-align:center; background-color:blue; color:white; font-size:30px;'>Estás MODIFICANDO el REGISTRO</p>";
        } else {
            echo "Error al modificar el registro: " . $conn->error;
        }
    } else {
        echo "No se encontraron registros para el ID proporcionado.";
    }
}

// Cierra la conexión a la base de datos
$conn->close();

include('../../templates/header.php');
?>


<br>
<div class="card">
    <div class="card-header">Colaboradores</div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id" class="form-label"></label>
                <input type="hidden" class="form-control" name="id" id="id" aria-describedby="helpId" value="<?php echo $id ?>" placeholder="" />
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" value="<?php echo $nombre ?>" placeholder="" />
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label><br>
                <?php
                $ruta = "../../../images/colaboradores/" . $imagen;
                echo $imagen;
                echo '<img src="' . $ruta . '" width="50"/>';
                ?>
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Insertar la imagen aqui" accept="image/*" />
            </div>
            <div class="mb-3">
                <label for="info" class="form-label">Informacion</label>
                <input type="text" class="form-control" name="info" id="info" aria-describedby="helpId" value="<?php echo $info ?>" placeholder="" />
            </div>
            <div class="mb-3">
                <label for="link_fb" class="form-label">Facebook</label>
                <input type="text" class="form-control" name="link_fb" id="link_fb" aria-describedby="helpId" value="<?php echo $link_fb ?>" placeholder="" />
            </div>
            <div class="mb-3">
                <label for="link_insta" class="form-label">Instagram</label>
                <input type="text" class="form-control" name="link_insta" id="link_insta" aria-describedby="helpId" value="<?php echo $link_insta ?>" placeholder="" />
            </div>
            <div class="mb-3">
                <label for="link_linkedin" class="form-label">Linkedin</label>
                <input type="text" class="form-control" name="link_linkedin" id="link_linkedin" aria-describedby="helpId" value="<?php echo $link_linkedin ?>" placeholder="" />
            </div>
            <button type=submit class="btn btn-success">Modificar</button>
            <a name="" id="" class="btn btn-secondary" href="colaboradores.php" role="button">VOLVER</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include('../../templates/footer.php'); ?>
