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
        <!-- Modularised Sections -->
        <?php
          include_once $_SERVER['DOCUMENT_ROOT'].'/view/common/nav.php';
        ?>

        <div id='page-content'>

          <!-- Posts page content -->
          <div class='container' id='login-page'>
            <!--home page message-->
            <div class='jumbotron' id='login-box'>
              <br>
              <fieldset>
                <legend>Admin Login</legend>
                <form action='/model/login_processing.php' method='post'>
                  <p>Password: <input type='text' name='pw'> </p>
                  <p>Hint: Last line of assignment 2</p>

                  <?php
                  if (isset($_GET['error'])) {
                    if ($_GET['error'] === '1') {
                      echo '<p id=\'warning\'>The password is incorrect</p>';
                    } elseif ($_GET['error'] === '2') {
                      echo '<p id=\'warning\'>You have attempted too many times. Try again in 15 minutes.</p>';
                    }
                  }
                  ?>
                  <br>
                  <input type='submit' value='Submit'>
                </form>
              </fieldset>
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
      include_once $_SERVER['DOCUMENT_ROOT'].'/helpers/enableBootstrap.php';
    ?>
  </body>
</html>