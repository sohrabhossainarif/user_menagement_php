<?php
require_once "layouts/header.php"
?>
<section class="mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <?php
        if (isset($success_message)) {
        ?>
          <div class="alert alert-success" role="alert">
            <p class="mb-0"><?= $success_message ?></p>
          </div>
        <?php
        }
        if (isset($error_message)) {
        ?>
          <div class="alert alert-danger" role="alert">
            <p class="mb-0"><?= $error_message ?></p>
          </div>
        <?php
        }
        ?>
        <div class="card">
          <div class="card-header">
            <h2>User Sign Up</h2>
          </div>
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="my-3">
                <input type="text" placeholder="Enter Your Name" name="name" class="form-control">
                <?php
                if (isset($errors['nameError'])) {
                  printf("<p class='text-danger'>%s</p>", $errors['nameError']);
                }
                ?>
              </div>
              <div class="my-3">
                <input type="email" placeholder="Enter Your Email" name="email" class="form-control">
                <?php
                if (isset($errors['emailError'])) {
                  printf("<p class='text-danger'>%s</p>", $errors['emailError']);
                }
                ?>
              </div>
              <div class="my-3">
                <input type="password" placeholder="Enter Your Password" name="password" class="form-control">
                <?php
                if (isset($errors['passwordError'])) {
                  printf("<p class='text-danger'>%s</p>", $errors['passwordError']);
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
              <div class="my-3">
                <button name="submit" class="form-control btn btn-sm btn-success">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<?php
require_once "layouts/footer.php"
?>