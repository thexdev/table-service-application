<?php

if (!isset($_GET['id'])) {
  header('location: http://localhost/restosaya/');
}

// call database connection
require_once '../config/database.php';

// delete `diskon` by its id
$id_diskon = mysqli_real_escape_string($db, $_GET['id']);
$query = "DELETE FROM `diskon` WHERE id_diskon = '$id_diskon'";
$sql = mysqli_query($db, $query);

// check the data was deleted or not
if ($sql) {
  // if the data has deleted
  header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=diskon');
} else {
  // if the data didn't deleted
  header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=diskon');
}
