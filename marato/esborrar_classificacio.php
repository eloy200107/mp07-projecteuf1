<?php
include 'connectar.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM classificacio WHERE id_recorregut='$id'";
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