<?php
// Connect to MySQL database
$mysqli = new mysqli("localhost", "displayPost", "fye4thP6uCDSVTHQ", "MCBlog");
if ($mysqli->connect_errno) {
  //echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  echo "Connection failed";
  exit;
}

if (!($queryRes  = $mysqli->query("SELECT * FROM posts"))) {
	echo "query failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
$row       = $queryRes->fetch_assoc(); // Fetch the next row in an associative array where the keys are column names
$post_text = $row["content"];

$mysqli->close();

echo "<p>" . $post_text . "</p>";

?>