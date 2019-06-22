<?php

if (!isset($_GET['id'])) {
  header('location: http://localhost/restosaya/');
}

// call database connection
require_once '../config/database.php';

// delete `user` by its id
$id_user = mysqli_real_escape_string($db, $_GET['id']);
$query   = "DELETE FROM `user` WHERE id_user = '$id_user'";
$sql     = mysqli_query($db, $query);

// check the data was deleted or not
if ($sql) {
  // if the data has deleted
  header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=petugas');
}
else {
  // if the data didn't deleted
  header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=petugas');
}
