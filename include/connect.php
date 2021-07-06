<?php

// error_reporting(0);

class Server
{

    public $con;

    // __construct method is connecting the page with database right when its called
    public function __construct($serverName, $userName, $password, $databaseName)
    {
        // Create Connection
        @$this->con = mysqli_connect($serverName, $userName, $password, $databaseName);

        // Check connection
        if (@!$this->con) {
            die("Connection failed: " . $this->con->connect_error);
        }

        // Creating Database and tables
        // else {
            // Create database
            // $sql = "CREATE DATABASE IF NOT EXISTS $databaseName";
            // $this->con->query($sql);

            // // Selecting Database
            // $this->con->query("use $databaseName");

            // // Create users Table
            // $sql2 = "CREATE TABLE IF NOT EXISTS `users` (
            //     `id` int(11) NOT NULL AUTO_INCREMENT,
            //     `user_name` varchar(255) NOT NULL,
            //     `full_name` varchar(255) NOT NULL,
            //     `password` varchar(255) NOT NULL,
            //     `email_id` varchar(255) NOT NULL,
            //     `profile_pic` varchar(255) DEFAULT 'img/default-profile.jpg',
            //     `cover_pic` varchar(255) DEFAULT 'img/default_cover.jpg',
            //     `Bio` varchar(1000) DEFAULT NULL,
            //     `Location` varchar(255) DEFAULT NULL,
            //     `Gender` varchar(255) DEFAULT NULL,
            //     `Birth_date` varchar(255) DEFAULT NULL,
            //     `joined_date` varchar(255) DEFAULT NULL,
            //     `privacy_status` varchar(255) DEFAULT 'Public',
            //     `viewed_till` int(11) DEFAULT '0',
            //     `followers` varchar(255) DEFAULT 'n_value',
            //     `following` varchar(255) DEFAULT 'n_value',
            //     `request_by` varchar(10000) DEFAULT '1:2',
            //     `user_images` varchar(10000) DEFAULT NULL,
            //     `blocked_by` varchar(10000) NOT NULL DEFAULT '1:2',
            //     `Notification` varchar(10000) DEFAULT NULL,
            //     PRIMARY KEY (`id`),
            //     UNIQUE KEY `Un_uname` (`user_name`),
            //     UNIQUE KEY `Un_email` (`email_id`)
            //     )";
            // $this->con->query($sql2);

            // // Create UsersPosts Table
            // $sql3 = "CREATE TABLE IF NOT EXISTS `user_posts` (
            //         `id` int(11) NOT NULL AUTO_INCREMENT,
            //         `user_id` int(11) NOT NULL,
            //         `post_username` varchar(255) NOT NULL,
            //         `post_fullname` varchar(255) NOT NULL,
            //         `post_userprofile_pic` varchar(255) NOT NULL,
            //         `post_time` datetime NOT NULL,
            //         `post_caption` varchar(1000) DEFAULT NULL,
            //         `post_img` varchar(255) DEFAULT NULL,
            //         `post_likers` varchar(255) DEFAULT NULL,
            //         `post_comments` varchar(10000) DEFAULT NULL,
            //         PRIMARY KEY (`id`)
            //         )";
            // $this->con->query($sql3);
        // }
    }

    public function fetch_results_array($operation)
    {
        return $results = mysqli_fetch_array($operation);
    }

    public function fetch_num_rows($operation)
    {
        return $num_rows = mysqli_num_rows($operation);
    }

    // this is to check the login information entered by the user
    public function login_information_check($userName, $password)
    {
        if (preg_match("/^@/", $userName)) {

            $results = $this->con->query("select id from users where user_name = '$userName'");

            if (mysqli_num_rows($results) == 1) {

                $results = $this->con->query("select * from users where user_name = '$userName' and password = '$password';");

                if (mysqli_num_rows($results) == 1) {

                    session_start();

                    $_SESSION['user_key'] = $results->fetch_array(MYSQLI_ASSOC);

                    return 'u1_p1';
                } else {
                    return 'u1_p0';
                }
            } else {
                return 'u0';
            }
        } else if (filter_var($userName, FILTER_VALIDATE_EMAIL)) {

            $results = $this->con->query("select id from users where email_id = '$userName'");

            if (mysqli_num_rows($results) == 1) {

                $results = $this->con->query("select * from users where email_id = '$userName' and password = '$password';");

                if (mysqli_num_rows($results) == 1) {

                    session_start();

                    $_SESSION['user_key'] = $results->fetch_array(MYSQLI_ASSOC);

                    // var_dump($_SESSION['user_key']);

                    return 'e1_p1';
                } else {
                    return 'e1_p0';
                }
            } else {
                return 'e0';
            }
        } else {
            return 'u0_e0';
        }
    }

    //    this method is checking whether the email entered is unique or not
    public function check_email($email)
    {
        $results = $this->con->query("select id from users where email_id = '$email'");

        return mysqli_num_rows($results);
    }

    public function check_username($username)
    {
        $results = $this->con->query("select id from users where user_name = '$username'");

        return mysqli_num_rows($results);
    }

    public function load_userid($userName)
    {

        $results = $this->con->query("select id from users WHERE user_name = '$userName'");

        if ($results) {
            return $results->fetch_array(MYSQLI_ASSOC)['id'];
        }
    }

    public function insert_user($username, $fullName, $password, $email, $joined_Date, $status)
    {
        $results = $this->con->query("insert into users(user_name, full_name, password, email_id, joined_date, privacy_status) values('$username', '$fullName', '$password', '$email', '$joined_Date', '$status')");

        if ($results) {

            $user_id = $this->load_userid($username);

            $view = $this->con->query("create view userid_$user_id as select id, user_id, post_username, post_fullname, post_userprofile_pic, post_time, post_caption, post_img, post_likers, post_comments from user_posts where user_id = $user_id");

            // session_start();

            if ($view) {
                return "Inserted";
            }
        }
    }

    public function load_post($user_id, $php_date)
    {
        $results = $this->con->query("select * from user_posts where user_id = $user_id and post_time = '$php_date'");

        return $results->fetch_array(MYSQLI_ASSOC);
    }

    // This method insert new post created by the users then return the same post by calling load_post method
    public function insert_post($user_id, $post_username, $post_fullname, $post_userprofile_pic, $Post_Caption, $Post_Image, $php_date)
    {
        $results = $this->con->query("insert into user_posts(user_id, post_username, post_fullname, post_userprofile_pic, post_time, post_caption, post_img) values($user_id, '$post_username', '$post_fullname', '$post_userprofile_pic', '$php_date', '$Post_Caption', '$Post_Image')");

        if ($results) {
            return $this->load_post($user_id, $php_date);
        } else {
            echo 'wrong';
        }
    }

    public function load_userView($userid)
    {

        return $results = $this->con->query("select * from userid_$userid order by id desc");
    }

    public function load_user_on_search($user_id)
    {
        return $results = $this->con->query("select id, user_name, full_name, profile_pic, followers, privacy_status from users where not id = $user_id");
    }

    public function load_user_profile($userId)
    {

        $results = $this->con->query("select id, user_name, full_name, email_id, profile_pic, cover_pic, Bio, joined_date, privacy_status, viewed_till, followers, following from users where id = $userId");

        return $results->fetch_array(MYSQLI_ASSOC);
    }

    public function load_other_user_newsfeed($username)
    {
        return $results = $this->con->query("select * from user_posts where post_username = '$username' order by id desc");
    }

    public function change_following_user($following_id, $user_id)
    {

        $sql = $this->con->query("select following from users where id = $user_id");

        $user_following = $this->fetch_results_array($sql)['0'];

        if ($user_following == 'n_value') {
            $following_array = array($user_id, $following_id);

            $following_array_in_string = implode(":", $following_array);

            $results = $this->con->query("update users set following = '$following_array_in_string' where id = $user_id");

            if ($results) {
                return 'success';
            } else {
                return 'failure';
            }
        } else {
            $following_array = explode(":", $user_following);

            if (in_array($following_id, $following_array)) {

                return "Already";
            } else {
                array_push($following_array, $following_id);

                $following_array_in_string = implode(":", $following_array);

                $results = $this->con->query("update users set following = '$following_array_in_string' where id = $user_id");

                if ($results) {
                    return 'success';
                } else {
                    return 'failure';
                }
            }
        }
    }

    public function change_followers_users($following_id, $user_id)
    {

        $sql = $this->con->query("select followers from users where id = $following_id");

        $following_followers = $this->fetch_results_array($sql)['0'];

        if ($following_followers == 'n_value') {
            $followers_array = array($following_id, $user_id);

            $followers_array_in_string = implode(":", $followers_array);

            $results = $this->con->query("update users set followers = '$followers_array_in_string' where id = $following_id");

            if ($results) {
                return 'success';
            } else {
                return 'failure';
            }
        } else {

            $followers_array = explode(":", $following_followers);

            if (in_array($user_id, $followers_array)) {

                return "Already";
            } else {
                array_push($followers_array, $user_id);

                $followers_array_in_string = implode(":", $followers_array);

                $results = $this->con->query("update users set followers = '$followers_array_in_string' where id = $following_id");

                if ($results) {
                    return 'success';
                } else {
                    return 'failure';
                }
            }
        }
    }

    public function update_users_view($user_id)
    {
        $sql = $this->con->query("select following from users where id = $user_id");

        $user_following = $this->fetch_results_array($sql)['0'];

        $followers_array = explode(":", $user_following);

        foreach ($followers_array as &$value) {
            $value = 'user_id = ' . $value;
        }

        $condition_string = implode(" or ", $followers_array);

        $sql2 = $this->con->query("create or replace VIEW userid_$user_id as select id, user_id, post_username, post_fullname, post_userprofile_pic, post_time, post_caption, post_img, post_likers, post_comments from user_posts where user_id = $user_id or $condition_string");

        if ($sql2) {
            return "Updated";
        } else {
            return "Not Updated";
        }
    }

    public function get_user_following($user_id)
    {
        $sql = $this->con->query("select following from users where id = $user_id");

        return $user_following = $this->fetch_results_array($sql)['0'];
    }

    public function get_user_followers($user_id)
    {
        $sql = $this->con->query("select followers from users where id = $user_id");

        return $user_following = $this->fetch_results_array($sql)['0'];
    }

    public function follow_user($following_id, $user_id)
    {
        $this->change_following_user($following_id, $user_id);

        $this->change_followers_users($following_id, $user_id);

        $this->update_users_view($user_id);

        $this->follow_notification($user_id, $following_id);

        echo 'success';
    }

    public function unfollow_in_user($following_id, $user_id)
    {

        $sql = $this->con->query("select following from users where id = $user_id");

        $user_following = $this->fetch_results_array($sql)['0'];

        $following_array = explode(":", $user_following);

        if (in_array($following_id, $following_array)) {

            if (($key = array_search($following_id, $following_array)) !== false) {
                unset($following_array[$key]);

                $following_array_in_string = implode(":", $following_array);

                $results = $this->con->query("update users set following = '$following_array_in_string' where id = $user_id");

                if ($results) {
                    return 'success';
                } else {
                    return 'failure';
                }
            }
        } else {

            return "Already";
        }
    }

    public function unfollow_in_following_users($following_id, $user_id)
    {
        $sql = $this->con->query("select followers from users where id = $following_id");

        $user_following = $this->fetch_results_array($sql)['0'];

        $following_array = explode(":", $user_following);

        if (in_array($user_id, $following_array)) {

            if (($key = array_search($user_id, $following_array)) !== false) {
                unset($following_array[$key]);

                $following_array_in_string = implode(":", $following_array);

                $results = $this->con->query("update users set followers = '$following_array_in_string' where id = $following_id");

                if ($results) {
                    return 'success';
                } else {
                    return 'failure';
                }
            }
        } else {

            return "Already";
        }
    }

    public function unfollow_user($following_id, $user_id)
    {
        $this->unfollow_in_user($following_id, $user_id);

        $this->unfollow_in_following_users($following_id, $user_id);

        $this->update_users_view($user_id);

        echo 'success';
    }

    public function load_user_session_details($user_id, $password)
    {
        $results = $this->con->query("select * from users where id = '$user_id' and password = '$password';");

        if (mysqli_num_rows($results) == 1) {

            return $_SESSION['user_key'] = $results->fetch_array(MYSQLI_ASSOC);
        } else {
            // return 'u1_p0';
        }
    }

    public function update_user_details($id, $user_name, $full_name, $email_id, $profile_pic, $cover_pic, $Bio, $Location, $Gender, $Birth_date, $privacy_status)
    {
        $results = $this->con->query("update users set user_name = '$user_name', full_name = '$full_name', email_id = '$email_id', profile_pic = '$profile_pic', cover_pic = '$cover_pic', Bio = '$Bio', Location = '$Location', Gender = '$Gender', Birth_date = '$Birth_date', privacy_status = '$privacy_status' where id = $id");

        if ($results) {
            return 'success';
        } else {
            return 'failed';
        }
    }

    public function update_passwrd($id, $old_passwrd, $new_psswrd)
    {
        $check_psswrd = $this->con->query("select password from users where id = $id");

        $rslt = $this->fetch_results_array($check_psswrd)[0];

        if ($rslt == $old_passwrd) {
            $results = $this->con->query("update users set password = '$new_psswrd' where id = $id");

            if ($results) {
                return 'success';
            } else {
                return 'failed';
            }
        } else {
            return 'crnt_p';
        }
    }

    public function like_post($post_id, $user_id)
    {

        $sql = $this->con->query("select post_likers from user_posts where id = $post_id");

        $post_likes = $this->fetch_results_array($sql)['0'];

        if ($post_likes == null || $post_likes == "") {

            $this->like_notification($user_id, $post_id);

            $post_likes_in_array = array($user_id);

            $post_likes_in_string = implode(":", $post_likes_in_array);

            $results = $this->con->query("update user_posts set post_likers = '$post_likes_in_string' where id = $post_id");

            if ($results) {
                return 'success_null';
            } else {
                return 'failure';
            }
        } else {

            $post_likes_in_array = explode(":", $post_likes);

            if (in_array($user_id, $post_likes_in_array)) {

                if (($key = array_search($user_id, $post_likes_in_array)) !== false) {
                    unset($post_likes_in_array[$key]);

                    $post_likes_in_string = implode(":", $post_likes_in_array);

                    $results = $this->con->query("update user_posts set post_likers = '$post_likes_in_string' where id = $post_id");

                    if ($results) {
                        return 'success_dislike';
                    } else {
                        return 'failure';
                    }
                }
            } else {
                array_push($post_likes_in_array, $user_id);

                $this->like_notification($user_id, $post_id);

                $post_likes_in_string = implode(":", $post_likes_in_array);

                $results = $this->con->query("update user_posts set post_likers = '$post_likes_in_string' where id = $post_id");

                if ($results) {
                    return 'success_in_like';
                } else {
                    return 'failure';
                }
            }
        }
    }

    public function get_post_likes($post_id)
    {
        $sql = $this->con->query("select post_likers from user_posts where id = $post_id");

        return $post_likes = $this->fetch_results_array($sql)['0'];
    }

    public function comment_the_post($post_comment_id, $commenter_id, $commenter_comment)
    {
        preg_match("/(\@\w+)/", $commenter_comment, $match);

        $replied_username = @$match[0];

        $commenter_comment = preg_replace("/(\@\w+)/", "<a href=profile.php?username=$1>$1</a>", $commenter_comment);

        $sql = $this->con->query("select post_comments from user_posts where id = $post_comment_id");

        $post_comments = $this->fetch_results_array($sql)['0'];

        if ($post_comments == null) {

            $post_comments_in_md_array = array(
                array("id" => $commenter_id, "comment" => $commenter_comment, "likes" => "", "rogue_id" => 1),
            );

            $comment = 1;

            if (!$replied_username) {
                $this->comment_notification($commenter_id, $post_comment_id, $comment, $commenter_comment);
            } else {
                $abc = $this->load_profile_info($replied_username);

                if ($abc == null) {
                } else {
                    $replied_to_id = $abc['id'];
                    $this->reply_notification($commenter_id, $post_comment_id, $comment, $commenter_comment, $replied_to_id);
                }
            }

            $post_comments_in_json = json_encode($post_comments_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            $results = $this->con->query("update user_posts set post_comments = '$post_comments_in_json' where id = $post_comment_id");

            if ($results) {
                return 'success';
            } else {
                return 'failure';
            }
        } else {
            $sql2 = $this->con->query("select post_comments from user_posts where id = $post_comment_id");

            $post_comments_in_json = $this->fetch_results_array($sql2)['0'];

            $post_comments_in_md_array = json_decode($post_comments_in_json, true);

            $comment = $post_comments_in_md_array[0]['rogue_id'] + 1;

            if (!$replied_username) {
                $this->comment_notification($commenter_id, $post_comment_id, $comment, $commenter_comment);
            } else {
                $abc = $this->load_profile_info($replied_username);

                if ($abc == null) {
                } else {
                    $replied_to_id = $abc['id'];
                    $this->reply_notification($commenter_id, $post_comment_id, $comment, $commenter_comment, $replied_to_id);
                }
            }

            $new_comments = array("id" => $commenter_id, "comment" => $commenter_comment, "likes" => "", "rogue_id" => $comment);

            array_unshift($post_comments_in_md_array, $new_comments);

            $post_comments_in_new_json = json_encode($post_comments_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            $results = $this->con->query("update user_posts set post_comments = '$post_comments_in_new_json' where id = $post_comment_id");

            if ($results) {
                return 'success';
            } else {
                return 'failure';
            }
        }
    }

    public function load_post_comment($post_id)
    {
        $sql = $this->con->query("select post_comments from user_posts where id = $post_id");

        return $post_comments = $this->fetch_results_array($sql)['0'];
    }

    public function user_images_list($user_id)
    {
        $sql = $this->con->query("select user_images from users where id = $user_id");

        $image_lists = $this->fetch_results_array($sql)['0'];

        if ($image_lists == null || $image_lists == "") {
            return 0;
        } else {
            $image_lists_in_array = explode(":", $image_lists);

            return count($image_lists_in_array);
        }
    }

    public function update_user_images_list($user_id, $user_image)
    {
        $sql = $this->con->query("select user_images from users where id = $user_id");

        $image_lists = $this->fetch_results_array($sql)['0'];

        if ($image_lists == null || $image_lists == "") {

            $image_list_in_array = array($user_image);

            $image_list_in_string = implode(":", $image_list_in_array);

            $results = $this->con->query("update users set user_images = '$image_list_in_string' where id = $user_id");

            if ($results) {
                return 'success_null';
            } else {
                return 'failure';
            }
        } else {
            $image_lists_in_array = explode(":", $image_lists);

            array_push($image_lists_in_array, $user_image);

            $image_lists_in_string = implode(":", $image_lists_in_array);

            $results = $this->con->query("update users set user_images = '$image_lists_in_string' where id = $user_id");

            if ($results) {
                return 'success_in_like';
            } else {
                return 'failure';
            }
        }
    }

    public function delete_myPost($post_id)
    {
        $results = $this->con->query("DELETE FROM user_posts WHERE id = $post_id");

        if ($results) {
            return 'deleted';
        } else {
            return 'Not deleted';
        }
    }

    public function like_this_comment($user_id, $post_id, $index_of_comment)
    {
        $sql = $this->con->query("select post_comments from user_posts where id = $post_id");

        $post_comments_in_json = $this->fetch_results_array($sql)['0'];

        $post_comments_in_md_array = json_decode($post_comments_in_json, true);

        $comment_likes_in_string = $post_comments_in_md_array[$index_of_comment]['likes'];

        if ($comment_likes_in_string == "" || $comment_likes_in_string == ":") {

            $comment_likes_in_array = array($user_id);

            $post_comments_in_md_array[$index_of_comment]['likes'] = implode(":", $comment_likes_in_array);

            $post_comments_in_json = json_encode($post_comments_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            $results = $this->con->query("update user_posts set post_comments = '$post_comments_in_json' where id = $post_id");

            if ($results) {
                return 'success';
            } else {
                return 'failure';
            }
        } else {

            $comment_likes_in_array = explode(":", $comment_likes_in_string);

            if (in_array($user_id, $comment_likes_in_array)) {

                if (($key = array_search($user_id, $comment_likes_in_array)) !== false) {
                    unset($comment_likes_in_array[$key]);

                    $post_comments_in_md_array[$index_of_comment]['likes'] = implode(":", $comment_likes_in_array);

                    $post_comments_in_json = json_encode($post_comments_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

                    $results = $this->con->query("update user_posts set post_comments = '$post_comments_in_json' where id = $post_id");

                    if ($results) {
                        return 'success';
                    } else {
                        return 'failure';
                    }
                }
            } else {
                array_push($comment_likes_in_array, $user_id);

                $post_comments_in_md_array[$index_of_comment]['likes'] = implode(":", $comment_likes_in_array);

                $post_comments_in_json = json_encode($post_comments_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

                $results = $this->con->query("update user_posts set post_comments = '$post_comments_in_json' where id = $post_id");

                if ($results) {
                    return 'success';
                } else {
                    return 'failure';
                }
            }
        }
    }

    public function delete_this_comment($post_id, $index_of_comment)
    {

        $sql = $this->con->query("select post_comments from user_posts where id = $post_id");

        $post_comments_in_json = $this->fetch_results_array($sql)['0'];

        $post_comments_in_md_array = json_decode($post_comments_in_json, true);

        // unset($post_comments_in_md_array[$index_of_comment]);

        array_splice($post_comments_in_md_array, $index_of_comment, 1);

        $post_comments_in_json = json_encode($post_comments_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        $results = $this->con->query("update user_posts set post_comments = '$post_comments_in_json' where id = $post_id");

        if ($results) {
            return 'success';
        } else {
            return 'failure';
        }
    }

    public function load_userPost($post_id)
    {

        $sql = $this->con->query("select * from user_posts where id = $post_id");

        return $user_post = $this->fetch_results_array($sql);
    }

    public function search_user($searchVal)
    {
        return $sql = $this->con->query("select * from users where full_name like '$searchVal%'");
    }

    public function load_profile_info($username)
    {

        $results = $this->con->query("select id, user_name, full_name, email_id, profile_pic, cover_pic, Bio, joined_date, privacy_status, viewed_till, followers, following, Gender, request_by, blocked_by from users where user_name = '$username'");

        return $results->fetch_array(MYSQLI_ASSOC);
    }

    public function load_notification($user_id)
    {
        $sql = $this->con->query("select Notification from users where id = $user_id");

        return $post_comments_in_json = $this->fetch_results_array($sql)[0];
    }

    public function load_username($user_id)
    {

        $sql = $this->con->query("select user_name from users where id = $user_id");

        return $username = $this->fetch_results_array($sql)[0];
    }

    public function follow_notification($user_id, $followed_id)
    {
        $abc = $this->load_notification($followed_id);
        
        $userName = $this->load_username($user_id);


        if ($abc == null || $abc == " ") {

            $notify_in_md_array = array(
                "inactive" => array(),

                "active" => array(),
            );

            $action_on_follow = 'other_user.php?username=' . $userName;

            $notification = array("id_related" => $user_id, "status" => "unseen", "link" => "$action_on_follow", "type" => "follow");

            array_unshift($notify_in_md_array['inactive'], $notification);

            $notify_in_json = json_encode($notify_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            $results = $this->con->query("update users set Notification = '$notify_in_json' where id = $followed_id");

            if ($results) {
                return 'success';
            } else {
                return 'failure';
            }
        } else {

            $action_on_follow = 'other_user.php?username=' . $userName;

            $notification = array("id_related" => $user_id, "status" => "unseen", "link" => "$action_on_follow", "type" => "follow");

            $notify_in_md_array = json_decode($abc, true);

            array_unshift($notify_in_md_array['inactive'], $notification);

            $notify_in_json = json_encode($notify_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            $results = $this->con->query("update users set Notification = '$notify_in_json' where id = $followed_id");

            if ($results) {
                return 'success';
            } else {
                return 'failure';
            }
        }
    }

    public function like_notification($liker_id, $post_id)
    {
        $sql = $this->con->query("select user_id from user_posts where id = $post_id");

        $user_id = $this->fetch_results_array($sql)['0'];

        if ($user_id == $liker_id) {
        } else {

            $abc = $this->load_notification($user_id);

            if ($abc == null || $abc == " ") {

                $notify_in_md_array = array(
                    "inactive" => array(),

                    "active" => array(),
                );

                $action_on_like = 'post?post_id=' . $post_id;

                $notification = array("id_related" => $liker_id, "status" => "unseen", "link" => $action_on_like, "type" => "post_like", "post_id" => $post_id);

                array_unshift($notify_in_md_array['inactive'], $notification);

                $notify_in_json = json_encode($notify_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

                $results = $this->con->query("update users set Notification = '$notify_in_json' where id = $user_id");

                if ($results) {
                    return 'success';
                } else {
                    return 'failure';
                }
            } else {

                $action_on_like = 'post?post_id=' . $post_id;

                $notification = array("id_related" => $liker_id, "status" => "unseen", "link" => $action_on_like, "type" => "post_like", "post_id" => $post_id);

                $notify_in_md_array = json_decode($abc, true);

                array_unshift($notify_in_md_array['inactive'], $notification);

                $notify_in_json = json_encode($notify_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

                $results = $this->con->query("update users set Notification = '$notify_in_json' where id = $user_id");

                if ($results) {
                    return 'success';
                } else {
                    return 'failure';
                }
            }
        }
    }

    public function comment_notification($commenter_id, $post_id, $comment, $commenter_comment)
    {
        $sql = $this->con->query("select user_id from user_posts where id = $post_id");

        $user_id = $this->fetch_results_array($sql)['0'];

        if ($user_id == $commenter_id) {
        } else {
            $abc = $this->load_notification($user_id);

            if ($abc == null || $abc == " ") {

                $notify_in_md_array = array(
                    "inactive" => array(),

                    "active" => array(),
                );

                $action_on_like = 'post?post_id=' . $post_id . '&comment_id=' . $comment;

                $notification = array("id_related" => $commenter_id, "status" => "unseen", "link" => $action_on_like, "type" => "post_comment", "post_id" => $post_id, "comment_id" => $comment, "comment" => $commenter_comment);

                array_unshift($notify_in_md_array['inactive'], $notification);

                $notify_in_json = json_encode($notify_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

                $results = $this->con->query("update users set Notification = '$notify_in_json' where id = $user_id");

                if ($results) {
                    return 'success';
                } else {
                    return 'failure';
                }
            } else {

                $action_on_like = 'post?post_id=' . $post_id . '&comment_id=' . $comment;

                $notification = array("id_related" => $commenter_id, "status" => "unseen", "link" => $action_on_like, "type" => "post_comment", "post_id" => $post_id, "comment_id" => $comment, "comment" => $commenter_comment);

                $notify_in_md_array = json_decode($abc, true);

                array_unshift($notify_in_md_array['inactive'], $notification);

                $notify_in_json = json_encode($notify_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

                $results = $this->con->query("update users set Notification = '$notify_in_json' where id = $user_id");

                if ($results) {
                    return 'success';
                } else {
                    return 'failure';
                }
            }
        }
    }

    public function reply_notification($commenter_id, $post_id, $comment, $commenter_comment, $replied_to_id)
    {
        // $sql = $this->con->query("select user_id from user_posts where id = $post_id");

        $user_id = $replied_to_id;

        if ($user_id == $commenter_id) {
        } else {

            $abc = $this->load_notification($user_id);

            if ($abc == null || $abc == " ") {

                $notify_in_md_array = array(
                    "inactive" => array(),

                    "active" => array(),
                );

                $action_on_like = 'post?post_id=' . $post_id . '&comment_id=' . $comment;

                $notification = array("id_related" => $commenter_id, "status" => "unseen", "link" => $action_on_like, "type" => "post_reply", "post_id" => $post_id, "comment_id" => $comment, "comment" => $commenter_comment);

                array_unshift($notify_in_md_array['inactive'], $notification);

                $notify_in_json = json_encode($notify_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

                $results = $this->con->query("update users set Notification = '$notify_in_json' where id = $user_id");

                if ($results) {
                    return 'success';
                } else {
                    return 'failure';
                }
            } else {

                $action_on_like = 'post?post_id=' . $post_id . '&comment_id=' . $comment;

                $notification = array("id_related" => $commenter_id, "status" => "unseen", "link" => $action_on_like, "type" => "post_reply", "post_id" => $post_id, "comment_id" => $comment, "comment" => $commenter_comment);

                $notify_in_md_array = json_decode($abc, true);

                array_unshift($notify_in_md_array['inactive'], $notification);

                $notify_in_json = json_encode($notify_in_md_array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

                $results = $this->con->query("update users set Notification = '$notify_in_json' where id = $user_id");

                if ($results) {
                    return 'success';
                } else {
                    return 'failure';
                }
            }
        }
    }

    public function update_notification($user_id, $notify)
    {
        $results = $this->con->query("update users set Notification = '$notify' where id = $user_id");

        if ($results) {
            return 'success';
        } else {
            return 'failure';
        }
    }

    public function blocked_this_user($id, $sh_be_block)
    {
        $sql = $this->con->query("select blocked_by from users where id = $id");

        $user_block = $this->fetch_results_array($sql)['0'];

        if ($user_block == null || $user_block == " ") {

            $user_block_in_array = array($sh_be_block);

            $user_block_in_string = implode(":", $user_block_in_array);

            $results = $this->con->query("update users set blocked_by = '$user_block_in_string' where id = $id");

            if ($results) {
                return 'success_null_blck' . $user_block_in_string;
            } else {
                return 'failure';
            }
        } else {

            $user_block_in_array = explode(":", $user_block);

            if (in_array($sh_be_block, $user_block_in_array)) {

                if (($key = array_search($sh_be_block, $user_block_in_array)) !== false) {
                    array_splice($user_block_in_array, $key, 1);

                    $user_block_in_string = implode(":", $user_block_in_array);

                    $results = $this->con->query("update users set blocked_by = '$user_block_in_string' where id = $id");

                    if ($results) {
                        return 'success_Unblck' . $user_block_in_string;
                    } else {
                        return 'failure';
                    }
                }
            } else {
                array_push($user_block_in_array, $sh_be_block);

                $user_block_in_string = implode(":", $user_block_in_array);

                $results = $this->con->query("update users set blocked_by = '$user_block_in_string' where id = $id");

                if ($results) {
                    return 'success_blck' . $user_block_in_string;
                } else {
                    return 'failure';
                }
            }
        }
    }

    public function request_user($requested_id, $user_id)
    {
        $sql = $this->con->query("select request_by from users where id = $requested_id");

        $user_request = $this->fetch_results_array($sql)['0'];

        if ($user_request == Null || $user_request == " ") {

            $user_request_array = array($user_id);

            $user_request_in_string = implode(":", $user_request_array);

            $results = $this->con->query("update users set request_by = '$user_request_in_string' where id = $requested_id");

            if ($results) {
                return 'success_null_blck' . $user_request_in_string;
            } else {
                return 'failure';
            }
        } else {

            $user_request_in_array = explode(":", $user_request);

            if (in_array($user_id, $user_request_in_array)) {

                if (($key = array_search($user_id, $user_request_in_array)) !== false) {
                    array_splice($user_request_in_array, $key, 1);

                    $user_request_in_string = implode(":", $user_request_in_array);

                    $results = $this->con->query("update users set request_by = '$user_request_in_string' where id = $requested_id");

                    if ($results) {
                        return 'success_Unrqst' . $user_request_in_string;
                    } else {
                        return 'failure';
                    }
                }
            } else {
                array_push($user_request_in_array, $user_id);

                $user_request_in_string = implode(":", $user_request_in_array);

                $results = $this->con->query("update users set request_by = '$user_request_in_string' where id = $requested_id");

                if ($results) {
                    return 'success_rqst' . $user_request_in_string;
                } else {
                    return 'failure';
                }
            }
        }
    }
}

// Server Object with all connection and queries is formed
$server_Obj = new Server("localhost", "root", "", "socialmedia");
