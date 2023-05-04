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

$id = $_GET['id'];
$sql = "SELECT Nom, cognoms, temps_total, ritme_km, nom_club, id_recorregut, edat FROM classificacio WHERE id_recorregut = '$id'";
$resultat= mysqli_query($bd, $sql);
$classificacio= mysqli_fetch_array($resultat);

if ($admin) { ?>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="border p-4" style="width: 500px; margin: 0 auto;">
    <h2 class="text-center mb-4">Editar clasificación</h2>
    <form action="guardar_edicio.php" method="post">
      <input type="hidden" name="id" value="<?php echo $classificacio['id_recorregut']; ?>">
      <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $classificacio['Nom']; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="cognoms">Cognoms:</label>
        <input type="text" class="form-control" id="cognoms" name="cognoms" value="<?php echo $classificacio['cognoms']; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="temps_total">Temps total:</label>
        <input type="text" class="form-control" id="temps_total" name="temps_total" value="<?php echo $classificacio['temps_total']; ?>">
      </div>
      <div class="form-group">
        <label for="ritme_km">Ritme km:</label>
        <input type="text" class="form-control" id="ritme_km" name="ritme_km" value="<?php echo $classificacio['ritme_km']; ?>">
      </div>
      <div class="form-group">
        <label for="nom_club">Nom club:</label>
        <input type="text" class="form-control" id="nom_club" name="nom_club" value="<?php echo $classificacio['nom_club']; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="edat">Edat:</label>
        <input type="text" class="form-control" id="edat" name="edat" value="<?php echo $classificacio['edat']; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="edat">Recorregut:</label>
        <input type="text" class="form-control" id="recorregut" name="recorregut" value="<?php echo $classificacio['id_recorregut']; ?>" readonly>
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