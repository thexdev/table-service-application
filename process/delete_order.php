<?php

if (isset($_GET['id'])) {
  // call database connection
  require_once '../config/database.php';

  // create data
  $id_pesanan = $_GET['id'];
  $query = "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan'";
  $sql = mysqli_query($db, $query);

  // check if data was deleted or not
  if ($sql) {
    header('location: http://localhost/restosaya/resto-kasir/dashboard.php?page=pesanan');
  } else {
    header('location: http://localhost/restosaya/resto-kasir/dashboard.php?page=pesanan');
  }
} else {
  header('location: http://localhost/restosaya/resto-kasir/dashboard.php?page=pesanan');
}
