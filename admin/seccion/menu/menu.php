<?php 
include ('../../basedatos.php');

include ('../../templates/header.php');
?>

<!-- Agregar código de Bootstrap 5 para modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="borrar.php" method="POST"> <!-- Formulario que envía los datos a borrar.php -->
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmación de Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Agrega campos ocultos para enviar datos al servidor -->
                    <input type="hidden" id="modalIdInput" name="id">
                    <input type="hidden" id="modalPlatoInput" name="plato">
                    <input type="hidden" id="modalDescriptionInput" name="description">
                    <input type="hidden" id="modalPrecioInput" name="precio">
                    <input type="hidden" id="modalImagenInput" name="imagen">
                    <p>¿Está seguro de que desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <!-- Este botón ahora envía el formulario con los datos del banner -->
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin del modal -->

<br>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registro</a>   
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
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    //CONSULTA
                    $sql ="SELECT * FROM `menu`";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // Se encontraron términos
                        while ($dato = $result->fetch_assoc()) { ?>
                            <tr class="">
                                <td scope="row"><?php echo $dato['id'] ?></td>
                                <td class="text fs-6"><?php
                                         $ruta = "../../../images/menu/" .$dato['imagen'];
                                         echo $dato['imagen']; 
                                         echo '<img src="'.$ruta.'" width="50"/>';
                                        ?>
                                </td>
                                <td><?php echo $dato['plato'] ?></td>
                                <td><?php echo $dato['description'] ?></td>
                                <td><?php echo $dato['precio'] ?><td>
                                <form action="editar.php" method="POST" class="d-inline">
                                        <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
                                        <button type="submit" class="btn btn-info">Editar</button>
                                    </form>
                                    <form action="borrar.php" method="POST"class="d-inline">
                                        <input type="hidden" name="id" value="<?php echo $dato['id']; ?>">
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete(<?php echo $dato['id']; ?>)">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                    <?php
                    }//Fin del WHILE
                    }
                    else {
                        // No se encontraron términos
                        echo "<p>No hay términos disponibles</p>";
                    } ?>
                
                </tbody>
            </table>
        </div>
        

    </div>
    <div class="card-footer text-muted"></div>
</div>

<!-- Script para manejar la confirmación de eliminación -->
<script>
    // Función para mostrar el modal de confirmación
    function confirmDelete(id, plato, description, precio, imagen) {
        console.log('Entré en confirmDelete');
        $('#modalId').text(id);
        $('#modalPlato').text(plato);
        $('#modalDescription').text(description);
        $('#modalPrecio').text(precio);
        $('#modalImagen').text(imagen);
        // Establece los valores de los campos ocultos del formulario
        $('#modalIdInput').val(id);
        $('#modalPlato').val(plato);
        $('#modalDescription').val(description);
        $('#modalPrecio').val(precio);
        $('#modalImagen').val(imagen);
        $('#confirmDeleteModal').modal('show');
    }
</script>

<?php include ('../../templates/footer.php'); ?>