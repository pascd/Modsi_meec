<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';
session_start();

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_paciente = $_SESSION['id'];
    $id_vaga = $_POST['id_vagas'];

    $sel_sql = "SELECT * FROM marcacao WHERE paciente='$id_paciente' AND vaga='$id_vaga'";
    $ans = mysqli_query($db, $sel_sql);

    if ($ans->num_rows > 0) {
        //$errors['agendar']="Já possui uma reserva para este horário";
    }

    $sel_sql = "SELECT * FROM marcacao WHERE paciente='$id_paciente'";
    $ans = mysqli_query($db, $sel_sql);

    if (mysqli_num_fields($ans) > 0) {
        $row = mysqli_fetch_array($ans);
    }

    if (empty($errors)) {
        $sel_sql = "SELECT * FROM vagas WHERE id_vagas='$id_vaga'";
        $ans = mysqli_query($db, $sel_sql);

        if (mysqli_num_fields($ans) > 0) {
            $row = mysqli_fetch_array($ans);
            $n_vagas = $row['vagas'] - 1;

            $query = "UPDATE vagas SET vagas='$n_vagas' WHERE id_vagas='$id_vaga'";
            mysqli_query($db, $query);
        }

        //Registar o agendamento na base de dados
        $estado = 'Marcado';
        $ins_sql = "INSERT INTO marcacao(paciente, vaga, estado) VALUES ('$id_paciente', '$id_vaga', '$estado')";
        mysqli_query($db, $ins_sql);

        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error', 'errors' => $errors);
    }


    //use PHPMailer\PHPMailer\PHPMailer;
    //use PHPMailer\PHPMailer\Exception;

    require 'path/to/PHPMailer/src/PHPMailer.php';
    require 'path/to/PHPMailer/src/SMTP.php';
    require 'path/to/PHPMailer/src/Exception.php';

    // SMTP configuration
    $smtpHost = 'smtp.gmail.com';
    $smtpUsername = 'site.vacinacao@gmail.com';
    $smtpPassword = 'eparatirar20$';
    $smtpPort = 485; // or 465 for SSL encryption / 587

    // Create a PHPMailer instance
    require_once('phpmailer/PHPMailerAutoload.php');
    $mail = new PHPMailer();

    // Set the SMTP configuration
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = 'tls'; // or 'ssl' for SSL encryption
    $mail->Port = $smtpPort;

    // Set the email content
    $mail->setFrom('site.vacinacao@gmail.com', 'Vacinacao Portugal');
    $mail->addAddress('pedro.afonso.cardoso.dias@gmail.com', 'Recipient Name');
    $mail->Subject = 'Subject of the email';
    $mail->Body = 'Content of the email';

    // Send the email
    if (!$mail->send()) {
        echo 'Email could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Email has been sent.';
    }
}

header('Content-Type: application/json');
echo json_encode($response);
mysqli_close($db);
