<?php
    session_start();
       
    unset($_SESSION['login']);
    unset($_SESSION['id']);
    unset($_SESSION['primeiro_nome']);
    unset($_SESSION['ultimo_nome']);
    unset($_SESSION['email']);
    unset($_SESSION['contacto']);
    unset($_SESSION['nus']);
    unset($_SESSION['nascimento']);
    unset($_SESSION['nivel']);

    session_destroy();

    header("Location: ../pagina_inicial/index.php");

    ?>