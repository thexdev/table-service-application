<?php

// check the data was submitted or not
if (isset($_POST['edit_diskon'])) {
  // call database connection
  require_once '../config/database.php';

  // retrive data from `dashboard` / `diskon` page
  $id_diskon     = $_GET['id'];
  $nama_diskon   = mysqli_real_escape_string($db, ucwords($_POST['nama_diskon']));
  $jumlah_diskon = (float) mysqli_real_escape_string($db, $_POST['edit_jumlah']);
  $status        = mysqli_real_escape_string($db, $_POST['status']);

  // update data to database
  $query      = "UPDATE `diskon` SET nama_diskon = '$nama_diskon', jumlah_diskon = '$jumlah_diskon', status = '$status' WHERE id_diskon = '$id_diskon'";
  $sql        = mysqli_query($db, $query);

  // check the data has updated or not
  if ($sql) {
    // if was updated
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=diskon');
  }
  else {
    // if didn't updated
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=diskon');
  }
}
else {
  // if not, go to `admin` dashboard
  header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=diskon');
}
