<?php

// check the data was submitted or not
if (isset($_POST['tambah_menu'])) {
  // call database connection
  require_once '../config/database.php';

  // retrive data from `dashboard` / `main` page
  $nama_menu = mysqli_real_escape_string($db, ucwords($_POST['nama_menu']));
  $harga_menu = (int) mysqli_real_escape_string($db, $_POST['harga']);

  // insert data to database
  $query = "INSERT INTO `menu` VALUES (NULL, '$nama_menu', '$harga_menu')";
  $sql = mysqli_query($db, $query);

  // check the data has inserted or not
  if ($sql) {
    // if was inserted
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=menu');
  } else {
    // if didn't inserted
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=menu');
  }
} else {
  // if not, go to `admin` dashboard
  header('location: http://localhost/restosaya/resto-admin/dashboard.php');
}
