<?php

// check the data was submitted or not
if (isset($_POST['edit_profil'])) {
  // call database connection
  require_once '../config/database.php';

  // retrive data from `dashboard` / `diskon` page
  $id_user       = $_GET['id'];
  $nama_lengkap  = mysqli_real_escape_string($db, ucwords($_POST['nama_lengkap']));
  $email         = mysqli_real_escape_string($db, $_POST['email']);
  $password      = mysqli_real_escape_string($db, md5($_POST['password']));

  if (!empty($password)) {
    $query = "UPDATE `user` SET username = '$nama_lengkap', email = '$email', password = '$password' WHERE id_user = '$id_user'";
  }
  else {
    $query = "UPDATE `user` SET username = '$nama_lengkap', email = '$email' WHERE id_user = '$id_user'";
  }

  // update data to database
  $sql = mysqli_query($db, $query);

  // check the data has updated or not
  if ($sql) {
    // if was updated
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=profil');
  }
  else {
    // if didn't updated
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=profil');
  }
}
else {
  // if not, go to `admin` dashboard
  header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=profil');
}
