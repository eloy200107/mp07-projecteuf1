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


$sql = "SELECT Nom, cognoms, temps_total, ritme_km, nom_club, id_recorregut, edat FROM classificacio";
$resultat= mysqli_query($bd, $sql);

echo "<div class='container mt-5'>";
echo "<h2 class='text-center mb-4'>Llista de classificació</h2>";
echo "<table class='table table-striped'>";
echo "<thead>";
echo "<tr>"; 
echo "<th scope='col'>Nom</th>"; 
echo "<th scope='col'>Cognoms</th>"; 
echo "<th scope='col'>Temps total</th>"; 
echo "<th scope='col'>Ritme km</th>"; 
echo "<th scope='col'>Nom club</th>"; 
echo "<th scope='col'>Edat</th>";
if ($admin) {
    echo "<th scope='col'>Editar</th>";
    echo "<th scope='col'>Esborrar</th>";
} 
echo "</tr>";   
echo "</thead>";
echo "<tbody>";

while ($classificacio= mysqli_fetch_array($resultat)) {
    echo "<tr>";
    echo "<td>".$classificacio['Nom']. "</td>";
    echo "<td>".$classificacio['cognoms']. "</td>";
    echo "<td>".$classificacio['temps_total']. "</td>";
    echo "<td>".$classificacio['ritme_km']. "</td>";
    echo "<td>".$classificacio['nom_club']. "</td>";
    echo "<td>".$classificacio['edat']. "</td>";
    if ($admin) {
        echo "<td><a href='editar_classificacio.php?id=".$classificacio['id_recorregut']."' class='btn btn-primary btn-sm'>Editar</a></td>";
        echo "<td><a href='esborrar_classificacio.php?id=".$classificacio['id_recorregut']."' class='btn btn-danger btn-sm'>Eliminar</a></td>";
    } 
    echo "</tr>";    
}

echo "</tbody>";
echo "</table>";
echo "</div>";


include 'footer.php';
?>