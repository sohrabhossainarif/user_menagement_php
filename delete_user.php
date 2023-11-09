<?php
session_start();
if (!isset($_SESSION['auth'])) {
  header('Location:login.php');
}
include "layouts/db.php";
$id = $_GET['id'];
if ($id && (int) $id){
  // select Query
  if ($id && (int) $id) {
    $selectquary =  "SELECT id, name , email, photo , status , created_at FROM `users` WHERE id = $id";
    $select_result =  mysqli_query($connect, $selectquary);

    if (mysqli_num_rows($select_result) > 0) {
      $data = mysqli_fetch_assoc($select_result);
    }
    $path = "uploads/profile_photo/".$data['photo'];
    if(file_exists($path)&&$data['photo']){
      unlink($path);
    }
  }
  // Delete Query
  $query = "DELETE FROM `users` WHERE id= $id";
  $result = mysqli_query($connect, $query);
  if ($result) {
    header('Location:all_usres.php');
  } else {
    header('location:404.php');
  }
} else {
  header('Location:404.php');
}
