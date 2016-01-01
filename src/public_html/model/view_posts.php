<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/../config.php';

// Connect to MySQL database
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_errno) {
  //echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  echo 'Connection failed';
  exit;
}

if (!($queryRes  = $mysqli->query("SELECT * FROM posts"))) {
	echo 'query failed: (' . $mysqli->errno . ') ' . $mysqli->error;
}


$posts = array();

// store posts information into an array
while ($row = $queryRes->fetch_assoc()) {

	array_push($posts, array('post_text' => $row['content'],
							 'post_datetime' => $row['datetime'],
		));

}

// sort array based on last modified date
for ($i = (count($posts) - 1); $i >= 0; $i--) {
	$post_text = $posts[$i]['post_text'];
	$post_date = $posts[$i]['post_datetime'];
	echo '<div class=\'jumbotron\'><p>' . $post_date . '</p><p>' . $post_text . '</p></div>';
}

$mysqli->close();