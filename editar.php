<?php 
include 'utility.php';
session_start();

if(isset($_GET['id'])){
    $peliculasID = $_GET['id'];

    $_SESSION['peliculas'] = isset($_SESSION['peliculas']) ? $_SESSION['peliculas'] : array();
    
    $pelicula = $_SESSION['peliculas'];

    $elemento = searchProperty($pelicula,'id',$peliculasID)[0];
    $elementoIndex = getIndexElement($pelicula,'id',$peliculasID);

        if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['descripcion']) && isset($_POST['estado']) ){
    
                $actualizarEstudiante= ['id'=>$peliculasID,'nombre'=> $_POST['nombre'], 'descripcion'=> $_POST['descripcion'], 'genero'=> $_POST['genero'], 'estado'=>$_POST['estado'] ];

                $pelicula[$elementoIndex] = $actualizarEstudiante;
                
                    $_SESSION['peliculas'] = $pelicula;
            
                    header('location: index.php');
                    exit();
        }







    }else{

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

<h1 class="container" style="border-radius:5px">Editar / Actualizar Registro peliculas</h1>

<form action="editar.php?id=<?php echo $elemento['id']; ?>" method="post">

    <div class="form container border jumbotron">

                    <label for="nombre">NOMBRE</label>
                    <input class="form-group form-text" value="<?php echo $elemento['nombre']; ?>" type="text" style="width:600px" name="nombre" id="nombre">
                
                    <label for="descripcion">DESCRIPCION</label>
                    <input class="form-group form-text" value="<?php echo $elemento['descripcion']; ?>" type="text" style="width:600px" name="descripcion" id="descripcion">
                
                    <label for="genero">GENERO</label>
                    <select class="form-group form-text" style="width:600px" name="genero" id="genero">
                <?php 
                        
                foreach($genero as $id => $nombregenero): ?>

                    <?php if($id == $elemento['genero']): ?>
                        <option selected value="<?php echo $id; ?>"> <?php echo $nombregenero; ?> </option>
                    <?php else: ?> 
                        <option  value="<?php echo $id; ?>"> <?php echo $nombregenero; ?> </option>
                    <?php endif; ?> 

                <?php endforeach; ?>
                    </select>
    
         <div>
            <label for="estado">ESTADO</label>
            <input type="radio"  name="estado" value="activo" checked><label for="activo">ACTIVO</label>
            <input type="radio"  name="estado" value="inactivo"><label for="inactivo">INACTIVO</label>
            </div>
            
            <hr>
            <input type="submit" value="GUARDAR" class="btn btn-primary">
            <a href="index.php"><input type="submit" value="ATRAS" class="btn btn-danger"></a>
        
         </div>
    </div>

        

</form>

</div>



</body>
</html>