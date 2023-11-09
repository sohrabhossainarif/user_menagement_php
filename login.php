<?php
session_start();
require "layouts/db.php";

$errors = [];
if (isset($_POST['submit'])) {
  $email = htmlentities(trim($_POST['email']));
  $password = htmlentities(trim($_POST['password']));
  $encpass = md5($password);
  // form validate start
  if (empty($email)) {
    $errors['emailError'] = "Enter Your Email!";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['emailError'] = "Enter Your Valid Email!";
  }

  if (empty($password)) {
    $errors['passwordError'] = "Enter Your Password!";
  }
  // form validate end

  if (empty($errors)) {
    $selectquary =  "SELECT id, name , email,photo , status , created_at FROM `users` WHERE email = '$email' AND password = '$encpass'";
    $select_result =  mysqli_query($connect, $selectquary);

    if (mysqli_num_rows($select_result) > 0) {
    $data = mysqli_fetch_assoc($select_result);
    $_SESSION['auth']= $data;
    header('Location:all_users.php');
    }else{
      $error_message = 'User Not Found';
    }
  }
}

include "view/login.view.php";