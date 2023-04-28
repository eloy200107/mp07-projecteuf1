<?php
session_start();
include 'header.php';
?>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="border p-4">
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
    
    <?php if (isset($_SESSION['missatge'])): ?>
      <div class="alert alert-info mt-4" role="alert"><?php echo $_SESSION['missatge']; unset($_SESSION['missatge']); ?></div>
    <?php endif; ?>
    
  </div>
</div>

<?php include 'footer.php'; ?>