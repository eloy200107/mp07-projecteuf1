<?php
session_start();

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: autoritzacio.php");
    exit;
}

// Comprobar si el usuario es admin
if ($_SESSION['username'] == 'admin') {
    include 'menu_admin.php';
    $admin = true;
} else {
    include 'menu.php';
    $admin = false;
}

// Si el usuario ha iniciado sesión y es admin, mostrar el menú y el resto del contenido de la página
include 'connectar.php';
include 'header.php';

$sql = "SELECT id_club, Nom, Participants FROM club";
$resultat = mysqli_query($bd, $sql);

echo "<div class='container mt-5'>";
echo "<h2 class='text-center mb-4'>Llista de Clubs</h2>";
echo "<table class='table table-striped'>";
echo "<thead>";
echo "<tr>"; 
if ($admin) {
    echo "<th scope='col'>ID</th>";
}
echo "<th scope='col'>Nom</th>"; 
echo "<th scope='col'>Participants</th>"; 
if ($admin) {
    echo "<th scope='col'>Editar</th>";
    echo "<th scope='col'>Esborrar</th>";
} 
echo "</tr>";   
echo "</thead>";
echo "<tbody>";

while ($club = mysqli_fetch_array($resultat)) {
    echo "<tr>";
    if ($admin) {
        echo "<td>".$club['id_club']. "</td>";
    }
    echo "<td>".$club['Nom']. "</td>";
    echo "<td>".$club['Participants']. "</td>";
    if ($admin) {
        echo "<td><a href='editar_club.php?id_club=".$club['id_club']."' class='btn btn-primary btn-sm'>Editar</a></td>";
        echo "<td><a href='esborrar_club.php?id_club=".$club['id_club']."' class='btn btn-danger btn-sm'>Esborrar</a></td>";
    } 
    echo "</tr>";    
}

echo "</tbody>";
echo "</table>";
echo "</div>";

// Mostrar botón para agregar un nuevo club si el usuario es admin
if ($admin) {
    echo "<div class='container mt-5 d-flex justify-content-center'>";
    echo "<a href='nou_club.php' class='btn btn-primary mb-3'>Afegir Club</a>";
    echo "</div>";
}

include 'footer.php';
?>