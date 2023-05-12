<?php
include 'connectar.php'; // incluir el archivo de conexión a la base de datos

// Recoger los valores enviados por el formulario
$id_club = $_POST['id_club'];
$nom_club = $_POST['nom'];
$participants = $_POST['participants'];


// Validar los datos
// Aquí puedes añadir validaciones como asegurarse que los campos requeridos estén completos, los formatos sean correctos, etc.

// Actualizar la información en la base de datos utilizando una sentencia SQL UPDATE
$sql = "UPDATE club SET Nom='$nom_club', participants='$participants' WHERE id_club='$id_club'";
$resultat = mysqli_query($bd, $sql);

// Redirigir al usuario a una página de confirmación o a la página de visualización de la información actualizada
if ($resultat) {
    header("Location: club.php"); // redirigir a la página de visualización de la información actualizada
} else {
    echo "Error al actualizar la información"; // mostrar un mensaje de error si hubo algún problema
}
?>
