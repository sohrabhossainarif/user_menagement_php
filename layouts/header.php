<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>User Menagement</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <?php
          if (isset($_SESSION['auth'])) :
          ?>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="all_users.php">All Users</a>
            </li>
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                if ($_SESSION['auth']['photo']) {

                ?>
                  <img width="30" class="rounded-circle" src="uploads/profile_photo/<?= ($_SESSION['auth']['photo']) ?>" alt="<?= $_SESSION['auth']['name'] ?>">
                <?php
                } else {

                  echo $_SESSION['auth']['name'];
                }
                ?>

              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page"><?= $_SESSION['auth']['name'] ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page"><?= $_SESSION['auth']['email'] ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="password.php">Change Password</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active bg-warning" aria-current="page" href="logout.php">Log Out</a>
                </li>
              </ul>
            </div>
          <?php
          endif;
          if (!isset($_SESSION['auth'])) :
          ?>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="login.php">Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>