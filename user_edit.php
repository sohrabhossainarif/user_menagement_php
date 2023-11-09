<?php
session_start();
if (!isset($_SESSION['auth'])) {
  header('Location:login.php');
}
require "layouts/db.php";

$id = $_GET['id'];
// seclet user 
if ($id && (int) $id) {

  $quary =  "SELECT id, name , email, photo , status , created_at FROM `users` WHERE id = $id";
  $result =  mysqli_query($connect, $quary);

  if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
  }
} else {
  header('Location:404.php');
}


// update user
$errors = [];

if (isset($_POST['submit'])) {
  $name = htmlentities(trim($_POST['name']));
  $email = htmlentities(trim($_POST['email']));
  $photo = $_FILES['photo'];
  // form validate start
  // photo validate start
  if ($photo['name']) {
    $type = ['png', 'jpg', 'jpeg',];
    $fileEx = explode('.', $photo['name']);
    if (!in_array(end($fileEx), $type)) {
      $errors['FileError'] = "Upload Your Photo png , jpg , jpeg Images Only!";
    } elseif ($photo['size'] > 2000000) {
      $errors['FileError'] = "Upload Your Photo 2 Megabyte Images Only!";
    } else {

      $path = "uploads/profile_photo/" . $data['photo'];
      if (file_exists($path) && $data['photo']) {
        unlink($path);
      }

      $photo_name = uniqid() . '.' . end($fileEx);
      move_uploaded_file($photo['tmp_name'], 'uploads/profile_photo/' . $photo_name);
    }
  } else {
    $photo_name = null;
  }

  if (empty($name)) {
    $errors['name_error'] = "Enter Your Name!";
  }
  if (empty($email)) {
    $errors['email_error'] = "Enter Your email!";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email_error'] = "Enter Your Valid Email";
  }
  if (empty($errors)) {
    $quary = "UPDATE `users`SET name='$name',email='$email',photo='$photo_name' WHERE id = $id ";
    $result =  mysqli_query($connect, $quary);
    if ($result) {
      $_SESSION['success_message']= "Usre Update SuccessFully!";
      header('Location: all_users.php');
    } else {
      $_SESSION['success_message']= "User Update Error! ";
    }
  }
}

include "view/user_edit.view.php";