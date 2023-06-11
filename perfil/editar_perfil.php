<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

session_start();

$id = $_SESSION['id'];
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $Alterar_Senha = isset($_POST['alterar_senha']) ? $_POST['alterar_senha'] : 0;

  if ($Alterar_Senha == "Sim") {

    $Password_atual = $_POST['senha_atual'];
    $Nova_password = $_POST['nova_senha'];
    $Confirmar_password = $_POST['confirmar_senha'];

    if (empty($Password_atual)) {
      $errors['password_atual'] = "Password atual é necessária.";
    } else {
      $sel_sql = "SELECT * FROM users WHERE id_user='$id'";
      $ans = mysqli_query($db, $sel_sql);
      if (mysqli_num_fields($ans) > 0) {
        $row = mysqli_fetch_array($ans);
        $alt_senha = $row['alt_senha'];
        $senha = $row['pass'];

        if ($alt_senha == 1) {
          if ($Password_atual != $senha) {
            $errors['password_atual'] = "Password atual está incorreta.";
          }
        } else {
          if (!password_verify($Password_atual, $senha)) {
            $errors['password_atual'] = "Password atual está incorreta.";
          }
        }
      }
    }

    if (empty($Nova_password)) {
      $errors['nova_password'] = "Precisa inserir uma nova password.";
    } else if (strlen($Nova_password) < 8) {
      $errors['nova_password'] = "Password necessita de ter pelo menos 8 caracteres.";
    }

    if (empty($Confirmar_password)) {
      $errors['confirmar_password'] = "Confirme a password.";
    } else if ($Nova_password != $Confirmar_password) {
      $errors['confirmar_password'] = "Passwords nao coincidem.";
    }

    if (empty($errors)) {
      if ($alt_senha == 1) {
        $response = array('status' => 'success');
        $Hash = password_hash($Nova_password, PASSWORD_BCRYPT);
        $senha_alterada = 0;
        $query = "UPDATE users SET pass='$Hash', alt_senha='$senha_alterada' WHERE id_user=$id";
        mysqli_query($db, $query);
      } else {
        $response = array('status' => 'success');
        $Hash = password_hash($Nova_password, PASSWORD_BCRYPT);
        $query = "UPDATE users SET pass='$Hash' WHERE id_user=$id";
        mysqli_query($db, $query);
      }
    } else {
      $response = array('status' => 'error', 'errors' => $errors);
    }
  } else {
    $Email_new = $_POST['email'];
    $Telemovel_new = $_POST['telemovel'];

    if (empty($Email_new)) {
      $errors['email'] = "Email e necessario.";
    } else if (!filter_var($Email_new, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Utilize um formato valido de email.";
    } else {
      $sel_sql = "SELECT * FROM users WHERE email = '$Email_new'";
      $ans = mysqli_query($db, $sel_sql);
      if ($ans->num_rows > 1) {
        $errors['email'] = "Este email ja esta a ser utilizado.";
      }
    }

    if (empty($Telemovel_new)) {
      $errors['telemovel'] = "Telemovel e necessario.";
    } else if (!preg_match('/^[0-9]+$/', $Telemovel_new)) {
      $errors['telemovel'] = "Telemovel so pode conter numeros.";
    } else if (strlen($Telemovel_new) != 9) {
      $errors['telemovel'] = "Telemovel tem 9 digitos.";
    } else {
      $sel_sql = "SELECT * FROM users WHERE contacto = '$Telemovel_new'";
      $ans = mysqli_query($db, $sel_sql);
      if ($ans->num_rows > 1) {
        $errors['telemovel'] = "Este telemovel ja esta a ser utilizado.";
      }
    }

    if (empty($errors)) {
      $response = array('status' => 'success');
      $query = "UPDATE users SET email='$Email_new', contacto='$Telemovel_new' WHERE id_user=$id";
      mysqli_query($db, $query);
    } else {
      $response = array('status' => 'error', 'errors' => $errors);
    }
  }
  header('Content-Type: application/json');
  echo json_encode($response);
  mysqli_close($db);
}
