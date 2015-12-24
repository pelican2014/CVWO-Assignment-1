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

        	<!-- Posts page content -->
		    <div class="container" id="posts-page">
		      <div class="jumbotron">
		        <h2>Test: Posts.</h2>
		        <textarea name="post-text" class="boxsizingBorder" rows=10 form="post-form"></textarea>
		        <form id="post-form" method="post" action="/test2.php">
		        	<input type="submit">
		        </form>

		        <!-- Displaying posts -->
		        <?php
		        include $_SERVER['DOCUMENT_ROOT']."/model/blog.php";
		        ?>

		      </div>
		    </div>



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