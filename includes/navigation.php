<style>
  .nav-item .nav-link:hover {
    color: var(--gold);
  }
</style>
<nav class="navbar navbar-expand-lg fixed-top mb-4">
  <div class="container">
    <img src="images/dp1.png" alt="" class="logo-brand">
    <!-- <a class="navbar-brand" href="index.php">Disperdagin</a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <?php
        if (!isset($_SESSION['user_role'])) {
          echo '<li class="nav-item "><a class="nav-link" href="login.php">Login</a></li>';
        }
        ?>
        <li class="nav-item ">
          <a class="nav-link" href="registration.php">Registration
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="contact.php">Contact
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>