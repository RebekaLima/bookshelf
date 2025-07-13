<?php

    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email'] && !empty($_POST['password'])))
    {

    }
    else
    {
        header('Location: login.php');
    }

?>