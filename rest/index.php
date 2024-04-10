<?php 
include ('admin/basedatos.php');

//CONSULTA BANNERS
$sql1 ="SELECT * FROM `banners` ORDER BY `id` DESC LIMIT 1";
$result1 = $conn->query($sql1);

//CONSULTA COLABORADORES
$sql2 ="SELECT * FROM `colaboradores` ORDER BY `id` ASC LIMIT 3";
$result2 = $conn->query($sql2);

//CONSULTA RESEÑA
$sql3 ="SELECT * FROM `resena` ORDER BY `id` ASC LIMIT 10";
$result3 = $conn->query($sql3);

//CONSULTA MENU
$sql4 ="SELECT * FROM `menu` ORDER BY `id` ASC LIMIT 4";
$result4 = $conn->query($sql4);


if($_POST){
    //DATOS DEL FORMULARIO
    $nombre=filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $email=filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $mensaje=filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);
    if(($nombre) && ($email) && ($mensaje)){
        $sql5="INSERT INTO `comentarios` (`nombre`, `email`, `mensaje`) VALUES ('".$nombre."', '".$email."', '".$mensaje."');";
        $result = $conn->query($sql5);
    }        
}
?>

<!doctype html>
<html lang="es">

<head>
    <title>RESTAURANTE VIVA ITALIA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Incluye Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Asegúrate de incluir Leaflet JS antes de tu script personalizado -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>

<body>
    <header>
        <nav id="inicio" class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#"><i class="fa-solid fa-utensils"></i>Restaurante W l'ITALIA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#inicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#menu">Menu del dia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#nosotros">Nosotros grupo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#resena">Reseña</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contactos">Contactos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#horarios">Horarios</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <main>
        <section class="container-expand fluid p.0">
            <br>
            <div class="banner-img"
                style="position:relative; background:url(images/slide.jpg) center/cover no-repeat; height:400px;">
                <div class="banner-txt"
                    style="position:absolute; top:50%; left:37%; text-align: center; transform: (-50%, -50%);">
                    <?php 
                    if ($result1->num_rows > 0) {
                        // Se encontraron términos
                        while ($dato1 = $result1->fetch_assoc()) { ?>
                            <h1><?php echo $dato1['titulo'] ?></h1>
                            <p><?php echo $dato1['description'] ?></p>
                            <a href="<?php echo $dato1['enlace'] ?>" class="btn btn-primary">Ver MENU</a>
                    <?php
                        }//Fin del WHILE
                    }
                    else {
                        // No se encontraron términos
                        echo "<p>No hay términos disponibles</p>";
                    } ?>
                </div>
            </div>
        </section>

        <section id="id" class="container-expand mt-4 text-center">
            <div class="jumbotron bg-dark text-white">
                <br>
                <h2>Benvenido al restaurante W L'ITALIA</h2>
                <p>Descubre los verdaderos sabores de ITALIA</p>
                <br>
            </div>
        </section>

        <section id="nosotros" class="container mt-4 text-center">
            <h2>Nuestros chefs</h2>
            <div class="row">
            <?php 
                if ($result2->num_rows > 0) {
                    // Se encontraron términos
                    while ($dato2 = $result2->fetch_assoc()) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <?php
                        $ruta = "images/colaboradores/" .$dato2['imagen'];
                        echo '<img src="' . $ruta . '" alt="' . $dato2['imagen'] . '" class="card-img-top"/>';
                        ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dato2['nombre'] ?></h5>
                            <p class="card-text"><?php echo $dato2['info'] ?></p>
                            <div class="social-icons mt-3">
                                <a href="<?php echo $dato2['link_fb'] ?>" class="text-dark me-3"><i class="fab fa-facebook"></i></a>
                                <a href="<?php echo $dato2['link_insta'] ?>" class="text-dark me-3"><i class="fab fa-instagram"></i></a>
                                <a href="<?php echo $dato2['link_linkedin'] ?>" class="text-dark me-3"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }//Fin del WHILE
                }
                else {
                    // No se encontraron términos
                    echo "<p>No hay términos disponibles</p>";
                } ?>            
            </div>
            </div>
        </section>

        <br>

        <section id="resena" class="container bg-light py-5">
            <div class="container">
                <h2 class="text-center m-4">Reseñas</h2>
                <div class="row">
                <?php 
                if ($result3->num_rows > 0) {
                    // Se encontraron términos
                    while ($dato3 = $result3->fetch_assoc()) { ?>
                        <div class="col-md-6 d-flex">
                        <div class="card mb-4 w-75 mx-auto text-center" style="border-radius: 10px;">
                            <div class="card-body" style="background-color: white;">
                                <p class="card-text"><?php echo $dato3['opinion'] ?></p>
                            </div>
                            <div class="card-footer bg-secondary text-white">
                                <p><?php echo $dato3['nombre'] ?></p>
                            </div>
                        </div>
                        </div>
                <?php
                    } // Fin del WHILE
                    } else {
                    // No se encontraron términos
                    echo "<p>No hay términos disponibles</p>";
                } ?>
            </div>
        </div>
        </section>

        <section id="menu" class="container mt-4">
            <h2 class="text-center">MENU -Nuestras recomendaciones-</h2>
            <br>
            <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php 
                if ($result4->num_rows > 0) {
                    // Se encontraron términos
                    while ($dato4 = $result4->fetch_assoc()) { ?>

                <div class="col d-flex">
                    <div class="card">
                        <?php
                        $ruta = "images/menu/" .$dato4['imagen'];
                        echo '<img src="' . $ruta . '" alt="' . $dato4['imagen'] . '" class="card-img-top"/>';
                        ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dato4['plato'] ?></h5>
                            <p clas="card-text small"><strong>Description: </strong><?php echo $dato4['description'] ?></p>
                            <p clas="card-text"><strong>PRECIO: </strong><?php echo $dato4['precio'] ?> €</p>
                        </div>
                    </div>
                </div>
                <?php
                    } // Fin del WHILE
                    } else {
                    // No se encontraron términos
                    echo "<p>No hay términos disponibles</p>";
                } ?>
            </div>
        </section>

        <section id="contactos" class="container mt-4 bg-light py-5 rounded">
            <h2 class="text-center">Contactos</h2>
            <p>Estamos por atenderos</p>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email">Email:</label><br>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="mensaje">Mensaje:</label><br>
                    <textarea name="mensaje" class="form-control" id="mensaje" rows="6" cols="50"></textarea>
                </div>
                <input type="submit" class="btn btn-primary"></input>
            </form>
        </section>

        <div id="horarios" class="text-center p-4">
            <h3 class="mb-4">Horarios</h3>
            <div>
                <p><strong>Martes a Viernes</strong></p>
                <p><strong>12:30 - 23:00</strong></p>
            </div>
            <div>
                <p><strong>Sabado</strong></p>
                <p><strong>13:30 - 24:00</strong></p>
            </div>
            <div>
                <p><strong>Domigo</strong></p>
                <p><strong>13:30 - 17:30</strong></p>
            </div>
        </div>

        <!-- MAPA -->
        <div class="text-center container" id="mapa" style="height: 400px;"></div>
        
        <br>
        
        <div class="text-center">
            <h3 class="mb-4">Nuestras Redes Sociales</h3>
            <a href="https://www.facebook.com/restitalia" class="text-dark me-3"><i class="fab fa-facebook-square"></i></a>
            <a href="https://www.insta.com/restitalia" class="text-dark me-3"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com/restitalia" class="text-dark me-3"><i class="fab fa-tiktok"></i></a>
        </div>

        <br>

    </main>
    <footer class="bg-dark text-light text-center py-3">
        <!-- place footer here -->
        <p>&copy; 2024 Restaurante W L'Italia. Todos los derecho reservados</p>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    
    <!--SCRIPT por Google Maps API -->
    <script>
    // Variables de longitud y latitud (cambia estos valores según tus coordenadas)
    var latitud = 43.539464806550534;
    var longitud = -5.653032053575471;

    // Inicializar el mapa
    var mapa = L.map('mapa').setView([latitud, longitud], 13);

    // Añadir una capa de mapa de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(mapa);

    // Añadir un marcador en las coordenadas dadas
    L.marker([latitud, longitud]).addTo(mapa)
        .bindPopup('¡RESTAURANTE!').openPopup();
</script>
</body>

</html>