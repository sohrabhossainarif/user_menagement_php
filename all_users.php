<?php
session_start();
if(!isset($_SESSION['auth'])){
  header('Location:login.php');
}
require "layouts/db.php";
$quary =  "SELECT id, name , email, photo , status , created_at FROM `users`";
$result =  mysqli_query($connect, $quary);

if (mysqli_num_rows($result) > 0) {
  $datas = mysqli_fetch_all($result, true);
}

include "view/all_users.view.php";