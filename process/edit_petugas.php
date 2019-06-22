<?php

if (isset($_POST['edit_user'])) {
  // call database connection
  require_once '../config/database.php';

  // create data
  $id_user      = $_GET['id'];
  $nama_lengkap = mysqli_real_escape_string($db, ucwords($_POST['nama_lengkap']));
  $email        = mysqli_real_escape_string($db, $_POST['email']);
  $password     = mysqli_real_escape_string($db, md5($_POST['password']));

  if (!empty($password)) {
    $query = "UPDATE user SET username = '$nama_lengkap', email = '$email', password = '$password' WHERE id_user = '$id_user'";
  }
  else {
    $query = "UPDATE user SET username = '$nama_lengkap', email = '$email' WHERE id_user = '$id_user'";
  }

  $sql = mysqli_query($db, $query);

  // update data from database
  if ($sql) {
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=petugas');
  }
  else {
    header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=petugas');
  }
}
else {
  header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=petugas');
}
