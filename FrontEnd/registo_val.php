<?php
        $primeiro = $ultimo = $email = $contribuinte =$nascimento = $telemovel = $password = "";
        $primeiro_err = $ultimo_err = $email_err = $contribuinte_err =$nascimento_err = $telemovel_err = $password_err = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
        
            if(empty($_POST["primeiro"]))
            {
                $primeiro_err = "É necessário preencher o primeiro nome.";
            }
            else {
                //$primeiro = test_input($_POST["primeiro"]);
            }

            if(empty($_POST["ultimo"])){
                $ultimo_err = "É necessário preencher o ultimo nome.";
            }
            else {
                //$ultimo = test_input($_POST["ultimo"]);
            }

            if(empty($_POST["email"])){
                $email_err = "É necessário preencher o email.";
            }
            else {
                //$email = test_input($_POST["email"]);
            }

            if(empty($_POST["nascimento"])){
                $nascimento_err = "É necessário preencher a data de nascimento.";
            }
            else {
                //$nascimento = test_input($_POST["nascimento"]);
            }

            if(empty($_POST["contribuinte"])){
                $contribuinte_err = "É necessário preencher o contribuinte.";
            }
            else {
                //$password = test_input($_POST["password1"]);
            }

            if(empty($_POST["telemovel"])){
                $telemovel_err = "É necessário preencher o telemovel.";
            }
            else {
                //$telemovel = test_input($_POST["telemovel"]);
            }

            if(empty($_POST["password1"])){
                $password_err = "É necessário preencher a password.";
            }
            else {
                //$password = test_input($_POST["password1"]);
            }
        
        }


?>