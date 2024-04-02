<?php include "includes/header.php" ?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

    <!-- Sidebar -->
    <?php include "includes/sidebar.php" ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <?php

            if (isset($_GET['source'])) {
                $source = $_GET['source'];
            } else {
                $source = '';
            }

            switch ($source) {
                case 'tabel_bandar';
                    include "includes/tabel_bandar.php";
                    break;

                case 'tabel_pahing';
                    include "includes/tabel_pahing.php";
                    break;

                case 'tabel_setonobetek';
                    include "includes/tabel_setonobetek.php";
                    break;
            }

            ?>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>