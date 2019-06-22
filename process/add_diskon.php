<?php

// check the data was submitted or not
if (isset($_POST['tambah_diskon'])) {
  // call database connection
  require_once '../config/database.php';

  // retrive data from `dashboard` / `diskon` page
  $nama_diskon   = mysqli_real_escape_string($db, ucwords($_POST['nama_diskon']));
  $jumlah_diskon = (float) mysqli_real_escape_string($db, $_POST['jumlah_diskon']);
  $status_diskon = mysqli_real_escape_string($db, $_POST['status']);

  // insert data to database
  $query = "INSERT INTO `diskon` VALUES ('', '$nama_diskon', '$jumlah_diskon', '$status_diskon')";
  $sql   = mysqli_query($db, $query);

  // check the data has inserted or not
  if ($sql) {
    // if was inserted
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=diskon');
  }
  else {
    // if didn't inserted
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=diskon');
  }
}
else {
  // if not, go to `admin` dashboard
  header('location: http://localhost/restosaya/resto-admin/dashboard.php');
}
