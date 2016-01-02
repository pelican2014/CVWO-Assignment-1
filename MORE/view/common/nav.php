    <!-- HTML code for Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" style="color:blue">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- clicking brand name is equivalent to clicking home tab -->
          <a class="navbar-brand" href="/view/home.php">MarinaCare</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li id="navbar-home"><a href="/view/home.php">Home</a></li>
            <li id="navbar-posts"><a href="/view/posts.php">Posts</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
              include_once $_SERVER['DOCUMENT_ROOT'] . '/view/common/nav-login-logout.php';
            ?>
          </ul>
        </div>
      </div>
    </nav>