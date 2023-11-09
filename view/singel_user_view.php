<?php
require_once "layouts/header.php"
?>
<section class="mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h1>singel user view page</h1>
        <div class="table-responsive">
          <table class="table table-primary">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">photo</th>
              </tr>
            </thead>
            <tbody>
              <tr class="">
                <td scope="row">
                  <h4><?= $data['id'] ?></h4>
                </td>
                <td scope="row">
                  <h4><?= $data['name'] ?></h4>
                </td>
                <td>
                  <h4><?= $data['email'] ?></h4>
                </td>
                <td><?php
                    if ($data['photo']) {
                    ?>
                    <img src="uploads/profile_photo/<?= $data['photo'] ?>" alt="<?= $data['photo'] ?>" width="100px">
                  <?php
                    } else {
                      echo "--";
                    }
                  ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  <?php
  require_once "layouts/footer.php"
  ?>