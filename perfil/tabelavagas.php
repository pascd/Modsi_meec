<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $vacina = $_POST['vacina'];
  
  $sel_sql_3 = "SELECT * FROM vagas WHERE vacina='$vacina'";
  $ans_3 = mysqli_query($db, $sel_sql_3);
  
  $vagas = array();
  while ($row_3 = mysqli_fetch_assoc($ans_3)) {
    $vagas[] = $row_3;
  }
  
  header('Content-Type: application/json');
  echo json_encode($vagas);
}

?>