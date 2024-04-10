<?php include ('templates/header.php');?>

<br>

<div class="row align-items-md-stretch">
    <div class="col-md-12">
        <div class="h-100 p-5 border rounded-3">
            <h2>Bienvenidos a la pagina de administracion  <?php echo isset($_SESSION["nombre"]) ? $_SESSION["nombre"] : '' ?></h2>
            <p>texto 1 podria ser muy largo porque estoy preovando pero para ahora va ser testo y luego vamos a ver que se pondra</p>
            <button class="btn btn-outline-primary" type="button">Iniciar</button>
        </div>
    </div>    
</div>


<?php include ('templates/footer.php'); ?>