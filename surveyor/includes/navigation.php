<style>
  .nav-item .logout {
    color: #292627;
    text-decoration: none;
  }
</style>
<nav class="navbar navbar-expand-lg static-top">
  <a class="navbar-brand mr-1" href="index.php">
    <?php
    echo $_SESSION['user_firstname'] . ' ' . $_SESSION['user_lastname'];
    // echo '<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    //             <i class="fas fa-bars"></i>
    //           </button>';
    ?>
  </a>


  <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="logout" href="../includes/logout.php"><i class="fas fa-power-off"></i> Logout</a>
      </li>
    </ul>
  </div>
</nav>