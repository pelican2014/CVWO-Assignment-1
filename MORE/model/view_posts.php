<?php

/**
* All users are able to view posts
*/

include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/../globals.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/model/db.php';


MCBlog\DB\sec_session_start();
if (MCBlog\DB\login_check()) {
	$isLoggedIn = true;
}


// Connect to MySQL database
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_errno) {
  exit;
}

$posts = MCBlog\DB\get_all_posts($mysqli);
// sort array based on last modified date
// TO DO
for ($i = (count($posts) - 1); $i >= 0; $i--) {
	$post_id       = $posts[$i]['post_id'];
	$post_topic    = $posts[$i]['post_topic'];
	$post_text     = $posts[$i]['post_text'];
	$post_datetime = $posts[$i]['post_datetime'];
	echo '<div class=\'jumbotron\'><h3 id=\'post-topic\'>' . $post_topic . '</h3><p id=\'post-datetime\'>'
	 . 'Last edited at: ' . $post_datetime . '</p><br><br><p>' . $post_text . '</p></div>';
}

$mysqli->close();