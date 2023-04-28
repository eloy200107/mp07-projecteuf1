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

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="border p-4" style="width: 500px; margin: 0 auto;">
    <h2 class="text-center">Efectuar pagament</h2>
    <form action="compra_realitzada.php" method="post">
      <div class="mb-3">
        <label class="form-label">Metodes de pagament:</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="pagament" id="transferencia" value="Transferència Bancària">
          <label class="form-check-label" for="transferencia">
            Transferència Bancària
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="pagament" id="bizum" value="Bizum">
          <label class="form-check-label" for="bizum">
            Bizum
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="pagament" id="paypal" value="Paypal">
          <label class="form-check-label" for="paypal">
            Paypal
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="pagament" id="tarjeta" value="Tarjeta de crèdit o dèbit">
          <label class="form-check-label" for="tarjeta">
            Tarjeta de Crèdit o Dèbit
          </label>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Realitzar Pagament</button>
      </div>
    </form>
  </div>
</div>

<?php
include 'footer.php';
?>