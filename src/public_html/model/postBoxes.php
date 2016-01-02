<?php

namespace MCBlog {

	// include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/../globals.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/model/db.php';

	function createPostBox() {
		/**
		*  Show box to post a post if user is logged in as admin
		*/
		if (\MCBlog\DB\login_check()) {

			return '<p>You are logged in as admin. You can now post onto this page.</p>
				 <br>
				 <form id=\'post-form\' method=\'post\' action=\'/model/create_posts.php\'>
				 <h4>Title:</h4>
				 <input type=\'text\' name=\'post-topic\' class=\'boxsizingBorder\'>
				 <br><br>
				 <h4>Content:</h4>
				 <textarea name=\'post-text\' class=\'boxsizingBorder\' rows=10 form=\'post-form\'></textarea>
				 <br><br>
				 <input type=\'submit\' value=\'Post\'>
				 </form>';

		} else {
			return '<p>Log in as admin to create, edit or delete posts.</p>';
		}
	}


	function editPostBox($mysqli, $post_id) {
		/**
		*  Box with default messages from database
		*/
		if (\MCBlog\DB\login_check()) {

			$post_info = \MCBlog\DB\get_post_info($post_id, $mysqli);

			return '<br>
					<form id=\'post-form\' method=\'post\' action=\'/model/edit_posts.php?post_id=' . $post_id . '\'>
				 	<h4>Title:</h4>
				 	<input type=\'text\' name=\'post-topic\' value=\'' . $post_info['post_topic'] . '\' class=\'boxsizingBorder\'>
				 	<br><br>
				 	<h4>Content:</h4>
				 	<textarea name=\'post-text\' class=\'boxsizingBorder\' rows=10 form=\'post-form\'>' . $post_info['post_text'] . '</textarea>
				 	<br><br>
				 	<input type=\'submit\' value=\'Confirm\'>
				 	</form>';

		} else {
			return '';
		}
	}


}