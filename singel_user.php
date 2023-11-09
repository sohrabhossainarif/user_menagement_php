<?php
session_start();
if (!isset($_SESSION['auth'])) {
  header('Location:login.php');
}
require_once "layouts/db.php";

$id = $_GET['id'];

if ($id && (int) $id) {
  $quary =  "SELECT id, name , email, photo , status , created_at FROM `users` WHERE id = $id";
  $result =  mysqli_query($connect, $quary);

  if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
  }
} else {
  header('location:404.php');
}

include "view/singel_user_view.php";
