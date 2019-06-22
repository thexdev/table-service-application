<?php

if (isset($_POST['edit_pesanan'])) {
  // call database connection
  require_once '../config/database.php';

  // create data
  $id_pesanan   = $_GET['id'];
  $nama_pemesan = mysqli_real_escape_string($db, ucwords($_POST['nama_pemesan']));
  $order        = mysqli_real_escape_string($db, $_POST['order']);
  $qtt          = (int) mysqli_real_escape_string($db, $_POST['qtt']);

  // update data from database
  $query = "UPDATE pesanan SET nama_pemesan = '$nama_pemesan', menu = '$order', qtt = '$qtt' WHERE id_pesanan = '$id_pesanan'";
  $sql   = mysqli_query($db, $query);

  if ($sql) {
    header('location: http://localhost/restosaya/resto-kasir/dashboard.php?page=pesanan');
  }
  else {
    header('location: http://localhost/restosaya/resto-kasir/dashboard.php?page=pesanan');
  }
}
else {
  header('location: http://localhost/restosaya/resto-kasir/dashboard.php?page=pesanan');
}
