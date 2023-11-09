<?php
require_once "layouts/header.php"
?>
<section class="mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
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
            <h2>User login</h2>
          </div>
          <div class="card-body">
            <form action="" method="POST">
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
                <button name="submit" class="form-control btn btn-sm btn-success">Login</button>
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