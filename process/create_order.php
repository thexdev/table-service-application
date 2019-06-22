<?php
// check the data was submitted or not
if (isset($_POST['buat_pesanan'])) {
  // call database connection
  require_once '../config/database.php';

  // retrive data from `pesanan` page
  $nama_pemesan = mysqli_real_escape_string($db, ucwords($_POST['nama_pemesan']));
  $order = mysqli_real_escape_string($db, $_POST['order']);
  $qtt = (int) mysqli_real_escape_string($db, $_POST['qtt']);

  // create new order
  $query = "INSERT INTO pesanan VALUES ('', '$nama_pemesan', '$order', '$qtt', 'Proses')";
  $sql = mysqli_query($db, $query);

  // check the data was inserted or not
  if ($sql) {
    header('location: http://localhost/restosaya/resto-kasir/dashboard.php?page=pesanan');
  }
  else {
    header('location: http://localhost/restosaya/resto-kasir/dashboard.php?page=pesanan');
  }
}
else {
  // if not submitted
  header('location: http://localhost/restosaya/');
}
