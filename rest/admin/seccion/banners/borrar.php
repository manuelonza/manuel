<?php
include ('../../basedatos.php');

if ($_POST) { // Comprueba si hay datos POST
    // Verifica si las claves existen antes de asignarlas para evitar Undefined variable
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $enlace = isset($_POST['enlace']) ? $_POST['enlace'] : '';
 
    //CONSULTA A LA BASE DE DATOS PARA OBTENER TODAS LAS RELACIONEs  EN CUENTA QUE NO SEAN EL ID PROPIO
    $sql = "SELECT * FROM `banners` WHERE `id` = '" . $id . "';";
    $result = $conn->query($sql);  

    // Verifica si la consulta fue exitosa
    if ($result && $result->num_rows > 0) {
        // Obtén el primer resultado (ya que se espera solo un banner)
        $banner = $result->fetch_assoc();
        
        // Asigna los valores a las variables
        $id = $banner['id'];
        $titulo = $banner['titulo'];
        $description = $banner['description'];
        $enlace = $banner['enlace'];
    
        // Elimina el registro de la base de datos
        $deleteSql = "DELETE FROM `banners` WHERE `id` = '".$id."';";
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
                        <th scope="col">Titulo</th>
                        <th scope="col">Description</th>
                        <th scope="col">Enlace</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>                
                        <tr class="">
                            <td scope="row"><?php echo $id ?></td>
                            <td><?php echo $titulo ?></td>
                            <td><?php echo $description ?></td>
                            <td><?php echo $enlace?></td>
                            <td>
                                <a name="" id="" class="btn btn-danger" href="banners.php" role="button">Borrar</a>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include ('../../templates/footer.php'); ?>