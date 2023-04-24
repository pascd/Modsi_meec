<?php
        
        //require_once('database.php');
        
        $primeiro = $ultimo = $email = $contribuinte =$nascimento = $telemovel = $password = "";
        $primeiro_err = $ultimo_err = $email_err = $contribuinte_err =$nascimento_err = $telemovel_err = $password_err = "";

        $Primeiro = mysqli_real_escape_string($conn,$_POST['primeiro']);
        $Ultimo = mysqli_real_escape_string($conn,$_POST['ultimo']);
        $Email = mysqli_real_escape_string($conn,$_POST['email']);
        $Nascimento = mysqli_real_escape_string($conn,$_POST['nascmineto']);
        $Telemovel = mysqli_real_escape_string($conn,$_POST['telemovel']);
        $Contribuinte = mysqli_real_escape_string($conn,$_POST['contribuinte']);
        $Password = mysqli_real_escape_string($conn,$_POST['password']);
        $CPassword = mysqli_real_escape_string($conn,$_POST['cpassword']);

        if($password != $CPassword)
        {
            echo 'Teste Erro';
        }
?>