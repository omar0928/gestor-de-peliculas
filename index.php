<?php 
include 'utility.php';
session_start();

$_SESSION['peliculas'] = isset($_SESSION['peliculas']) ? $_SESSION['peliculas'] : array();

$listapelicula = $_SESSION['peliculas'];

if(!empty($listapelicula)){
    if(isset($_GET['generoId'])){
       $listapelicula = searchProperty($listapelicula,'genero',$_GET['generoId']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    
</head>
<body>
    
<div class="container jumbotron mt-5">
    <h1>agregar Peliculas</h1>
    <a href="add.php" class="btn btn-primary">agregar una pelicula</a>
</div>
<div class="jumbotron mt-5">
<div class="btn-group container" style="margin-left:37.4rem">
    <a href="index.php" class="btn btn-danger">Todos</a>
    <a href="index.php?generoId=1" class="btn btn-danger">Acción</a>
    <a href="index.php?generoId=2" class="btn btn-danger">Terror</a>
    <a href="index.php?generoId=3" class="btn btn-danger">Comedia</a>
    <a href="index.php?generoId=4" class="btn btn-danger">Suspenso</a>
    <a href="index.php?generoId=5" class="btn btn-danger">Documentales</a>
</div>
<div class="container">   
    <h1 class="text-primary">LISTA DE PELICULAS</h1>         
        <hr>
    <div class="row">

        <?php if(empty($listapelicula)): ?>
                <h1 style="margin-left:1rem">No hay registros</h1>
                <a href="add.php"><button class="btn btn-primary ml-3 mt-2">Agregar peliculas</button></a>
            <?php else: ?>
            
                <?php foreach ($listapelicula as $pelicula): ?>

                    <div class="col-4">
                        <div class="card mt-10">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $pelicula['nombre']; ?></h4>
                                <h4 class="card-subtitle mb-2 text-muted"><?php echo $pelicula['descripcion']; ?></h4>
                                <p class="card-text text-muted"><?php echo getCompanyName($pelicula['genero']); ?></p>
                                <h7 class="card-title"><label for="estado" class="text-primary">Estado: </label><?php echo $pelicula['estado']; ?></h7>
                                <hr>
                                <a href="editar.php?id=<?php echo $pelicula['id']; ?>" class="card-link btn btn-primary">Editar</a>
                                <a href="borrar.php?id=<?php echo $pelicula['id']; ?>" class="card-link btn btn-danger">Borrar</a>
                            </div>
                        </div>
                    </div> 
                <?php endforeach ?>  
        <?php endif; ?>
    </div> 

</div>
</div>

</body>
</html>