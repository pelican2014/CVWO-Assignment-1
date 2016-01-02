<?php

namespace MCBlog\Utils {

    function createEditDeleteStrings($isLoggedIn, $post_id) {
        if ($isLoggedIn) {
            return '<div id=\'post-edit-delete\'><a href=\'/view/editPostPage.php?post_id=' . $post_id . '\'>Edit </a>
                    <a href=\'/model/delete_posts.php?post_id=' . $post_id . '\'> Delete</a></div>';
        } else {
            return '';
        }
    }

}