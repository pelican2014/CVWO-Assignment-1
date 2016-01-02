<?php

namespace MCBlog\Utils {

    function createEditDeleteStrings($isLoggedIn, $post_id) {
        if ($isLoggedIn) {
            return '<a href=\'/view/editPostPage.php?post_id=' . $post_id . '\'>Edit </a>
                    <a href=\'/model/deletePost.php?post_id=' . $post_id . '\'> Delete</a>';
        } else {
            return '';
        }
    }

}