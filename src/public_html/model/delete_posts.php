<?php

/**
* Only admin is able to edit posts
*/

include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/../globals.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/model/db.php';

MCBlog\DB\sec_session_start();

if (MCBlog\DB\login_check()) {

	$post_id = intval($_GET['post_id']);

	// Connect to MySQL database
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	if ($mysqli->connect_errno) {
	  exit;
	}

	if (!($stmt = $mysqli->prepare('DELETE FROM posts WHERE post_id = ?;'))) {
	    exit;
	}
	if (!$stmt->bind_param('i', $post_id)) {
	    exit;
	}
	if (!$stmt->execute()) {
	    exit;
	}
}

header('Location: /view/posts.php');