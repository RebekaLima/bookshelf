<?php

    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email'] && !empty($_POST['password'])))
    {
        include_once('connbd.php');
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM tb_users WHERE email = '$email' AND senha = '$password'";

        $result = (mysqli_query($conn, $sql));
        $user = (mysqli_fetch_assoc($result));

        if(mysqli_num_rows($result) < 1)
        {   
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['profile_pic'] = $user['profile_pic'];
            header('Location: system.php');
        }
    }
    else
    {
        header('Location: login.php');
    }

    mysqli_close($conn);
?>