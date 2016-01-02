<?php

/**
* All users are able to view posts but only admin will see EDIT and DELETE hypertexts
*/

// include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/../globals.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/model/db.php';

if (\MCBlog\DB\login_check()) {
	$isLoggedIn = true;
}


// Connect to MySQL database
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_errno) {
  exit;
}

// Echo retrieved strings from database
$posts_html = \MCBlog\DB\get_posts_html_array($mysqli);
foreach ($posts_html as $string) {
	echo $string;
}