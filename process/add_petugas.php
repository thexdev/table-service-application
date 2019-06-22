<?php

// check the data was submitted or not
if (isset($_POST['tambah_petugas'])) {
  // call database connection
  require_once '../config/database.php';

  // retrive data from `dashboard` / `petugas` page
  $nama_lengkap   = mysqli_real_escape_string($db, ucwords($_POST['nama_lengkap']));
  $email          = mysqli_real_escape_string($db, $_POST['email']);
  $password       = mysqli_real_escape_string($db, md5($_POST['password']));

  // insert data to database
  $query = "INSERT INTO `user` VALUES ('', '$nama_lengkap', '$email', '$password', 'kasir')";
  $sql   = mysqli_query($db, $query);

  // check the data has inserted or not
  if ($sql) {
    // if was inserted
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=petugas');
  }
  else {
    // if didn't inserted
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=petugas');
  }
}
else {
  // if not, go to `admin` dashboard
  header('location: http://localhost/restosaya/resto-admin/dashboard.php');
}
