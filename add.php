<?php 
include 'utility.php';
session_start();

if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['genero']) && isset($_POST['estado']) ){

    $_SESSION['peliculas'] = isset($_SESSION['peliculas']) ? $_SESSION['peliculas'] : array();

    $pelicula = $_SESSION['peliculas'];
    $id = 1;

    if(!empty($pelicula)){
       $lastElement = getLastElement($pelicula);
       $id = $lastElement['id'] +1;
    }

    array_push($pelicula, ['id'=>$id,'nombre'=> $_POST['nombre'], 'descripcion'=> $_POST['descripcion'], 'genero'=> $_POST['genero'], 'estado'=>$_POST['estado'] ]);
       
        $_SESSION['peliculas'] = $pelicula;

        header('location: index.php');
        exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<hr>

<div class="jumbotron mt-5">

<h1 class="container" style="border-radius:3px">Registro de peliculas</h1>

<form action="add.php" method="post">

    <div class="form container">

                <label for="nombre">Nombre</label>
                <input class="form-group form-text" type="text" style="width:600px" name="nombre" id="nombre">
            
                <label for="descripcion">Descripcion</label>
                <input class="form-group form-text" type="text" style="width:600px" name="descripcion" id="descripcion">
            
                <label for="genero">Genero</label>
                <select class="form-group form-text" style="width:600px" name="genero" id="genero">
            <?php 
                    
            foreach($genero as $id => $nombregenero): ?>
                    <option value="<?php echo $id; ?>"> <?php echo $nombregenero; ?> </option>
            <?php endforeach; ?>
                </select>
   
        <div>
        <label for="estado">Estado</label>
        <input type="radio"  name="estado" value="activo" checked><label for="activo">Activo</label>
        <input type="radio"  name="estado" value="inactivo"><label for="inactivo">Inactivo</label>
        </div>
        
        <hr>
        <input type="submit" value="GUARDAR" class="btn btn-primary">
     
    </div>

        

</form>

</div>



</body>
</html>