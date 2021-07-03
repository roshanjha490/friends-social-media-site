<?php


if ($_SESSION['user_key'] == "") {
    header('location:login.php');
}

$user;

$GLOBALS['user'] = $server_Obj->load_user_profile($_SESSION['user_key']['id']);

clearstatcache();
?>

<div class="w-100 h-auto p-2 bg-white">
    <div class="profile_look w-100 h-auto position-relative">
        <div class="cover_photo overflow-hidden w-100 position-relative">
            <img src="<?php echo $user['cover_pic'] ?>" alt="cover_photo" class="position-absolute h-100">
        </div>
        <div class="main_photo position-absolute p-1">
            <div class="w-100 bg_pic h-100 overflow-hidden rounded-circle position-relative">
                <img src="<?php echo $user['profile_pic'] ?>" alt="profile_pic" class="position-absolute h-100">
            </div>
        </div>

        <div class="userOption position-absolute">
            <div class="w-auto h-100 d-flex justify-content-center align-items-center" id="dropdownMenu6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
            </div>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="profile.php?username=<?php echo $user['user_name']; ?>">Go to your's Account</a>
                <a class="dropdown-item" href="profile.php?username=<?php echo $user['user_name']; ?>&user_edit=true">Edit Profile</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <div class="w-100 mt-5 user_information px-2">
        <p class="mb-1"><span class="d-block"> <a href="profile.php?username=<?php echo $user['user_name']; ?>"><?php echo $user['full_name'] ?></a></span>
            <small> <a href="profile.php?username=<?php echo $user['user_name']; ?>"><?php echo $user['user_name'] ?></a></small>
        </p>

        <p><small><?php echo $user['Bio'] ?></small></p>

        <p class="mb-2"> <span class="pr-1"><i class="fas fa-envelope"></i></span> <small><?php echo $user['email_id'] ?></small></p>

        <p> <span class="pr-1"><i class="far fa-clock"></i></span> <small>Joined on <?php echo $user['joined_date'] ?></small></p>

        <div class="follwsInfrm row w-100 h-100">
            <div class="col-6">
                <div class="d-flex justify-content-center align-items-center">
                    <h6>Followers</h6>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <p>
                        <?php

                        if ($user['followers'] == 'n_value') {
                            echo 0;
                        } else {
                            $followers_string = $server_Obj->get_user_followers($user['id']);

                            $followers_array = explode(":", $followers_string);

                            echo count($followers_array) - 1;
                        }

                        ?>
                    </p>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-center align-items-center">
                    <h6>Following</h6>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <p>
                        <?php

                        if ($user['following'] == 'n_value') {
                            echo 0;
                        } else {
                            $following_string = $server_Obj->get_user_following($user['id']);

                            $following_array = explode(":", $following_string);

                            echo count($following_array) - 1;
                        }

                        ?>

                    </p>
                </div>

            </div>
        </div>
    </div>
</div>