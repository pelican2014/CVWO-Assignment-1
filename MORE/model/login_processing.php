<?php

/**
* Process password and redirect user accordingly
*/

include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/../globals.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/model/db.php';

MCBlog\DB\sec_session_start();

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_errno) {
  exit;
}

$userInput = $_POST['pw'];

$loginRes = MCBlog\DB\login($userInput, $mysqli);

if ($loginRes['isLocked']) {
  header('Location: /view/login.php?error=2');
} elseif ($loginRes['success']) {
  header('Location: /view/posts.php');
} else {
  header('Location: /view/login.php?error=1');
}