<?php

/**
* Implements login/logout tab depending on user login status
*/

// include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/model/db.php';

if (!(MCBlog\DB\login_check())) {
  // not logged in
  echo '<li id=\'navbar-login\'><a href=\'/view/login_page.php\'>Login<span class=\'sr-only\'>(current)</span></a></li>';
} else {
  echo '<li id=\'navbar-logout\'><a href=\'/model/logout_processing.php\'>Logout<span class=\'sr-only\'>(current)</span></a></li>';
}