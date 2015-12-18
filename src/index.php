<!DOCTYPE html>
<html lang="en">
  <head>

  	<?php
  	  include_once $_SERVER['DOCUMENT_ROOT']."/model/header.php";
  	?>

  </head>


  <body>
    <!-- following structure adopted for sticky footer implementation -->
    <div id="wrapper">
      <div id="body">
        <!-- Modularised Sections -->
  	    <?php
  	      include_once $_SERVER['DOCUMENT_ROOT']."/view/common/nav.php";
  	    ?>

        <div id="page-content">
          <!-- initialize with home.php -->
          <!-- Switch page content with js -->
          <?php
            include_once $_SERVER['DOCUMENT_ROOT']."/view/home.php";
          ?>
        </div>
      </div>

      <div id="footer">
  	    <?php
          include_once $_SERVER['DOCUMENT_ROOT']."/view/common/footer.php";
  	    ?>
      </div>
    </div>

    <!--Bootstrap core JavaScript -->
    <?php
      include_once $_SERVER['DOCUMENT_ROOT']."/helpers/utils.php";
    ?>
  </body>
</html>