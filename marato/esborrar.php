<?php
include 'connectar.php';

if(isset($_GET['DNI'])) {
    $dni = $_GET['DNI'];
    $sql = "DELETE FROM inscripcio WHERE DNI='$dni'";
    if(mysqli_query($bd, $sql)) {
        header("location: inscrits.php");
        exit();
    } else {
        echo "Error al eliminar la inscripción: " . mysqli_error($bd);
    }
} else {
    header("location: inscrits.php");
    exit();
}
?>