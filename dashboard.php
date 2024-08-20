<?php

session_start();
require "config.php";

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Locker Box</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <!-- container start -->
  <div class="container">

    <!-- nav start -->
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
          Locker Box
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index_home.php" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="lockes.php" class="nav-link px-2">Lockers</a></li>
        <li><a href="#" class="nav-link px-2">About</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <?php if (!isset($_SESSION['user_id'])) { ?>
          <a href="login.php" class="btn btn-outline-primary me-2">Login</a>
          <a href="register.php" class="btn btn-primary">Sign-up</a>
        <?php } else { ?>
          <a href="logout.php" class="btn btn-danger">Logout</a>
        <?php } ?>
      </div>
    </header>
    <!-- nav end -->

    <div class="px-4 py-5 my-5 text-center">
      <?php
      if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
      }

      try {

        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        $userData = $stmt->fetch();
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }

      ?>
      <h1 class="display-5 fw-bold text-body-emphasis">Welcome, <?php echo $userData['username'] ?></h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Email : <?php echo $userData['email'] ?></p>
      </div>
    </div>

    <!-- products grid strat -->

    <!-- products grid end -->

    <?php include('footer.php'); ?>

  </div>
  <!-- container end -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>