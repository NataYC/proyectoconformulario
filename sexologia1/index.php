<?php 
include_once('../config/config.php');
include('sexologia1.php');

$p = new sexologia1();
$data = $p->getAll();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $remove = $p->delete($_GET['id']);

    if ($remove) {
        header('Location: ' . ROOT . '/sexologia1/index.php');
    } else {
        $mensaje = '<div class="alert alert-danger" role="alert">Error al eliminar</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8"/>
    <title>Lista de preguntas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body> 
<?php include('../menu.php') ?>
    <div class="container">
        <h2 class="text-center mb-2">Preguntas o Sugerencias</h2>
        <div class="row">
            <?php 
            while($pt = mysqli_fetch_object($data)){
                echo "<div class='col'>";
                echo "<div class='border border-info p-2'>";
                echo "<h5>$pt->nombreoapodo $pt->preguntacorrespo</h5>";
                echo "<div class='text-center'>";
                echo "<a class='btn btn-success' href='".ROOT."/sexologia1/edit.php?id=$pt->id'>Modificar</a> - <a class='btn btn-danger' href='".ROOT."/sexologia1/index.php?id=$pt->id'>Eliminar</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>