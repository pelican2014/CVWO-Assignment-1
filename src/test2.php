<?php
// Connect to MySQL database
$mysqli = new mysqli("localhost", "addPost", "rQYfVW32svRaLeXL", "MCBlog");
if ($mysqli->connect_errno) {
  //echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  echo "Connection failed";
  exit;
}

$userInput = $_POST["post-text"];
$procInput = nl2br($userInput);
/* Prepared statement, stage 1: prepare */

$date = new DateTime(NULL, new DateTimeZone("Asia/Singapore"));
$date_str = $date->format("Y-m-d h:i:s");


if (!($stmt = $mysqli->prepare("INSERT INTO posts(content, date) VALUES (?, STR_TO_DATE(?, '%Y-%m-%d %h:%i:%s'))"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

/* Prepared statement, stage 2: bind and execute */
if (!$stmt->bind_param("ss", $procInput, $date_str)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$mysqli->close();


?>