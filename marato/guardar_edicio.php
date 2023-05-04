<?php
include 'connectar.php'; // incluir el archivo de conexión a la base de datos

// Recoger los valores enviados por el formulario
$id = $_POST['id'];
$nom = $_POST['nom'];
$cognoms = $_POST['cognoms'];
$temps_total = $_POST['temps_total'];
$ritme_km = $_POST['ritme_km'];
$nom_club = $_POST['nom_club'];

// Validar los datos
// Aquí puedes añadir validaciones como asegurarse que los campos requeridos estén completos, los formatos sean correctos, etc.

// Actualizar la información en la base de datos utilizando una sentencia SQL UPDATE
$sql = "UPDATE classificacio SET Nom='$nom', cognoms='$cognoms', temps_total='$temps_total', ritme_km='$ritme_km', nom_club='$nom_club' WHERE id_recorregut='$id'";
$resultat = mysqli_query($bd, $sql);

// Redirigir al usuario a una página de confirmación o a la página de visualización de la información actualizada
if ($resultat) {
    header("Location: classificacio.php?id=$id"); // redirigir a la página de visualización de la información actualizada
} else {
    echo "Error al actualizar la información"; // mostrar un mensaje de error si hubo algún problema
}
?>
