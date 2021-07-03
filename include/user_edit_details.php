<?php

$user;

$userIdentity;

$user_id = $_SESSION['user_key']['id'];

$password = $_SESSION['user_key']['password'];

$GLOBALS['user'] = $server_Obj->load_user_session_details($user_id, $password);

if (@$_SESSION['new_user_edit'] == "set") {
?>



    <div id="user_edit_form" class="user_edit_form bg-white px-2 mb-3">
        <!-- <hr> -->

        <!-- <form action="" method="post"> -->

        <div class="w-100 user_pics position-relative">
            <div class="w-100 h-100 cover_pic overflow-hidden position-relative">
                <div class="black_bx_f_cover_pic position-absolute w-100 h-100">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <div class="icons_f_cover_pic">
                            <i class="fas fa-image p-2 rounded-circle" onclick="chooseFile_for_cover_pic()"></i>
                        </div>
                    </div>
                </div>
                <img src="<?php echo $user['cover_pic']; ?>" id="cover_pic_edit" class="h-100 position-absolute" alt="cover_pic">
            </div>
            <div class="profile_pic position-absolute p-2">
                <div class="w-100 profile_pic_bg h-100 overflow-hidden rounded-circle position-relative">

                    <div class="black_bx_f_profile_pic position-absolute w-100 h-100">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <div class="icons_f_profile_pic">
                                <i class="fas fa-image p-2 rounded-circle" onclick="file_input_for_profile_pic()"></i>
                            </div>
                        </div>
                    </div>

                    <img src="<?php echo $user['profile_pic']; ?>" id="profile_pic_edit" alt="" class=" h-100">
                </div>
            </div>
        </div>

        <div class="w-100 h-auto mb-3">
            <div class="row">
                <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                    <h5>Name:</h5>
                </div>
                <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                    <input type="text" class="form-control" id="user_edit_name" placeholder="" value="<?php echo $user['full_name'] ?>">
                </div>
            </div>
        </div>

        <div class="w-100 h-auto">
            <div class="row">
                <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                    <h5>Username:</h5>
                </div>

                <div class="col-8 px-3 d-flex justify-content-start align-items-center position-relative">
                    <input id="user_edit_username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo ltrim($user['user_name'], '@') ?>">
                    <span class="loader_f_edit position-absolute h-100 py-1" id="loader_f_edit">
                        <img src="img/loader.GIF" class="h-100" alt="loader.gif">
                    </span>
                </div>
            </div>
        </div>

        <div class="w-100 extr1 mb-3 d-flex justify-content-center align-items-center">
            <small id="error"></small>
        </div>

        <div class="w-100 h-auto mb-3">
            <div class="row">
                <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                    <h5>Bio:</h5>
                </div>
                <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                    <textarea class="form-control" id="user_edit_bio" rows="2"><?php echo $user['Bio'] ?></textarea>
                </div>
            </div>
        </div>

        <div class="w-100 h-auto mb-3">
            <div class="row">
                <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                    <h5>E-Mail:</h5>
                </div>
                <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                    <input type="email" class="form-control" id="user_edit_email" placeholder="" value="<?php echo $user['email_id'] ?>">
                </div>
            </div>
        </div>

        <div class="w-100 h-auto mb-3">
            <div class="row">
                <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                    <h5>Location:</h5>
                </div>
                <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                    <input type="location" class="form-control" id="user_edit_location" placeholder="" value="<?php echo $user['Location'] ?>">
                </div>
            </div>
        </div>

        <div class="w-100 h-auto mb-3">
            <div class="row">
                <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                    <h5>Privacy Status:</h5>
                </div>
                <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                    <select class="form-control" id="user_edit_status">
                        <option>Public</option>
                        <option>Private</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="w-100 h-auto mb-3">
            <div class="row">
                <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                    <h5>Gender:</h5>
                </div>
                <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                    <select class="form-control" id="user_edit_gender">
                        <option>Prefer Not To Say</option>
                        <option>Male</option>
                        <option>Fe-Male</option>
                        <option>Others</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="w-100 mb-3 h-auto">
            <div class="row">
                <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                    <h5>Birth Date:</h5>
                </div>
                <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                    <input type="date" class="form-control" value="<?php echo $user['Birth_date'] ?>" id="user_edit_birth_date">
                </div>
            </div>
        </div>

        <hr>
        <div class="w-100 px-3">
            <button type="button" class="btn btn-dark" name="Submit_user_edit" id="Submit_user_edit">Upload Details</button>
        </div>

        <!-- </form> -->
    </div>

    <div id="error"></div>

    <input id="file_input_for_cover_pic" type="file" name="file" class="d-none">

    <input id="file_input_for_profile_pic" type="file" name="file" class="d-none">

    <?php
    $_SESSION['new_user_edit'] = "";
} else {

    if (@$_GET['user_edit'] == 'true') {

    ?>
        <div id="user_edit_form" class="w-100 d-inline-block user_edit_form inactiveForm pb-3 bg-white px-1 mb-3">
            <!-- <hr> -->

            <!-- <form action="" method="post"> -->

            <div class="w-100 user_pics position-relative">
                <div class="w-100 h-100 cover_pic overflow-hidden position-relative">
                    <div class="black_bx_f_cover_pic position-absolute w-100 h-100">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <div class="icons_f_cover_pic">
                                <i class="fas fa-image p-2 rounded-circle" onclick="chooseFile_for_cover_pic()"></i>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo $user['cover_pic']; ?>" id="cover_pic_edit" class="h-100 position-absolute" alt="cover_pic">
                </div>
                <div class="profile_pic position-absolute p-2">
                    <div class="w-100 profile_pic_bg h-100 overflow-hidden rounded-circle position-relative">

                        <div class="black_bx_f_profile_pic position-absolute w-100 h-100">
                            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                <div class="icons_f_profile_pic">
                                    <i class="fas fa-image p-2 rounded-circle" onclick="file_input_for_profile_pic()"></i>
                                </div>
                            </div>
                        </div>

                        <img src="<?php echo $user['profile_pic']; ?>" id="profile_pic_edit" alt="" class=" h-100">
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto mb-3">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Name:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <input type="text" class="form-control" id="user_edit_name" placeholder="" value="<?php echo $user['full_name'] ?>">
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Username:</h5>
                    </div>

                    <div class="col-8 px-3 d-flex justify-content-start align-items-center position-relative">
                        <input id="user_edit_username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo ltrim($user['user_name'], '@') ?>">
                        <span class="loader_f_edit position-absolute h-100 py-1" id="loader_f_edit">
                            <img src="img/loader.GIF" class="h-100" alt="loader.gif">
                        </span>
                    </div>
                </div>
            </div>

            <div class="w-100 extr1 mb-3 d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8">
                        <small id="error"></small>
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto mb-3">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Bio:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <textarea class="form-control" id="user_edit_bio" rows="2"><?php echo $user['Bio'] ?></textarea>
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto mb-3">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>E-Mail:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <input type="email" class="form-control" id="user_edit_email" placeholder="" value="<?php echo $user['email_id'] ?>">
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto mb-3">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Location:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <input type="location" class="form-control" id="user_edit_location" placeholder="" value="<?php echo $user['Location'] ?>">
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto mb-3">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Privacy Status:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <select class="form-control" id="user_edit_status">
                            <?php
                            if ($user['privacy_status'] == 'Public') {
                            ?>
                                <option value="Public" selected>Public</option>
                                <option value="Private">Private</option>
                            <?php
                            } else {
                            ?>
                                <option value="Public">Public</option>
                                <option value="Private" selected>Private</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto mb-3">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Gender:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <select class="form-control" id="user_edit_gender">
                            <option <?php if ($user['Gender'] == 'Male') {
                                        echo 'selected';
                                    } else {
                                    } ?>>Male</option>
                            <option <?php if ($user['Gender'] == 'Fe-Male') {
                                        echo 'selected';
                                    } else {
                                    } ?>>Fe-Male</option>
                            <option <?php if ($user['Gender'] == 'Others') {
                                        echo 'selected';
                                    } else {
                                    } ?>>Others</option>

                            <option <?php if ($user['Gender'] == 'Prefer Not To Say') {
                                        echo 'selected';
                                    } else {
                                    } ?>>Prefer Not To Say</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="w-100 mb-5 h-auto">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Birth Date:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <input type="date" class="form-control" value="<?php echo $user['Birth_date'] ?>" id="user_edit_birth_date">
                    </div>
                </div>
            </div>

            <div class="w-100 pt-3 mt-3 h-auto chnge_psswrd border-top position-relative mb-3">

                <p class="px-2 position-absolute"> Change Password </p>

                <div class="w-100 h-auto edit_psswrd_form" id="edit_psswrd_form">
                    <div class="w-100 mb-3 h-auto d-flex justify-content-center align-items-center">
                        <div class="w-75 h-auto position-relative">
                            <input id="current_psswrd" type="password" class="form-control w-100" placeholder="Current Password">
                            <span class="see_psswrd position-absolute"><i class="fas fa-eye"></i></span>
                            <span class="unsee_psswrd position-absolute"> <i class="fas fa-eye-slash"></i></span>
                        </div>
                    </div>
                    <div class="w-100 mb-3 h-auto d-flex justify-content-center align-items-center">
                        <div class="w-75 h-auto position-relative">
                            <input id="new_psswrd" type="password" class="form-control w-100" placeholder="New Password">
                            <span class="see_psswrd position-absolute"><i class="fas fa-eye"></i></span>
                            <span class="unsee_psswrd position-absolute"> <i class="fas fa-eye-slash"></i></span>
                        </div>
                    </div>
                    <div class="w-100 mb-3 h-auto d-flex justify-content-center align-items-center">
                        <div class="w-75 h-auto position-relative">
                            <input id="confirm_psswrd" type="password" class="form-control w-100" placeholder="Confirm New Password">
                            <span class="see_psswrd position-absolute"><i class="fas fa-eye"></i></span>
                            <span class="unsee_psswrd position-absolute"> <i class="fas fa-eye-slash"></i></span>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-flex justify-content-center align-items-center">
                    <button type="button" class="w-auto btn-sm btn-info" id="showpassward_change_form">Click on this button to Reset Your
                        Password</button>
                    <div class="w-auto h-auto" id="update_password_btns">
                        <button type="button" class="w-auto btn-sm btn-primary" id="Update_passward">Update Password</button>
                        <button type="button" class="w-auto btn-sm btn-danger" id="cancel_password_change_form">Cancel</button>
                    </div>
                </div>
            </div>

            <hr>
            <div class="w-100">
                <button type="button" class="btn btn-dark" name="Submit_user_edit" id="Submit_user_edit">Update Details</button>
            </div>

            <div class="w-100 mb-3">
                <button type="button" class="btn btn-danger" name="Submit_user_edit" id="Cancel_user_edit">Cancel</button>
            </div>

            <!-- </form> -->
        </div>

        <div id="error"></div>

        <input id="file_input_for_cover_pic" type="file" name="file" class="d-none">

        <input id="file_input_for_profile_pic" type="file" name="file" class="d-none">
    <?php

    } else {
    ?>

        <div id="user_edit_details" class="user_edit_details py-3 bg-white px-2 mb-5">
            <div class="container">
                <hr>
                <div class="w-100 h-auto mb-3">
                    <div class="row">
                        <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                            <h5>Name:</h5>
                        </div>
                        <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                            <h5 class="ul_1"><?php echo $user['full_name'] ?></h5>
                        </div>
                    </div>
                </div>

                <div class="w-100 h-auto mb-3">
                    <div class="row">
                        <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                            <h5>Username:</h5>
                        </div>
                        <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                            <h5 class="ul_1"><?php echo $user['user_name'] ?></h5>
                        </div>
                    </div>
                </div>

                <?php
                if ($user['Bio'] == Null || $user['Bio'] == ' ') {
                } else {

                ?>

                    <div class="w-100 h-auto mb-3">
                        <div class="row">
                            <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                                <h5>Bio:</h5>
                            </div>
                            <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                                <h5 class="ul_1"><?php echo $user['Bio'] ?></h5>
                            </div>
                        </div>
                    </div>

                <?php

                }
                ?>



                <div class="w-100 h-auto mb-3">
                    <div class="row">
                        <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                            <h5>Joined Date:</h5>
                        </div>
                        <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                            <h5 class="ul_1"><?php echo $user['joined_date'] ?></h5>
                        </div>
                    </div>
                </div>

                <div class="w-100 h-auto mb-3">
                    <div class="row">
                        <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                            <h5>E-mail:</h5>
                        </div>
                        <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                            <h5 class="ul_1"><?php echo $user['email_id'] ?></h5>
                        </div>
                    </div>
                </div>

                <?php if ($user['Location'] == Null || $user['Location'] == "") { ?>

                <?php } else { ?>
                    <div class="w-100 h-auto mb-3">
                        <div class="row">
                            <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                                <h5>Location:</h5>
                            </div>
                            <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                                <h5 class="ul_1"><?php echo $user['Location'] ?></h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                <?php if ($user['Birth_date'] == Null || $user['Birth_date'] == "") { ?>

                <?php } else { ?>
                    <div class="w-100 h-auto mb-3">
                        <div class="row">
                            <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                                <h5>Birth Date:</h5>
                            </div>
                            <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                                <h5 class="ul_1"><?php echo $user['Birth_date'] ?></h5>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                <?php if ($user['Gender'] == Null || $user['Gender'] == "") { ?>


                <?php } else { ?>
                    <div class="w-100 h-auto mb-3">
                        <div class="row">
                            <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                                <h5>Gender:</h5>
                            </div>
                            <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                                <h5 class="ul_1"><?php echo $user['Gender'] ?></h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="w-100 h-auto mb-3">
                    <div class="row">
                        <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                            <h5>Privacy Status:</h5>
                        </div>
                        <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                            <h5 class="ul_1"><?php echo $user['privacy_status'] ?></h5>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="w-100">
                    <button id="show_edit_form">Edit User Information</button>
                </div>
            </div>
        </div>

        <div id="user_edit_form" class="user_edit_form inactiveForm py-3 bg-white px-2 mb-5">
            <hr>

            <!-- <form action="" method="post"> -->

            <div class="w-100 user_pics position-relative">
                <div class="w-100 h-100 cover_pic overflow-hidden position-relative">
                    <div class="black_bx_f_cover_pic position-absolute w-100 h-100">
                        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                            <div class="icons_f_cover_pic">
                                <i class="fas fa-image p-2 rounded-circle" onclick="chooseFile_for_cover_pic()"></i>
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo $user['cover_pic']; ?>" id="cover_pic_edit" class="h-100 position-absolute" alt="cover_pic">
                </div>
                <div class="profile_pic position-absolute p-2">
                    <div class="w-100 profile_pic_bg h-100 overflow-hidden rounded-circle position-relative">

                        <div class="black_bx_f_profile_pic position-absolute w-100 h-100">
                            <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                <div class="icons_f_profile_pic">
                                    <i class="fas fa-image p-2 rounded-circle" onclick="file_input_for_profile_pic()"></i>
                                </div>
                            </div>
                        </div>

                        <img src="<?php echo $user['profile_pic']; ?>" id="profile_pic_edit" alt="" class=" h-100">
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto mb-3">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Name:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <input type="text" class="form-control" id="user_edit_name" placeholder="" value="<?php echo $user['full_name'] ?>">
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Username:</h5>
                    </div>

                    <div class="col-8 px-3 d-flex justify-content-start align-items-center position-relative">
                        <input id="user_edit_username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo ltrim($user['user_name'], '@') ?>">
                        <span class="loader_f_edit position-absolute h-100 py-1" id="loader_f_edit">
                            <img src="img/loader.GIF" class="h-100" alt="loader.gif">
                        </span>
                    </div>
                </div>
            </div>

            <div class="w-100 extr1 mb-3 d-flex justify-content-center align-items-center">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8">
                        <small id="error"></small>
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto mb-3">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Bio:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <textarea class="form-control" id="user_edit_bio" rows="2"><?php echo $user['Bio'] ?></textarea>
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto mb-3">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>E-Mail:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <input type="email" class="form-control" id="user_edit_email" placeholder="" value="<?php echo $user['email_id'] ?>">
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto mb-3">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Location:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <input type="location" class="form-control" id="user_edit_location" placeholder="" value="<?php echo $user['Location'] ?>">
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto mb-3">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Privacy Status:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <select class="form-control" id="user_edit_status">
                            <?php
                            if ($user['privacy_status'] == 'Public') {
                            ?>
                                <option value="Public" selected>Public</option>
                                <option value="Private">Private</option>
                            <?php
                            } else {
                            ?>
                                <option value="Public">Public</option>
                                <option value="Private" selected>Private</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto mb-3">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Gender:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <select class="form-control" id="user_edit_gender">
                            <option <?php if ($user['Gender'] == 'Male') {
                                        echo 'selected';
                                    } else {
                                    } ?>>Male</option>
                            <option <?php if ($user['Gender'] == 'Fe-Male') {
                                        echo 'selected';
                                    } else {
                                    } ?>>Fe-Male</option>
                            <option <?php if ($user['Gender'] == 'Others') {
                                        echo 'selected';
                                    } else {
                                    } ?>>Others</option>

                            <option <?php if ($user['Gender'] == 'Prefer Not To Say') {
                                        echo 'selected';
                                    } else {
                                    } ?>>Prefer Not To Say</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="w-100 mb-5 h-auto">
                <div class="row">
                    <div class="col-4 p-0 d-flex justify-content-end align-items-center">
                        <h5>Birth Date:</h5>
                    </div>
                    <div class="col-8 px-3 d-flex justify-content-start align-items-center">
                        <input type="date" class="form-control" value="<?php echo $user['Birth_date'] ?>" id="user_edit_birth_date">
                    </div>
                </div>
            </div>

            <div class="w-100 pt-3 mt-3 h-auto chnge_psswrd border-top position-relative mb-3">

                <p class="px-2 position-absolute"> Change Password </p>

                <div class="w-100 h-auto edit_psswrd_form" id="edit_psswrd_form">
                    <div class="w-100 mb-3 h-auto d-flex justify-content-center align-items-center">
                        <div class="w-75 h-auto position-relative">
                            <input id="current_psswrd" type="password" class="form-control w-100" placeholder="Current Password">
                            <span class="see_psswrd position-absolute"><i class="fas fa-eye"></i></span>
                            <span class="unsee_psswrd position-absolute"> <i class="fas fa-eye-slash"></i></span>
                        </div>
                    </div>
                    <div class="w-100 mb-3 h-auto d-flex justify-content-center align-items-center">
                        <div class="w-75 h-auto position-relative">
                            <input id="new_psswrd" type="password" class="form-control w-100" placeholder="New Password">
                            <span class="see_psswrd position-absolute"><i class="fas fa-eye"></i></span>
                            <span class="unsee_psswrd position-absolute"> <i class="fas fa-eye-slash"></i></span>
                        </div>
                    </div>
                    <div class="w-100 mb-3 h-auto d-flex justify-content-center align-items-center">
                        <div class="w-75 h-auto position-relative">
                            <input id="confirm_psswrd" type="password" class="form-control w-100" placeholder="Confirm New Password">
                            <span class="see_psswrd position-absolute"><i class="fas fa-eye"></i></span>
                            <span class="unsee_psswrd position-absolute"> <i class="fas fa-eye-slash"></i></span>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-flex justify-content-center align-items-center">
                    <button type="button" class="w-auto btn-sm btn-info" id="showpassward_change_form">Click on this button to Reset Your
                        Password</button>
                    <div class="w-auto h-auto" id="update_password_btns">
                        <button type="button" class="w-auto btn-sm btn-primary" id="Update_passward">Update Password</button>
                        <button type="button" class="w-auto btn-sm btn-danger" id="cancel_password_change_form">Cancel</button>
                    </div>
                </div>
            </div>

            <hr>
            <div class="w-100">
                <button type="button" class="btn btn-dark" name="Submit_user_edit" id="Submit_user_edit">Update Details</button>
            </div>

            <div class="w-100 mb-3">
                <button type="button" class="btn btn-danger" name="Submit_user_edit" id="Cancel_user_edit">Cancel</button>
            </div>

            <!-- </form> -->
        </div>

        <div id="error"></div>

        <input id="file_input_for_cover_pic" type="file" name="file" class="d-none">

        <input id="file_input_for_profile_pic" type="file" name="file" class="d-none">


<?php
    }
} ?>