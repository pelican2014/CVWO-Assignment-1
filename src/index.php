<!DOCTYPE html>
<html lang="en">
  <head>

  	<?php
  	  include $_SERVER['DOCUMENT_ROOT']."/model/header.php";
  	?>

  </head>


  <body>
    <!-- Modularised Sections -->
  	<?php
  	  include $_SERVER['DOCUMENT_ROOT']."/view/common/nav.php";
  	?>

    <div id="page-content">
      <!-- initialize with home.php -->
      <!-- Switch page content with js -->
      <?php
        include $_SERVER['DOCUMENT_ROOT']."/view/home.php";
      ?>
    </div>

  	<?php
  	  /* Footer */
      include $_SERVER['DOCUMENT_ROOT']."/view/common/footer.php";
  	  /* Bootstrap core JavaScript */
  	  include $_SERVER['DOCUMENT_ROOT']."/helpers/utils.php";
  	?>
  </body>
</html>