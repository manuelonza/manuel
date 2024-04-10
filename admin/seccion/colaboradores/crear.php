<?php 
include ('../../basedatos.php');

if ($_POST){
    $nombre =(isset($_POST['nombre'])) ? $_POST['nombre'] : '';

    //Imagen llega por Post:
    $imagen =(isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : '';
    $fechafoto= new DateTime();
    $imagen_fecha= $fechafoto->getTimestamp() . '_' .$imagen;
    $imagen_temporal=$_FILES['imagen']['tmp_name'];
    $ruta= "../../../images/colaboradores/" . $imagen_fecha;
    
    //Mover la imagen a la carpeta correspondiente
    if ($imagen_temporal!=null) {
    move_uploaded_file($imagen_temporal, $ruta);
    //echo "Se ha subido correctamente";
    }else{
        echo "Error al subir el archivo";
    }
         
    
    $info =(isset($_POST['info'])) ? $_POST['info'] : '';
    $link_fb =(isset($_POST['link_fb'])) ? $_POST['link_fb'] : '';
    $link_insta =(isset($_POST['link_insta'])) ? $_POST['link_insta'] : '';
    $link_linkedin =(isset($_POST['link_linkedin'])) ? $_POST['link_linkedin'] : '';

    $sql="INSERT INTO `colaboradores` (`nombre`, `imagen`, `info`, `link_fb`, `link_insta`, `link_linkedin`) VALUES ('".$nombre."', '".$imagen_fecha."', '".$info."', '".$link_fb."', '".$link_insta."', '".$link_linkedin."');";

    $result = $conn->query($sql);

    header('Location: colaboradores.php');
}

include ('../../templates/header.php');
?>

<br>
<div class="card">
    <div class="card-header">Colaboradores</div>
    <div class="card-body">

    <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Escribir el nombre aqui"/>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Insertar la imagen aqui" accept="image/*"/>
            </div>
            <div class="mb-3">
                <label for="info" class="form-label">Informaciones</label>
                <input type="text" class="form-control" name="info" id="info" aria-describedby="helpId" placeholder="Escribir la informcion aqui"/>
            </div>
            <div class="mb-3">
                <label for="link_fb" class="form-label">Facebook</label>
                <input type="text" class="form-control" name="link_fb" id="link_fb" aria-describedby="helpId" placeholder="Escribir facebook aqui"/>
            </div>
            <div class="mb-3">
                <label for="link_insta" class="form-label">Instagram</label>
                <input type="text" class="form-control" name="link_insta" id="link_insta" aria-describedby="helpId" placeholder="Escribir instagram aqui"/>
            </div>
            <div class="mb-3">
                <label for="link_linkedin" class="form-label">Linkedin</label>
                <input type="text" class="form-control" name="link_linkedin" id="link_linkedin" aria-describedby="helpId" placeholder="Escribir linkedin aqui"/>
            </div>
            <button type=submit class="btn btn-success">Crear</button>
            <a name="" id="" class="btn btn-secondary" href="colaboradores.php" role="button">VOLVER</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include ('../../templates/footer.php'); ?>