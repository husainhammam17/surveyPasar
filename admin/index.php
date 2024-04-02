<?php include "includes/header.php" ?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

  <!-- Sidebar -->
  <?php include "includes/sidebar.php" ?>

  <style>
    hr {
      width: 13%;
      border: solid 1px;
    }
  </style>

  <div id="content-wrapper">
    <div class="container-fluid">
      <!-- Page Content -->
      <center>
        <h2>Admin Panel</h2>
        <hr>
      </center>

      <?php

      $query = "SELECT * FROM users WHERE user_role = 'Surveyor' ";
      $select_all_surveyors = mysqli_query($connection, $query);
      $surveyor_count = mysqli_num_rows($select_all_surveyors);

      ?>


      <div class="row">
        <script type="text/javascript">
          google.charts.load('current', {
            'packages': ['bar']
          });
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Data', 'Count'],

              <?php
              $element_text = ['All Posts', 'Active Posts', 'Draft Post', 'Comments', 'Hide Comments', 'Users', 'Surveyor', 'Categories'];
              $element_count = [$post_count, $post_published_count, $post_draft_count, $comment_count, $hide_comments_count, $user_count, $surveyor_count, $category_count];
              for ($i = 0; $i < 8; $i++) {
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
              }
              ?>

            ]);
            var options = {
              chart: {
                title: '',
                subtitle: '',
              }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        </script>
        <div class="ml-3 mt-4 mr-3" id="columnchart_material" style="width: 1400px; height: 500px;"></div>

      </div>



    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>