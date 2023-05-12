<?php
include 'connectar.php'; // incluir el archivo de conexión a la base de datos

// Recoger los valores enviados por el formulario
$id_club = $_POST['id'];
$nom_club = $_POST['nom'];
$participants = $_POST['participants'];

// Añadir la información en la base de datos utilizando una sentencia SQL INSERT
$sql = "INSERT INTO club (id_club, Nom, Participants) VALUES ('$id_club', '$nom_club', '$participants')";
$resultat = mysqli_query($bd, $sql);

// Redirigir al usuario a una página de confirmación o a la página de visualización de la información actualizada
if ($resultat) {
    header("Location: club.php");
    exit;
} else {
    echo "Ha habido un error al guardar la información del club. Por favor, inténtelo de nuevo.";
}
?>