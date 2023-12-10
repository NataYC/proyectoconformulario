<?php 
include_once('../config/config.php');
include('sexologia1.php');

if( isset($_POST) && !empty($_POST) ){
    $p = new sexologia1(); 
    $save=$p->save($_POST);
    if ($save){
        $mensaje ='<div class="alert alert-sucess"> Sesión registrada </div>';
    }else{
        $mensaje ='<div class="alert alert-danger"> Error al registrar! </div>';
    }
}

?>

<!DOCTYPE html>
<html> 
    <head> 
        <meta charset="UTF-8"/>
        <title>Registrar Pregunta</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body> 
        <?php include('../menu.php') ?>
        <div class="container">
            <?php 
            if(isset($mensaje)){
                echo $mensaje;
            }
            ?>
            <h2 class="text-center mb-2" > Registrar Pregunta </h2>
            <form method="POST" enctype="multipart/form-data"> 

            <div class="row mb-2" > 
                <div class="col">
                    <input type="text" name="nombreoapodo" id="nombreoapodo" placeholder="Nombres o apodos" class= "form-control" />
                </div>
                <div class="col">
                    <input type="email" name="correoelectronico" id="correoelectronico" placeholder="email"class="form-coltrol"/>
                </div>
            </div>

            <div class="row mb-2" > 
                <div class="col">
                    <input type="text" name="preguntacorrespo" id="preguntacorrespo" placeholder="Preguntas o Sugerencias" class= "form-control" />
                </div>
            </div>

            <button class="btn btn-success"> Registrar </button>

            </form>
        </div>
    </body>
</html>