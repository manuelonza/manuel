<?php
include ('../../basedatos.php');

if ($_POST) { // Comprueba si hay datos POST
    // Verifica si las claves existen antes de asignarlas para evitar Undefined variable
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $plato =(isset($_POST['plato'])) ? $_POST['plato'] : '';
    $description =(isset($_POST['description'])) ? $_POST['description'] : '';
    $precio =(isset($_POST['precio'])) ? $_POST['precio'] : '';

    //Imagen llega por Post:
    $imagen =(isset($_POST['imagen'])) ? $_POST['imagen'] : '';

    //CONSULTA A LA BASE DE DATOS PARA OBTENER TODAS LAS RELACIONEs  EN CUENTA QUE NO SEAN EL ID PROPIO
    $sql = "SELECT * FROM `menu` WHERE `id` = '" . $id . "';";
    $result = $conn->query($sql);  

    // Verifica si la consulta fue exitosa
    if ($result && $result->num_rows > 0) {
        // Obtén el primer resultado (ya que se espera solo un colaboradores)
        $menu = $result->fetch_assoc();
        
        // Asigna los valores a las variables
        $id = $menu['id'];
        $plato = $menu['plato'];
        $description = $menu['description'];
        $precio = $menu['precio'];
        
        $imagen = $menu['imagen'];
        $ruta = "../../../images/menu/";
        
        if(isset ($imagen)){
            if(file_exists($ruta.'/'.$imagen)){//si existe elimina la imagen anterior de la carpeta
                unlink($ruta.'/'.$imagen);
            }
        }
    
        // Elimina el registro de la base de datos
        $deleteSql = "DELETE FROM `menu` WHERE `id` = '".$id."';";
        if ($conn->query($deleteSql) === TRUE) {
            echo "<p style='text-align:center; background-color:red; color:white; font-size:30px;'>Estás ELIMINANDO el REGISTRO permanentemente</p>";
        } else {
            echo "Error al eliminar el registro: " . $conn->error;
        }
    }   
// Cierra la conexión a la base de datos después de la operación
$conn->close();
}

include ('../../templates/header.php');
?>

<br>
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Plato</th>
                        <th scope="col">Description</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>                
                        <tr class="">
                            <td scope="row"><?php echo $id ?></td>
                            <td class="text fs-6">
                                <?php
                                    $ruta = "../../../images/menu/" .$imagen;
                                    echo $imagen; 
                                    echo '<img src="'.$ruta.'" width="50"/>';
                                    ?>
                            </td>
                            <td><?php echo $plato ?></td>
                            <td><?php echo $description ?></td>
                            <td><?php echo $precio ?><br></td>
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-danger" href="menu.php" role="button">Borrar</a>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include ('../../templates/footer.php'); ?>