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

$id_club = $_GET['id_club'];
$sql = "SELECT id_club, Nom, participants FROM club WHERE id_club = '$id_club'";
$resultat= mysqli_query($bd, $sql);
$club= mysqli_fetch_array($resultat);

if ($admin) { ?>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="border p-4" style="width: 500px; margin: 0 auto;">
    <h2 class="text-center mb-4">Editar Clubs</h2>
    <form action="guardar_edicio_club.php" method="post">
      <input type="hidden" name="id_club" value="<?php echo $club['id_club']; ?>">
      <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $club['Nom']; ?>">
      </div>
      <div class="form-group">
        <label for="participants">Participants:</label>
        <input type="text" class="form-control" id="participants" name="participants" value="<?php echo $club['participants']; ?>">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div><?php
} else {
// Si el usuario no es admin, redirigir a la página de autorización
header("Location: autoritzacio.php");
exit;
}

include 'footer.php';
?>