<?php
    include "header.php";

?>

<div class="bg-yellow-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="card shadow p-4 bg-white rounded-4 border-0" style=" max-width: 600px;">
    <h4 class="mb-4 text-center fw-bold text-purple font-fredoka">Login</h4>

    <form action="syslogin.php" method="POST" class="row g-3">
      <div class="col-md-12">
        <label class="form-label font-inter">E-mail</label>
        <input type="text" class="rounded-pill form-control" name="email" required>
      </div>

      <div class="col-md-12">
        <label class="form-label font-inter">Password</label>
        <input type="password" class="rounded-pill form-control" name="password" required>
      </div>

      <div class="col-12 mt-3 font-inter">
        <button type="submit" name="submit" class="btn btn-purple text-light w-100 rounded-5 fw-semibold">Login</button>
      </div>
    </form>
  </div>
</div>
</div>

<?php
    include "footer.php";
?>

