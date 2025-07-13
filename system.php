<?php

    session_start();
    include('connbd.php');

    if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['password']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: login.php');
    }
    $logged = $_SESSION['email'];

    $profilePic = "";

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $fileName = uniqid() . "_" . basename($_FILES["image"]["name"]);
    $destination = "img/" . $fileName;

    $allowed = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($_FILES["image"]["type"], $allowed)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
            $profilePic = $destination;

            $sql = "UPDATE tb_users SET profile_pic = '$profilePic' WHERE email = '$logged'";
            mysqli_query($conn, $sql);

            $_SESSION['profile_pic'] = $profilePic;

            echo "Imagem enviada com sucesso!";
        } else {
            echo "Erro ao mover a imagem.";
        }
    } else {
        echo "Tipo de imagem não permitido.";
    }
}

    $defaultPicture = (isset($_SESSION['profile_pic']) && file_exists($_SESSION['profile_pic']))
    ? $_SESSION['profile_pic']
    : 'img/default.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>BookShelf</title>
</head>
<body>

<nav class="navbar bg-white shadow">
  <div class="container-fluid">
    <a class="navbar-brand font-fredoka fs-4 fw-semibold" href="system.php">
      <img src="./img/icon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      BookShelf
    </a>
        <div class="">
    <a class="btn btn-pink border-0 text-light rounded-pill font-inter" href="exit.php" role="button" aria-expanded="false">
        Exit <i class="bi bi-door-open me-2"></i>
    </a>
        </div>
    </div>
</nav>

<img id="uploadedImage"
    src="<?php echo $defaultPicture; ?>"
    style="max-width: 300px; max-height: 300px;">

<div class="row">
    <div class="col-md-4">
        <form action="system.php" method="post" enctype="multipart/form-data">
            <label>Select image</label>
            <input type="file" name="image" accept="image/*" class="form-control"/>
            <button type="submit" name="submit" class ="btn btn-success">
                Upload image</button>
        </form>
    </div>
</div>

<?php

include "footer.php";

?>