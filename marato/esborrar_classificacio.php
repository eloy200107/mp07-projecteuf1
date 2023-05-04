<?php
include 'connectar.php';

if(isset($_GET['dni'])) {
    $dni = $_GET['dni'];
    $sql = "DELETE FROM classificacio WHERE dni='$dni'";
    if(mysqli_query($bd, $sql)) {
        header("location: classificacio.php");
        exit();
    } else {
        echo "Error al eliminar la fila de la tabla: " . mysqli_error($bd);
    }
} else {
    header("location: classificacio.php");
    exit();
}
?>