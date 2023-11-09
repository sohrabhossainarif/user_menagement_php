<?php
session_start();
require "layouts/db.php";

$errors = [];
if (isset($_POST['submit'])) {
  $old_password = htmlentities(trim($_POST['old_password']));
  $new_password = htmlentities(trim($_POST['new_password']));
  $encpass = md5($old_password , $new_password);

  // form validate start
  if (empty($password)) {
    $errors['passwordError'] = "Enter Your Password!";
  }
  echo   $old_password;
  // form validate end

  if (empty($errors)) {
    $selectquary =  "SELECT id, name , email,photo , status , created_at FROM `users` WHERE password = $old_password";
    $select_result =  mysqli_query($connect, $selectquary);

    
    if (mysqli_num_rows($select_result) > 0) {
      $quary = "UPDATE `users`SET password='$new_password' WHERE id = $id ";
      $result =  mysqli_query($connect, $quary);
    } else {
      $error_message = 'User Not Found';
    }
  }
}

include "view/password.view.php";
