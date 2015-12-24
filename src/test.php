<?php
// Connect to MySQL database
$mysqli = new mysqli("localhost", "Login", "qmHrjtJ5MqV2Rv4Y", "MCBlog");
if ($mysqli->connect_errno) {
  //echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  echo "Connection failed";
  exit;
}


// SQL Example for reference
 /* $mysqli->query("CREATE TABLE helloWorld
  (Name TEXT, Sex TEXT, Age INTEGER);"); */

// Another example for reference
/* $mysqli->query("INSERT INTO helloWorld (Name)
  VALUES ('Daniel');"); */


$userInput = $_POST["pw"];
if (!($queryRes  = $mysqli->query("SELECT * FROM password"))) {
  echo "query failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
$row       = $queryRes->fetch_assoc(); // Fetch the next row in an associative array where the keys are column names

/* Just gonna leave it here for reference purpose
foreach ($row as $key => $value) {
  echo $key . " is " . $value;
} // Turns out there is no auto-generated ID column
*/

$hash = $row["hash"];

// More tests for reference
/*
$mysqli->close();

foreach(hash_algos() as $key => $value) {
  echo $value . "<br>";
}
*/

// echo $hashResult = password_hash("Good luck and have fun!", PASSWORD_DEFAULT);

// Verify stored hash against plain-text password
if (password_verify($userInput, $hash)) {
  // Log user in
  echo "You are successfully logged in";
  $mysqli->close();
} else {
  $mysqli->close();
  header("Location: view/login.php?error=1");
  exit;
}

?>