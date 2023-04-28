<?php
session_start();
include 'header.php';
?>

<div class="container" style="height: 100vh;">
  <div class="row justify-content-center align-items-center" style="height: 100%;">
    <div class="col-md-6">
      <div class="border p-4">
        <h1 class="text-center mb-4">Login</h1>
        <form method="POST" action="login.php" class="row g-3">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="username">
          </div>
          <div class="col-auto">
            <label for="inputPassword2" class="visually-hidden">Password</label>
            <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="password">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3" value="Login">Login</button>
          </div>
        </form>
        <?php
          if (isset($_SESSION['missatge'])) {
            echo "<div class='alert alert-info mt-4' role='alert'>" .$_SESSION['missatge']. "</div>";
            unset($_SESSION['missatge']);
          }
        ?>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>