<?php

// check the data was submitted or not
if (isset($_POST['edit_menu'])) {
  // call database connection
  require_once '../config/database.php';

  // retrive data from `dashboard` / `menu` page
  $id_menu = $_GET['id'];
  $nama_menu = mysqli_real_escape_string($db, ucwords($_POST['nama_menu']));
  $harga_menu = (int) mysqli_real_escape_string($db, $_POST['harga']);

  // update data to database
  $query = "UPDATE `menu` SET nama_menu = '$nama_menu', harga_menu = '$harga_menu' WHERE id_menu = '$id_menu'";
  $sql = mysqli_query($db, $query);

  // check the data has updated or not
  if ($sql) {
    // if was updated
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=menu');
  } else {
    // if didn't updated
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=menu');
  }
} else {
  // if not, go to `admin` dashboard
  header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=menu');
}
