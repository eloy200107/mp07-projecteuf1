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
    $admin=true;
    
} else {
    include 'menu.php';
    $admin=false;
}

// Si el usuario ha iniciado sesión y es admin, mostrar el menú y el resto del contenido de la página
include 'connectar.php';
include 'header.php';

$sql = "SELECT DNI, Nom, id_club, edat, id_recorregut, cognoms FROM inscripcio";
$resultat = mysqli_query($bd, $sql);

echo "<h2 class='text-center'>Llista d'inscrits</h2>";
echo "<div class='container'>"; 
echo "<table class='table table-striped'>";
echo "<thead>";
echo "<tr>";
echo "<th scope='col'>DNI</th>"; 
echo "<th scope='col'>Nom</th>"; 
echo "<th scope='col'>id_club</th>"; 
echo "<th scope='col'>Edat</th>"; 
echo "<th scope='col'>id_recorregut</th>"; 
echo "<th scope='col'>Cognoms</th>";
if ($admin) {
    echo "<th scope='col'>Esborrar</th>";
}
echo "</tr>";   
echo "</thead>";
echo "<tbody>";

while ($inscripcio = mysqli_fetch_array($resultat)) {
    echo "<tr>";
    echo "<td>".$inscripcio['DNI']. "</td>";
    echo "<td>".$inscripcio['Nom']. "</td>";
    echo "<td>".$inscripcio['id_club']. "</td>";
    echo "<td>".$inscripcio['edat']. "</td>";
    echo "<td>".$inscripcio['id_recorregut']. "</td>";
    echo "<td>".$inscripcio['cognoms']. "</td>";
    if ($admin) {
        echo "<td><a href='esborrar.php?DNI=".$inscripcio['DNI']."' class='btn btn-danger btn-sm'>Esborrar</a></td>";
    }
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
echo "</div>";



include 'footer.php';
?>