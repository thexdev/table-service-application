<?php
if (isset($_POST['selesai_pembayaran'])) {
  // call database connection
  require_once '../config/database.php';

  // retrive data from `process order`
  $pesanan = mysqli_real_escape_string($db, $_POST['id_pesanan']);
  $diskon = (float) mysqli_real_escape_string($db, $_POST['diskon']);
  $tanggal = date('d/m/y');
  $total_bayar = (int) mysqli_real_escape_string($db, $_POST['total_bayar']);

  // create data
  $query = "INSERT INTO transaksi VALUES ('', '$pesanan', '$diskon', '$tanggal', '$total_bayar')";
  $sql = mysqli_query($db, $query);

  mysqli_query($db, "UPDATE pesanan SET status = 'Sukses' WHERE id_pesanan = $pesanan");

  if ($sql) {
    header('location: http://localhost/restosaya/resto-kasir/dashboard.php?page=transaksi');
  } else {
    header('location: http://localhost/restosaya/resto-kasir/dashboard.php?page=transaksi');
  }
} else {
  header('location: http://localhot/restosaya/resto-kasir/dashboard.php?page=pesanan');
}
