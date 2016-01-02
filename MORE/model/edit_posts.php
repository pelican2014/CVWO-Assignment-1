<?php

/**
* Only admin is able to post posts
*/

include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/../globals.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/model/db.php';

MCBlog\DB\sec_session_start();

if (MCBlog\DB\login_check()) {

	$post_id = $_GET['post_id'];

	// Connect to MySQL database
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	if ($mysqli->connect_errno) {
	  exit;
	}

	$inputTopic = $_POST['post-topic'];
	$inputText  = $_POST['post-text'];
	$procText  = nl2br($userInput);

	$datetime = new DateTime(NULL, new DateTimeZone('Asia/Singapore'));
	$datetime_str = $datetime->format('Y-m-d H:i:s');

	/* Prepared statement, stage 1: prepare */
	if (!($stmt = $mysqli->prepare('UPDATE posts(topic, content, datetime) 
									SET (?, ?, STR_TO_DATE(?, \'%Y-%m-%d %H:%i:%s\'))
									WHERE post_id = ?'))) {
	    exit;
	}

	/* Prepared statement, stage 2: bind and execute */
	if (!$stmt->bind_param('sssi', $inputTopic, $procText, $datetime_str, $post_id)) {
	    exit;
	}
	if (!$stmt->execute()) {
	    exit;
	}
}

header('Location: /view/posts.php');