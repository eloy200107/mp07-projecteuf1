<?php
include 'connectar.php';

if(isset($_GET['id_club'])) {
    $id = $_GET['id_club'];
    $sql = "DELETE FROM club WHERE id_club='$id'";
    if(mysqli_query($bd, $sql)) {
        header("location: club.php");
        exit();
    } else {
        echo "Error al eliminar la fila de la tabla: " . mysqli_error($bd);
    }
} else {
    header("location: classificacio.php");
    exit();
}
?>