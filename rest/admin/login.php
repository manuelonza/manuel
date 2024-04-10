<?php
session_start();

if ($_POST) {
    include('basedatos.php');
    $nombre = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';
    $password = md5($password);

    $sql = "SELECT * FROM usuarios WHERE nombre='$nombre' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $dato = $result->fetch_assoc();
        $_SESSION["usuarioX"] = $dato['nombre'];
        header('Location: admin.php');
        exit();
    } else {
        $mensaje="USUARIO y/o PASSWORD INCORRETOS";
    }
}
?>

<!doctype html>
<html lang="es">
<head>
    <title>LOGIN</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
</head>

<body>
    <main>
        <div class="container">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col"></div>

                <div class="col">
                    <br>
                    <?php  if(isset($mensaje)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>ERROR</strong> <?php echo $mensaje; ?>
                    </div>
                    <?php
                     } 
                    ?>
                    

                    <div class="card text-center">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <form action="login.php" method="post">
                                <div class="mb-3">
                                    <label for="" class="form-label">Usuario:</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder=""/>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Contraseña:</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder=""/>
                                </div>
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col"></div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
