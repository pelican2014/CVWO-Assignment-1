<?php
  // Start a session
  include_once $_SERVER['DOCUMENT_ROOT'].'/model/db.php';
  \MCBlog\DB\sec_session_start();
?>

<!DOCTYPE html>
<html lang='en'>
  <head>

    <?php
      include_once $_SERVER['DOCUMENT_ROOT'].'/model/header.php';
      // Connect to MySQL database
      include_once $_SERVER['DOCUMENT_ROOT'].'/../globals.php';
      $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
      if ($mysqli->connect_errno) {
        exit;
      }
    ?>

  </head>


  <body>
    <!-- following structure adopted for sticky footer implementation -->
    <div id='wrapper'>
      <div id='body'>
        <!-- Modularised Sections -->
        <?php
          include_once $_SERVER['DOCUMENT_ROOT'].'/view/common/nav.php';
        ?>

        <div id='page-content'>

        <!-- Edit post box -->
        <div class='container' id='posts-page'>
          <div class='jumbotron'>
            <h2>Edit Post</h2>
            <?php
              include_once $_SERVER['DOCUMENT_ROOT'] . '/model/postBoxes.php';
              echo \MCBlog\editPostBox($mysqli, intval($_GET['post_id']));
            ?>
          </div>

        </div>



        </div>
      </div>

      <div id='footer'>
        <?php
          include_once $_SERVER['DOCUMENT_ROOT'].'/view/common/footer.php';
        ?>
      </div>
    </div>

    <!--Bootstrap core JavaScript -->
    <?php
      include_once $_SERVER['DOCUMENT_ROOT'].'/helpers/enableBootstrap.php';
    ?>
  </body>
</html>