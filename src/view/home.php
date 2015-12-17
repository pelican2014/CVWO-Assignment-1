<!DOCTYPE html>
<html lang="en">
  <head>

  	<?php
  	  include $_SERVER['DOCUMENT_ROOT']."/model/header.php";
  	?>

    <title>MarinaCare</title>
    <!-- Customised Styles -->
    <link rel="stylesheet" type="text/css" href="/static/css/home.css" media="screen">

  </head>


  <body>
    <!-- Modularised Sections -->
  	<?php
  	  include $_SERVER['DOCUMENT_ROOT']."/view/common/nav.php";
  	?>

  	<!-- CONTENT -->
  	<div class="container">
      <!--home page message-->
      <div class="jumbotron">
        <h2>Welcome to MarinaCare Official Blog</h2>
        <p>MarinaCare was established in 1996 to provide for the medical needs of families in the neighbourhood.</p>
        <p>We provide various healthcare schemes for different needs and organise exciting community activities that help you lead a healthy and active lifestyle.</p>
      </div>
	  </div>

	  <div class="illustration-photos">
      <div class="container">
        <h2>Our Programmes</h2>
        <div class="row">
          <div class="col-md-6">
            <div class="thumbnail">
              <img src="/static/img/image1.jpg">
            </div>
            <div class="thumbnail">
              <img src="/static/img/image2.jpg">
            </div>
          </div>
          <div class="col-md-6">
            <div class="thumbnail">
              <img src="/static/img/image3.jpg">
            </div>
            <div class="thumbnail">
              <img src="/static/img/image4.jpg">
            </div>
          </div>
        </div>
      </div>
	  </div>


  	<?php
  	  /* Footer */
      include $_SERVER['DOCUMENT_ROOT']."/view/common/footer.php";
  	  /* Bootstrap core JavaScript */
  	  include $_SERVER['DOCUMENT_ROOT']."/helpers/utils.php";
  	?>
  </body>
</html>