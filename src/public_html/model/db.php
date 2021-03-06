<?php

/**
* All functions are related to login purposes
*/

namespace MCBlog\DB {

    // include_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/../globals.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/utils.php';

    // start session securely
    function sec_session_start() {
        $session_name = 'MCBlog';
        $secure = SECURE;
        // This stops JavaScript being able to access the session id.
        $httponly = true;

        // Forces sessions to only use cookies.
        if (ini_set('session.use_only_cookies', 1) === FALSE) {
            header("Location: /index.php");
            exit();
        }

        $cookieParams = session_get_cookie_params();
        session_set_cookie_params($cookieParams["lifetime"],
            $cookieParams["path"], 
            $cookieParams["domain"], 
            $secure,
            $httponly);

        session_name($session_name);
        session_start();
        session_regenerate_id(true);    // regenerated the session, delete the old one.
    }


    // return an array recording down 2 booleans - success of login attempt and 
    function login($password, $mysqli) {
        if (!($queryRes  = $mysqli->query('SELECT * FROM password;'))) {
          exit;
        }
        $row       = $queryRes->fetch_assoc(); // Fetch the next row in an associative array where the keys are column names
        $hash = $row['hash'];

        if (checkbrute($mysqli)) {
            // Account is locked and login is forbidden
            return array(
                'success'  => false,
                'isLocked' => true,
                );
        } else {
            if (password_verify($password, $hash)) {
                // Password is correct
                $user_browser = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['login_string'] = hash('sha512', $user_browser);
                return array(
                    'success'  => true,
                    'isLocked' => false,
                    );
            } else {
                // Password is not correct
                $now = time();
                $mysqli->query('INSERT INTO login_attempts(time)
                                VALUES (' . $now . ');');
                return array(
                    'success'  => false,
                    'isLocked' => false,
                    );
            }
        }

    }


    function checkbrute($mysqli) {
        // Get timestamp of current time 
        $now = time();
     
        // All login attempts are counted from the past 15 minutes. 
        $valid_attempts = $now - (15 * 60);
     
        if ($queryRes = $mysqli->query('SELECT time
                                 FROM login_attempts
                                WHERE time > ' . $valid_attempts . ';')) {
     
            // If there have been more than 15 failed logins 
            if ($queryRes->num_rows > 15) {
                return true;
            } else {
                return false;
            }
        }
    }


    function login_check() {
        // Check if all session variables are set 
        if (isset($_SESSION['login_string'])) {

            $login_string = $_SESSION['login_string'];
     
            // Get the user-agent string of the user.
            $user_browser = $_SERVER['HTTP_USER_AGENT'];
            $login_check = hash('sha512', $user_browser);

            if ($login_check == $login_string) {
                // Logged In!!!! 
                return true;
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    }

    // return post info of the requested post_id stored in an array
    function get_post_info($post_id, $mysqli) {
        if (!($stmt = $mysqli->prepare('SELECT post_id, topic, content, datetime
                                        FROM posts
                                        WHERE post_id=?;'))) { 
            return NULL;
        }
        if (!$stmt->bind_param('i', $post_id)) {
            return NULL;
        }
        if (!$stmt->execute()) {
            return NULL;
        }
        $stmt->bind_result($post_id, $topic, $content, $datetime);

        $stmt->fetch();
        return array('post_id'       => $post_id,
                     'post_topic'    => $topic,
                     'post_text'     => $content,
                     'post_datetime' => $datetime,
                );
    }


    // return an array containing post info of all posts stored in arrays
    function get_all_posts($mysqli) {
        if (!($queryRes  = $mysqli->query('SELECT * FROM posts;'))) {
            return NULL;
        }
        $posts = array();
        while ($row = $queryRes->fetch_assoc()) {

            array_push($posts, array('post_id'       => $row['post_id'],
                                     'post_topic'    => $row['topic'],
                                     'post_text'     => $row['content'],
                                     'post_datetime' => $row['datetime'],
                ));
        }
        return $posts;   
    }

    // return an sorted array containing the html code of each post to be echoed
    function get_posts_html_array($mysqli) {

        $posts = \MCBlog\DB\get_all_posts($mysqli);

        // sort array based on last modified date
        function cmp($a, $b){
            $timestamp_a = strtotime($a['post_datetime']);
            $timestamp_b = strtotime($b['post_datetime']);
            if ($timestamp_a == $timestamp_b) {
                return 0;
            }
            return ($timestamp_a < $timestamp_b) ? -1 : 1;
        }

        if (!usort($posts, "MCBlog\DB\cmp")) {
            echo 'Sorting by timestamp failed.';
        }

        $result_array = array();

        for ($i = (count($posts) - 1); $i >= 0; $i--) {
            $post_id       = $posts[$i]['post_id'];
            $post_topic    = $posts[$i]['post_topic'];
            $post_text     = $posts[$i]['post_text'];
            $post_datetime = $posts[$i]['post_datetime'];

            // Check login status. If user is logged in as admin, s/he will see the EDIT/DELETE hypertexts
            array_push($result_array, '<div class=\'post-container\'><legend><h3 class=\'post-topic\'>' . $post_topic . '</h3>
                </legend>' . \MCBlog\Utils\createEditDeleteStrings(\MCBlog\DB\login_check(), $post_id)
                 . '<p class=\'post-datetime\'>'
             . 'Last edit at: ' . $post_datetime . '</p><br><br><p class=\'post-content\'>' . $post_text . '</p></div><br><br>');
        }

        return $result_array;
    }


}
