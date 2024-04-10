<?php 
include ('../../basedatos.php');

if ($_POST){
    $plato =(isset($_POST['plato'])) ? $_POST['plato'] : '';

    //Imagen llega por Post:
    $imagen =(isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : '';
    $fechafoto= new DateTime();
    $imagen_fecha= $fechafoto->getTimestamp() . '_' .$imagen;
    $imagen_temporal=$_FILES['imagen']['tmp_name'];
    $ruta= "../../../images/menu/" . $imagen_fecha;
    
    //Mover la imagen a la carpeta correspondiente
    if ($imagen_temporal!=null) {
    move_uploaded_file($imagen_temporal, $ruta);
    //echo "Se ha subido correctamente";
    }else{
        echo "Error al subir el archivo";
    }
         
    
    $description =(isset($_POST['description'])) ? $_POST['description'] : '';
    $precio =(isset($_POST['precio'])) ? $_POST['precio'] : '';

    $sql="INSERT INTO `menu` (`plato`, `imagen`, `description`, `precio`) VALUES ('".$plato."', '".$imagen_fecha."', '".$description."', '".$precio."');";

    $result = $conn->query($sql);

    header('Location: menu.php');
    // echo "<p>Se han insertado los datos: <strong>".$titulo." ".$description." ".$enlace.".</strong>";
}

include ('../../templates/header.php');
?>

<br>
<div class="card">
    <div class="card-header">Menu - Nuestras Recomendaciones - </div>
    <div class="card-body">

    <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="plato" class="form-label">Plato</label>
                <input type="text" class="form-control" name="plato" id="plato" aria-describedby="helpId" placeholder="Escribir el plato aqui"/>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Insertar la imagen aqui" accept="image/*"/>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="Escribir la description aqui"/>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="Escribir facebook aqui"/>
            </div>
            <button type=submit class="btn btn-success">Crear</button>
            <a name="" id="" class="btn btn-secondary" href="menu.php" role="button">VOLVER</a>
        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include ('../../templates/footer.php'); ?>