<?php
session_start();
require "layouts/db.php";
$errors = [];
if(isset($_POST['submit'])){
  $name = htmlentities(trim($_POST['name']));
  $email = htmlentities(trim($_POST['email']));
  $password = htmlentities(trim($_POST['password']));
  $photo = $_FILES['photo'];
  $encpass = md5($password);
// form validate start
  // photo validate start
  if($photo['name']){
    $type = ['png' , 'jpg' , 'jpeg',];
    $fileEx = explode('.', $photo['name']);
    if(!in_array(end($fileEx),$type)){
      $errors['FileError']= "Upload Your Photo png , jpg , jpeg Images Only!";
    }elseif($photo['size']> 2000000){
        $errors['FileError']= "Upload Your Photo 2 Megabyte Images Only!";
    }else{
      $photo_name = uniqid(). '.' . end($fileEx); 
      move_uploaded_file($photo['tmp_name'],'uploads/profile_photo/'.$photo_name);
    }

  }else{
    $photo_name = null ; 
  }
  // photo validate end

  if(empty($name)){
    $errors['nameError']= "Enter Your Name!";
  }
  if(empty($email)){
    $errors['emailError']= "Enter Your Email!";
  }elseif(!filter_var($email , FILTER_VALIDATE_EMAIL)){
    $errors['emailError']= "Enter Your Valid Email!";
  }

  if(empty($password)){
    $errors['passwordError']= "Enter Your Password!";
  }
// form validate end


  if(empty($errors)){
    $quary ="INSERT INTO `users`(`name`, `email`, `password`, `photo`) VALUES ('$name','$email','$encpass','$photo_name')";
  $result =  mysqli_query($connect, $quary);
  if($result){
    $success_message = 'User Insert SuccessFully! ';
  }else{
    $error_message = 'User Insert Error! ';
  }
  }
}

include "view/signup.view.php";