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

        	<!-- Posts page content -->
		    <div class='container' id='posts-page'>
		      <div class='jumbotron'>
		        <h2>Posts</h2>
            <?php
              include_once $_SERVER['DOCUMENT_ROOT'] . '/model/postBoxes.php';
              echo createLoginBox();
            ?>
		      </div>

          <!-- Displaying posts -->
          <?php
            include $_SERVER['DOCUMENT_ROOT'].'/model/view_posts.php';
          ?>

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