
let notify_array_status;

let notify_array_id;

let notify_type;

function Action_notification(array_status, array_id, type) {

    notify_array_status = array_status;

    notify_array_id = array_id;

    notify_type = type;
}


let showNotify = false;

let new_post_id;

let id_of_user_to_be_followed;

function followUser(a) {
    id_of_user_to_be_followed = a;
}

function unfollowUser(a) {
    id_of_user_to_be_followed = a;
}


function get_post_likers_info(post_id) {
    new_post_id = post_id;
};

function chooseFile_for_cover_pic() {
    document.getElementById("file_input_for_cover_pic").click();
}

function file_input_for_profile_pic() {
    document.getElementById("file_input_for_profile_pic").click();
}


// Code for the icon to choose file
function chooseFile() {
    document.getElementById("file-input").click();
}

let var_post_id;

let var_user_id;

let commenter_id;

let post_comment_id;

let commenter_full_name;

let commenter_user_name;

let commenter_profil_pic;

let replied_username;

let replied_id;

let idOfPost;

let var_commenter_like_id;

// let var_post_id;

let var_index_of_comment;

function deleteMyPost(post_id) {
    idOfPost = post_id;
}

function like_this_post(post_id, user_id) {
    var_post_id = post_id;

    var_user_id = user_id;
};

function dislike_this_post(post_id, user_id) {
    var_post_id = post_id;

    var_user_id = user_id;
};

function reply_btn(username, user_id) {

    replied_username = username;

    replied_id = user_id;
};

function like_the_comment(commenter_like_id, post_id, index_of_comment) {
    var_commenter_like_id = commenter_like_id;
    var_post_id = post_id;
    var_index_of_comment = index_of_comment;
}

function dis_like_the_comment(commenter_like_id, post_id, index_of_comment) {
    var_commenter_like_id = commenter_like_id;
    var_post_id = post_id;
    var_index_of_comment = index_of_comment;
}

function delete_btn(post_id, index_of_comment) {
    var_post_id = post_id;
    var_index_of_comment = index_of_comment;
}

function comment_made(post_id, id) {
    post_comment_id = post_id

    commenter_id = id;

    commenter_full_name = full_name;

    commenter_user_name = user_name;

    commenter_profil_pic = profil_pic;

}

// varible storing the postformimage src
let postFormImage = 'undefined';

let be_block;

function blockUser_in_fun(to_b_blocked) {
    be_block = to_b_blocked;
}