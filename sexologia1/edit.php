<?php
session_start(); // Iniciar la sesión

include('../config/config.php');
include('sexologia1.php');

$p = new sexologia1();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $update = $p->update($_POST);

    if ($update) {
        // Sesión modificada con éxito
        $_SESSION['mensaje'] = "Sesión modificada con éxito";
    } else {
        $_SESSION['mensaje'] = "Error al modificar la sesión";
    }
}

// Obtener los datos para mostrar en el formulario
$ds = mysqli_fetch_object($p->getOne($_GET['id']));

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Modificar Pregunta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php include('../menu.php') ?>
    <div class="container">
        <?php 
        // Mostrar el mensaje si existe
        if (isset($_SESSION['mensaje'])) {
            echo '<div class="alert alert-success" role="alert">' . $_SESSION['mensaje'] . '</div>';
            unset($_SESSION['mensaje']); // Limpiar la variable de sesión después de mostrar el mensaje
        }
        ?>
        <h2 class="text-center mb-2">Modificar Pregunta</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-2"> 
                <div class="col">
                    <input type="text" name="nombreoapodo" id="nombreoapodo" placeholder="Nombres o apodos" class="form-control" value="<?= $ds->nombreoapodo ?>" />
                    <input type="hidden" name="id" value="<?= $ds->id ?>">
                </div>
                <div class="col">
                    <input type="email" name="correoelectronico" id="correoelectronico" placeholder="email" class="form-control" value="<?= $ds->correoelectronico ?>"/>
                </div>
            </div>
            <div class="row mb-2"> 
                <div class="col">
                    <input type="text" name="preguntacorrespo" id="preguntacorrespo" placeholder="Preguntas o Sugerencias" class="form-control" value="<?= $ds->preguntacorrespo ?>"/>
                </div>
            </div>
            <button class="btn btn-success" name="modificar">Modificar</button>
        </form>
    </div>
</body>
</html>