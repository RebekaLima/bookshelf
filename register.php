<?php
    include("header.php");

    include ("connbd.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

    $sql = "INSERT INTO tb_users(nome, surname, username, email, senha)
            VALUES ('$nome', '$surname', '$username', '$email', '$password')";

    if(mysqli_query($conn, $sql)){
        echo "Usário cadastrado com sucesso";
    }
    else
    {
        echo "Erro".mysqli_connect_error($conn);
    }
}
    mysqli_close($conn);
?>
<div class="bg-yellow-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="card shadow p-4 bg-white rounded-4 border-0" style=" max-width: 600px;">
    <h4 class="mb-4 text-center fw-bold text-purple font-fredoka">Register</h4>

    <form action="register.php" method="POST" class="row g-3">
      <div class="col-md-6">
        <label class="form-label font-inter">Name</label>
        <input type="text" class="rounded-pill form-control" name="nome" required>
      </div>

      <div class="col-md-6">
        <label class="form-label font-inter">Surname</label>
        <input type="text" class="rounded-pill form-control" name="surname" required>
      </div>

      <div class="col-md-12">
        <label class="form-label font-inter">Username</label>
        <input type="text" class="rounded-pill form-control" name="username" required>
      </div>

      <div class="col-md-12">
        <label class="form-label font-inter">Email</label>
        <input type="email" class="rounded-pill form-control" name="email" required>
      </div>

      <div class="col-md-12">
        <label class="form-label font-inter">Password</label>
        <input type="password" class="rounded-pill form-control" name="password" required>
      </div>

      <div class="col-12 mt-3 font-inter">
        <button type="submit" class="btn btn-purple text-light w-100 rounded-5 fw-semibold">Register</button>
      </div>
    </form>
  </div>
</div>
</div>

<?php
    include "footer.php";
?>