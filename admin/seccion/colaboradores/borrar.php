<?php
include ('../../basedatos.php');

if ($_POST) { // Comprueba si hay datos POST
    // Verifica si las claves existen antes de asignarlas para evitar Undefined variable
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $nombre =(isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $info =(isset($_POST['info'])) ? $_POST['info'] : '';
    $link_fb =(isset($_POST['link_fb'])) ? $_POST['link_fb'] : '';
    $link_insta =(isset($_POST['link_insta'])) ? $_POST['link_insta'] : '';
    $link_linkedin =(isset($_POST['link_linkedin'])) ? $_POST['link_linkedin'] : '';

    //Imagen llega por Post:
    $imagen =(isset($_POST['imagen'])) ? $_POST['imagen'] : '';

    //CONSULTA A LA BASE DE DATOS PARA OBTENER TODAS LAS RELACIONEs  EN CUENTA QUE NO SEAN EL ID PROPIO
    $sql = "SELECT * FROM `colaboradores` WHERE `id` = '" . $id . "';";
    $result = $conn->query($sql);  

    // Verifica si la consulta fue exitosa
    if ($result && $result->num_rows > 0) {
        // Obtén el primer resultado (ya que se espera solo un colaboradores)
        $colaborador = $result->fetch_assoc();
        
        // Asigna los valores a las variables
        $id = $colaborador['id'];
        $nombre = $colaborador['nombre'];
        $info = $colaborador['info'];
        $link_fb = $colaborador['link_fb'];
        $link_insta = $colaborador['link_insta'];
        $link_linkedin = $colaborador['link_linkedin'];

        $imagen = $colaborador['imagen'];
        $ruta = "../../../images/colaboradores/";
        
        if(isset ($imagen)){
            if(file_exists($ruta.'/'.$imagen)){//si existe elimina la imagen anterior de la carpeta
                unlink($ruta.'/'.$imagen);
            }
        }
    
        // Elimina el registro de la base de datos
        $deleteSql = "DELETE FROM `colaboradores` WHERE `id` = '".$id."';";
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
                        <th scope="col">Nombre</th>
                        <th scope="col">Info</th>
                        <th scope="col">Redes Sociales</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>                
                        <tr class="">
                            <td scope="row"><?php echo $id ?></td>
                            <td class="text fs-6">
                                <?php
                                    $ruta = "../../../images/colaboradores/" .$imagen;
                                    echo $imagen; 
                                    echo '<img src="'.$ruta.'" width="50"/>';
                                    ?>
                            </td>
                            <td><?php echo $nombre ?></td>
                            <td><?php echo $info ?></td>
                            <td>
                                <?php echo $link_fb ?><br>
                                    <?php echo $link_insta ?><br>
                                    <?php echo $link_linkedin ?>
                                </td>
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-danger" href="colaboradores.php" role="button">Borrar</a>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include ('../../templates/footer.php'); ?>