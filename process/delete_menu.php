<?php

if (!isset($_GET['id'])) {
  header('location: http://localhost/restosaya/');
}

// call database connection
require_once '../config/database.php';

// delete `menu` by its id
$id_menu = mysqli_real_escape_string($db, $_GET['id']);
$query = "DELETE FROM `menu` WHERE id_menu = '$id_menu'";
$sql = mysqli_query($db, $query);

// check the data was deleted or not
if ($sql) {
  // if the data has deleted
  header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=menu');
} else {
  // if the data didn't deleted
  header('location: http://localhost/restosaya/resto-admin/dashboard.php?page=menu');
}
