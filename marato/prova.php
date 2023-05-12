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
   
}

// Si el usuario ha iniciado sesión y es admin, mostrar el menú y el resto del contenido de la página
include 'connectar.php';
include 'header.php';
?>

<h1 class="text-center mt-4">Inscripció</h1>

<?php

if (isset($_POST['DNI']) && isset($_POST['nom']) && isset($_POST['id_club']) && isset($_POST['edat']) && isset($_POST['recorregut']) && isset($_POST['cognoms'])) {
    $DNI = $_POST['DNI'];
    $Nom = $_POST['nom'];
    $id_club = $_POST['id_club'];
    $edat = $_POST['edat'];
    $id_recorregut = $_POST['recorregut'];
    $cognoms = $_POST['cognoms'];
   
    $sql = "insert into inscripcio(DNI,Nom,id_club,edat,id_recorregut,cognoms)"
           . "values ('$DNI', '$Nom', '$id_club', '$edat', '$id_recorregut', '$cognoms')";
    if (mysqli_query($bd, $sql)) {
        echo '<div class="alert alert-success" role="alert">Dades inscrites</div>';
    }
 else {
       if (mysqli_errno($bd) == 1062) {
    echo '<div class="alert alert-danger" role="alert">El DNI ja està registrat. Si us plau, introdueix un DNI diferent.</div>';
} else {
    echo '<div class="alert alert-danger" role="alert">ERROR dades incorrectes: ' . mysqli_error($bd) . '</div>';
}
   }
   
}


?>
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="border p-4" style="width: 500px; margin: 0 auto;">
    <form action="prova.php" method="post">
      <div class="mb-3">
        <label for="dni" class="form-label">DNI:</label>
        <input type="text" class="form-control" id="dni" name="DNI">
      </div>
      <div class="mb-3">
        <label for="nom" class="form-label">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom">
      </div>
      <div class="mb-3">
        <label for="cognoms" class="form-label">Cognoms:</label>
        <input type="text" class="form-control" id="cognoms" name="cognoms">
      </div>
        <div class="mb-3">
        <label for="club" class="form-label">Club:</label>
        <select class="form-select" id="club" name="id_club">
          <?php
    // Conectar a la base de datos
    include 'connectar.php';

    // Consulta SQL para obtener los valores únicos del campo "tipus"
    $sql = "SELECT DISTINCT nom FROM test.club;";
    $result = mysqli_query($bd, $sql);

    // Iterar sobre los resultados de la consulta y crear una opción para cada valor
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<option value="' . $row['nom'] . '">' . $row['nom'] . '</option>';
    }

    // Cerrar la conexión a la base de datos
   
    ?>

        </select>
      </div>
      <div class="mb-3">
        <label for="edat" class="form-label">Edat:</label>
        <input type="text" class="form-control" id="edat" name="edat">
      </div>
      <div class="mb-3">
        <label for="recorregut" class="form-label">Recorregut:</label>
        <select class="form-select" id="recorregut" name="recorregut">
          <?php
    // Conectar a la base de datos
    include 'connectar.php';

    // Consulta SQL para obtener los valores únicos del campo "tipus"
    $sql = "SELECT DISTINCT tipus FROM test.recorregut;";
    $result = mysqli_query($bd, $sql);

    // Iterar sobre los resultados de la consulta y crear una opción para cada valor
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<option value="' . $row['tipus'] . '">' . $row['tipus'] . '</option>';
    }

    // Cerrar la conexión a la base de datos
   
    ?>

        </select>
      </div>
      <button type="submit"  class="btn btn-primary">Realitzar Inscripció</button>
    </form>
 


<div class="d-flex justify-content-center align-items-center" style="margin-top: -53px;margin-left: 30px">
  <form action="pagament_incripció.php" method="post">
    <button type="submit" class="btn btn-secondary">Pagar</button>
  </form>
</div>
      </div>
</div>
<?php
include 'footer.php';
mysqli_close($bd);
?>