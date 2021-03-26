<?php
include 'utility.php';
session_start();

$pelicula = $_SESSION['peliculas'];

if(isset($_GET['id'])){
    $peliculasID = $_GET['id'];

    $elementIndex = getIndexElement($pelicula,'id',$peliculasID);
    unset($pelicula[$elementIndex]);
    $_SESSION['peliculas'] = $pelicula;
}

header("location:index.php");
exit();
?>