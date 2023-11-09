<?php
include "layouts/header.php";
?>
<section class="mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h2>User Sign Up</h2>
          </div>
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="my-3">
                <input type="text" value="<?= $data['name'] ?>" name="name" class="form-control">
                <?php
                if (isset($errors['nameError'])) {
                  printf("<p class='text-danger'>%s</p>", $errors['nameError']);
                }
                ?>
              </div>
              <div class="my-3">
                <input type="email" value="<?= $data['email'] ?>" placeholder="Enter Your Email" name="email" class="form-control">
                <?php
                if (isset($errors['emailError'])) {
                  printf("<p class='text-danger'>%s</p>", $errors['emailError']);
                }
                ?>
              </div>
              <div class="my-3">
                <input type="file" name="photo" class="form-control">
                <?php
                if (isset($errors['FileError'])) {
                  printf("<p class='text-danger'>%s</p>", $errors['FileError']);
                }
                ?>
              </div>
              <div class="mt-4">
                <img src="uploads/profile_photo/<?= $data['photo'] ?>" alt="<?= $data['photo'] ?>" width="100px">
              </div>
              <div class="my-3">
                <button name="submit" class="form-control btn btn-sm btn-success">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>

<?php
include "layouts/footer.php";
?>