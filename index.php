<?php 

 session_start();

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
    <?php include('nav.php'); ?>
    <!-- nav end -->
    <!-- top-line -->
    <div class="px-4 py-5 my-5 text-center">
      <h1 class="display-5 fw-bold text-body-emphasis">Please Sign in</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Locker box is a locker for storing things that is safe, durable and has a simple design that focuses on use and ease of use..</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        </div>
      </div>
    </div>
    <!-- top-line -->

    <!-- products grid strat -->

    <!-- products grid end -->

    <?php include('footer.php'); ?>

  </div>
  <!-- container end -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>