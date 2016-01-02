<!DOCTYPE html>
<html lang='en'>
  <head>

    <?php
      include_once $_SERVER['DOCUMENT_ROOT'].'/model/header.php';
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
            <?php
              include_once $_SERVER['DOCUMENT_ROOT'] . '/model/postBoxes.php';
              $post_id = $_GET['post_id'];
              echo editLoginBox($post_id);
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