<?php
  // Start a session
  include_once $_SERVER['DOCUMENT_ROOT'].'/model/db.php';
  \MCBlog\DB\sec_session_start();
?>

<!DOCTYPE html>
<html lang='en'>
  <head>

  	<?php
      // Set up the page
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
        <!-- navbar -->
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
                echo MCBlog\createPostBox();
              ?>
  		      </div>
            <!-- Displaying posts -->
            <?php
              include_once $_SERVER['DOCUMENT_ROOT'] . '/model/db.php';
              $posts_html = \MCBlog\DB\get_posts_html_array($mysqli);
              foreach ($posts_html as $each_post_html_string) {
                echo $each_post_html_string;
              }
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
      include_once $_SERVER['DOCUMENT_ROOT'].'/helpers/js.php';
    ?>
  </body>
</html>