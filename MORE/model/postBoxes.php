<?php

namespace MCBlog {

	include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/../globals.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/model/db.php';

	function createPostBox() {
		/**
		*  Show box to post a post if user is logged in as admin
		*/
		MCBlog\DB\sec_session_start();
		if (MCBlog\DB\login_check()) {

			return '<p>You are logged in as admin. You can now post onto this page.</p>
				 <form id=\'post-form\' method=\'post\' action=\'/model/create_posts.php\'>
				 <input type=\'text\' name=\'post-topic\'>
				 <textarea name=\'post-text\' class=\'boxsizingBorder\' rows=10 form=\'post-form\'></textarea>
				 <input type=\'submit\' value=\'Submit\'>
				 </form>';

		} else {
			return '<p>Log in as admin to create, edit or delete posts.</p>';
		}
	}


	function editPostBox($post_id) {
		/**
		*  Box with default messages from database
		*/
		MCBlog\DB\sec_session_start();
		if (MCBlog\DB\login_check()) {

			$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
			if ($mysqli->connect_errno) {
			  return '';
			}

			$post_info = MCBlog\DB\get_post_info(intval($post_id), $mysqli);

			return '<form id=\'post-form\' method=\'post\' action=\'/model/edit_posts.php?post_id=' . $post_id . '\'>
				 <input type=\'text\' name=\'post-topic\' value=\'' . $post_info['post_topic'] . '\'>
				 <textarea name=\'post-text\' class=\'boxsizingBorder\' rows=10 form=\'post-form\' value=\'' . $post_info['post_text'] . '\'></textarea>
				 <input type=\'submit\' value=\'Submit\'>
				 </form>';

		} else {
			return '';
		}
	}


}