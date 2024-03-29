<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  /*
        $Email = mysqli_real_escape_string($db,$_POST['email']);
        $Password = mysqli_real_escape_string($db,$_POST['password']);
        */

  $Email = $_POST['email'];
  $Password = $_POST['password'];

  $errors = array();

  if (empty($Email)) {
    $errors['email'] = "Email e necessario.";
  } else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Utilize um formato valido de email.";
  } else {
    $sel_sql = "SELECT * FROM users WHERE Email = '$Email'";
    $ans = mysqli_query($db, $sel_sql);
    if ($ans->num_rows == 0) {
      $errors['email'] = "Este email nao esta registado.";
    }
  }

  if (empty($Password)) {
    $errors['password'] = "Password e necesssaria.";
  } else if (strlen($Password) < 8) {
    $errors['password'] = "Password muito pequena.";
  } else {
    $sel_sql = "SELECT * FROM users WHERE email = '$Email'";
    $ans = mysqli_query($db, $sel_sql);
    if (mysqli_num_fields($ans) > 0) {
      $row = mysqli_fetch_array($ans);
      $Password_db = $row['pass'];
      $Alterar_Senha = $row['alt_senha'];

      if ($Alterar_Senha == 1) {
        if ($Password != $Password_db) {
          $errors['password'] = "Credenciais de acesso erradas";
        }
      } else {
        if (!password_verify($Password, $Password_db)) {
          $errors['password'] = "Credenciais de acesso erradas";
        }
      }
    }
  }

  if (empty($errors)) {
    $response = array('status' => 'success', 'alterar_senha' => $Alterar_Senha);
    $sel_sql = "SELECT * FROM users WHERE Email = '$Email'";
    $ans = mysqli_query($db, $sel_sql);
    if (mysqli_num_fields($ans) > 0) {
      $row = mysqli_fetch_array($ans);
      session_start();
      $_SESSION['login'] = 1;
      $_SESSION['id'] = $row['id_user'];
      $_SESSION['primeiro_nome'] = $row['primeiro_nome'];
      $_SESSION['ultimo_nome'] = $row['ultimo_nome'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['contacto'] = $row['contacto'];
      $_SESSION['nus'] = $row['nus'];
      $_SESSION['nascimento'] = $row['nascimento'];
      $_SESSION['nivel'] = $row['nivel'];
    }
  } else {
    $response = array('status' => 'error', 'errors' => $errors);
  }

  header('Content-Type: application/json');
  echo json_encode($response);
  mysqli_close($db);
}
