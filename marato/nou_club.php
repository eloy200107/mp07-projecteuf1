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
?>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="border p-4" style="width: 500px; margin: 0 auto;">
    <h2 class="text-center mb-4">Afegir club</h2>
    <form action="guardar_nou_club.php" method="post">
        <div class="form-group">
        <label for="nom">Id:</label>
        <input type="text" class="form-control" id="id" name="id">
      </div>
      <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom">
      </div>
      <div class="form-group">
        <label for="cognoms">participants:</label>
        <input type="text" class="form-control" id="participants" name="participants">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>

<?php
include 'footer.php';
?>