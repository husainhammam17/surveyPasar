<?php include "../includes/db.php"; ?>
<?php include "functions.php"; ?>

<?php ob_start(); ?>
<?php session_start(); ?>

<?php
if (isset($_SESSION['user_role'])) {

  if ($_SESSION['user_role'] !== 'surveyor') {
    header("location: ../index.php");
  }
} else {
  header("Location: ../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="jpg/png" href="../images/lpicon2.png">

  <style>
    .navbar {
      background: #f0b736;
      /* background: linear-gradient(to top right, #014daf, #16a75c); */
    }

    .navbar .navbar-brand,
    .navbar .navbar-brand .btn .fas {
      color: #292627;
    }

    #navbarResponsive .navbar-nav .nav-item .nav-link {
      color: #292627;
    }

    #wrapper .sidebar {
      background: #5f8671;
    }

    #wrapper .sidebar li a {
      color: #fff;
    }

    #wrapper .sidebar li .dropdown-menu .dropdown-item {
      color: #292627;
    }
  </style>

  <title>Surveyor Dashboard</title>

  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link href="css/sb-subscriber.css" rel="stylesheet">

  <script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>