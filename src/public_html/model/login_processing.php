<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/../config.php';

// Connect to MySQL database
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_errno) {
  //echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
  echo 'Connection failed';
  exit;
}

$userInput = $_POST['pw'];
if (!($queryRes  = $mysqli->query('SELECT * FROM password'))) {
  echo 'query failed: (' . $mysqli->errno . ') ' . $mysqli->error;
}
$row       = $queryRes->fetch_assoc(); // Fetch the next row in an associative array where the keys are column names

$hash = $row['hash'];

// Verify stored hash against plain-text password
if (password_verify($userInput, $hash)) {
  // Log user in
  $mysqli->close();
  header('Location: /view/posts.php');
} else {
  $mysqli->close();
  header('Location: /view/login.php?error=1');
  exit;
}