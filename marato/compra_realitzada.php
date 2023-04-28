<?php
include 'header.php';
?>

<div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
  <div>
    <h3 class="text-center">¡Enhorabuena! Has realizado la inscripción correctamente.</h3>
    <p class="text-center">¡Nos vemos en la carrera!</p>
    <div class="row justify-content-center">
      <div class="col-sm-4">
        <form action="inscrits.php" method="post">
          <input type="submit" class="btn btn-primary btn-block" style="margin-left: 15vh;" value="Llista d'inscrits">
        </form>
      </div>
      <div class="col-sm-4">
        <form action="login.php" method="post">
          <input type="submit" class="btn btn-primary btn-block" style="margin-left: 3vh;" value="sortir">
        </form>
      </div>
    </div>
  </div>
</div>

<?php
include 'footer.php';
?>