<?php
session_start();
include "layouts/db.php";
$id = $_GET['id'];
if ($id && (int) $id) {
  $selectquary =  "SELECT id,status FROM `users` WHERE id = $id";
  $result =  mysqli_query($connect, $selectquary);

  if (mysqli_num_rows($result) > 0){
    $data = mysqli_fetch_assoc($result);
  }
  if($data['status'] == 1 ){
    $quary =  "UPDATE `users` SET status = 2 WHERE id = $id";
    $result =  mysqli_query($connect, $quary);
    header('Location:all_users.php');
  }else{
    $quary =  "UPDATE `users`  SET status = 1 WHERE id = $id";
    $result =  mysqli_query($connect, $quary);
    header('Location:all_users.php');
  }
}else{
  header('Location:404.php');
}
