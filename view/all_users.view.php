<?php
require_once "layouts/header.php"
?>
<section class="mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <?php
        if(isset($_SESSION['success_message'])){
          ?>
          <div class="alert alert-success">
            <p><?=$_SESSION['success_message']?></p>
          </div>
          <?php
        }
        if(isset($_SESSION['error_message'])){
          ?>
          <div class="alert alert-danger">
            <p><?=$_SESSION['error_message']?></p>
          </div>
          <?php
        }
        ?>
      </div>
      <div class="col-lg-10">
        <h1>All Users Page</h1>
        <table class="table">
          <tr>
            <th>id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
          <?php
          foreach ($datas as $data) :
          ?>
            <tr>
              <td><?= $data['id'] ?></td>
              <td>
                <?php
                if ($data['photo']) {
                ?>
                  <img src="uploads/profile_photo/<?= $data['photo'] ?>" alt="<?= $data['photo'] ?>" width="60px">
                <?php
                } else {
                  echo "--";
                }
                ?>
              </td>
              <td><?= $data['name'] ?></td>
              <td><?= $data['email'] ?></td>
              <td>  
                <span class="badge bg-<?= $data['status'] == 1 ? "success" : "warning" ?>"><?= $data['status'] == 1 ? "Active": "Deactive" ?></span>
              </td> 

              <td><?= date('d M Y', strtotime($data['created_at'])) ?></td>
              <td>
                <a href="singel_user.php ?id=<?= $data['id'] ?>" class="btn btn-sm btn-primary">View</a>
                <a href="user_edit.php ?id=<?= $data['id'] ?>" class="btn btn-sm btn-success">Edit</a>
                <a href="delete_user.php ?id=<?= $data['id'] ?>" class="btn btn-sm btn-danger">Delete</a>    
                <a href="user_status.php ?id=<?= $data['id'] ?>" class="btn btn-sm btn-<?=$data['status']== 1 ? "warning": "success"?>"><?=$data['status']==1 ? "Deactive": "Active"?></a>    
            </tr>
          <?php
          endforeach;
          ?>
        </table>
      </div>
    </div>
  </div>
</section>
<?php
require_once "layouts/footer.php";
unset($_SESSION['success_message']);
?>