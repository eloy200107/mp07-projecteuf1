<?php
session_start();

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: autoritzacio.php");
    exit;
}

// Comprobar si el usuario es admin
if ($_SESSION['username'] != 'admin') {
    header("Location: classificacio.php");
    exit;
}

include 'connectar.php';
include 'header.php';

// Obtener el ID de la fila que se va a editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: classificacio.php");
    exit;
}

// Obtener los datos actuales de la fila que se va a editar
$sql = "SELECT Nom, cognoms, temps_total, ritme_km, nom_club, edat FROM classificacio WHERE id_recorregut = '$id'";
$resultat = mysqli_query($bd, $sql);
$classificacio = mysqli_fetch_assoc($resultat);

// Comprobar si se han obtenido los datos de la fila
if (!$classificacio) {
    header("Location: classificacio.php");
    exit;
}

// Si se ha enviado el formulario, actualizar los datos de la fila en la tabla de clasificación
if (isset($_POST['enviar'])) {
    $temps_total = isset($_POST['temps_total']) ? $_POST['temps_total'] : null;
    $ritme_km = isset($_POST['ritme_km']) ? $_POST['ritme_km'] : null;
    
    $sql = "UPDATE classificacio SET temps_total = '$temps_total', ritme_km = '$ritme_km' WHERE id_recorregut = '$id'";
    mysqli_query($bd, $sql);
    
    header("Location: classificacio.php");
    exit;
}

// Mostrar el formulario de edición
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Editar clasificación</h2>
    <form method="post">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo isset($classificacio['Nom']) ? $classificacio['Nom'] : ''; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="cognoms">Cognoms:</label>
            <input type="text" class="form-control" id="cognoms" name="cognoms" value="<?php echo isset($classificacio['cognoms']) ? $classificacio['cognoms'] : ''; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="temps_total">Temps total:</label>
            <input type="text" class="form-control" id="temps_total" name="temps_total" value="<?php echo isset($classificacio['temps_total']) ? $classificacio['temps_total'] : ''; ?>">
        </div>
        <div class="form-group">
            <label for

="ritme_km">Ritme por kilómetro:</label>
<input type="text" class="form-control" id="ritme_km" name="ritme_km" value="<?php echo isset($classificacio['ritme_km']) ? $classificacio['ritme_km'] : ''; ?>">
</div>
<div class="form-group">
<label for="nom_club">Club:</label>
<input type="text" class="form-control" id="nom_club" name="nom_club" value="<?php echo isset($classificacio['nom_club']) ? $classificacio['nom_club'] : ''; ?>" disabled>
</div>
<div class="form-group">
<label for="edat">Edat:</label>
<input type="text" class="form-control" id="edat" name="edat" value="<?php echo isset($classificacio['edat']) ? $classificacio['edat'] : ''; ?>" disabled>
</div>
<button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
</form>

</div>
<?php include 'footer.php'; ?>