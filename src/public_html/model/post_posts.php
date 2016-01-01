<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/../config.php';

// Connect to MySQL database
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_errno) {
  //echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
  echo 'Connection failed';
  exit;
}

$userInput = $_POST['post-text'];
$procInput = nl2br($userInput);
/* Prepared statement, stage 1: prepare */

$datetime = new DateTime(NULL, new DateTimeZone('Asia/Singapore'));
$datetime_str = $datetime->format('Y-m-d H:i:s');


if (!($stmt = $mysqli->prepare('INSERT INTO posts(content, datetime) VALUES (?, STR_TO_DATE(?, \'%Y-%m-%d %H:%i:%s\'))'))) {
    echo 'Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error;
}

/* Prepared statement, stage 2: bind and execute */
if (!$stmt->bind_param('ss', $procInput, $datetime_str)) {
    echo 'Binding parameters failed: (' . $stmt->errno . ') ' . $stmt->error;
}

if (!$stmt->execute()) {
    echo 'Execute failed: (' . $stmt->errno . ') ' . $stmt->error;
}

$mysqli->close();

header('Location: /view/posts.php');

exit;