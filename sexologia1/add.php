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
        <link rel="stylesheet" href="../Estilos/style.css">
    <link rel="stylesheet" href="../Estilos/mq.css">
    </head>
    <body> 
    <nav class="navbar navbar-expand-lg bg-body-tertiary barra">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> <img src="../IMG/logo.png" alt=""width="150px" height="auto">
        </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 letra">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../index.html#sexologia">¿Que es la Sexología?</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#importancia">La importancia de la sexología</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sirve">¿Para que sirve la sexología?</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> Mitos y Tabues sobre el sexo </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Tipos de Sexologos
                </a>
                <ul class="dropdown-menu barra letra">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <!-- <li><hr class="dropdown-divider"></li> -->
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../add.php"> Preguntas y Sugerencias </a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
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
                    <input type="email" name="correoelectronico" id="correoelectronico" placeholder="email"class= "form-control"/>
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