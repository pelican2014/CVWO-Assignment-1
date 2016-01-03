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
    ?>

  </head>


  <body>
    <!-- following structure adopted for sticky footer implementation -->
    <div id='wrapper'>
      <div id='body'>
        <!-- Navigation bar-->
        <?php
          include_once $_SERVER['DOCUMENT_ROOT'].'/view/common/nav.php';
        ?>

        <div id='page-content'>

          <!-- Home page content -->
          <div class='container' id='home-page'>
            <!--home page message-->
            <div class='jumbotron'>
              <h2>Welcome to the Official Blog of MarinaCare</h2>
              <p>MarinaCare was established in 1996 to provide for the medical needs of families in the neighbourhood.</p>
              <p>We provide various healthcare schemes for different needs and organise exciting community activities to help you lead a healthy and active lifestyle.</p>
              <p>*Disclaimer: MarinaCare is a fictitious brand name in this project</p>
            </div>
          </div>

          <div class='illustration-photos'>
            <div class='container'>
              <h2>Our Programmes</h2>
              <div class='row'>
                <div class='col-md-6'>
                  <div class='thumbnail'>
                    <img src='/static/img/image1.jpg'>
                  </div>
                  <div class='thumbnail'>
                    <img src='/static/img/image2.jpg'>
                  </div>
                </div>
                <div class='col-md-6'>
                  <div class='thumbnail'>
                    <img src='/static/img/image3.jpg'>
                  </div>
                  <div class='thumbnail'>
                    <img src='/static/img/image4.jpg'>
                  </div>
                </div>
              </div>
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
      include_once $_SERVER['DOCUMENT_ROOT'].'/helpers/js.php';
    ?>
  </body>
</html>