//Ajax method that gets started when an file is choosen
$(document).ready(function () {

    $('#showupload_file_bx').hide();

    function all_my_newsfeed() {

        $(document).on('change', '#file-input', function () {
            var property = document.getElementById("file-input").files[0];

            var imageName = property.name;

            var img_extension = imageName.split('.').pop().toLowerCase();

            if (jQuery.inArray(img_extension, ['gif', 'png', 'jpg', 'jpeg', ]) == -1) {
                $('#uploadPostErr').show();
            } else {

                var form_data = new FormData();

                form_data.append("file", property);

                $.ajax({
                    url: 'ajax/uploadimg.php',
                    type: 'post',
                    data: form_data,
                    beforeSend: function () {
    
                        // Before Send Loading Loader set Login Process
                        $('.loader_2021').css("display", "inline");
                    },
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {

                        // $('#ajax_rslts').html(data);

                        $('#showupload_file_bx').show();

                        $('#Post_Image').attr("src", data);

                        postFormImage = data;

                        $('#rkj').html(data);

                        $('#showupload_file_bx').show();

                        $('#fileIconList').hide();

                        $('#postFormBtn').attr("disabled", false);

                        $('#cancelFormBtn').show();

                        $('#uploadPostErr').hide();

                        $('.loader_2021').css("display", "none");

                    }
                });
            }

        });


        // Changes and styles that get changed when user writes a caption
        $('#post_form_Caption').on({
            input: function () {
                var totalHeight = $(this).prop('scrollHeight') - parseInt($(this).css('padding-top')) - parseInt($(this).css('padding-bottom'));
                $(this).css({
                    'height': totalHeight
                });

                // if ($(this).val().length <= 1) {
                //     $(this).css({
                //         'height': '30px',
                //     });
                // }
            }

        });

        // Changes and styles that get changed when user writes a caption
        $('#post_form_Caption').keyup(function () {
            if ($('#post_form_Caption').val().length >= 1) {

                $('#postFormBtn').attr("disabled", false);

                $('#cancelFormBtn').show();
            } else {
                if ($('#Post_Image').attr("src") == '') {
                    if ($('#post_form_Caption').val() == '') {
                        $('#cancelFormBtn').hide();
                        $('#postFormBtn').attr("disabled", true);
                    }
                }
            }
        });


        //Action and styling that gets changed when a user clicks the cancel Post Button
        $('#cancelFormBtn').click(function () {
            $('#post_form_Caption').val('');
            $('#cancelFormBtn').hide();
            $('#postFormBtn').attr("disabled", true);
            $('#Post_Image').attr("src", '');
            $('#showupload_file_bx').hide();
            $('#fileIconList').show();
            $('#post_form_Caption').css("height", "30px");
        });

        //Ajax method that get started when the user clicks the Post button 
        $('#postFormBtn').click(function () {

            // Varible storing the post caption
            var Post_Caption = $('#post_form_Caption').val();

            // Varible storing the post Image
            if ($('#post_form_Caption').val() == '') {
                Post_Caption = " ";
            }
            var Post_Image = $('#Post_Image').attr("src");

            // Ajax method sending the user information to submit-post.php page
            $.ajax({
                url: 'ajax/submit-post.php',
                type: 'post',
                data: {
                    Post_Caption: Post_Caption,
                    Post_Image: Post_Image
                },
                beforeSend: function () {

                    // Before Send Loading Loader set Login Process
                    $('.loader_2021').css("display", "inline");
                },
                success: function (data) {
                    $('#post_form_Caption').val('');
                    $('#cancelFormBtn').hide();
                    $('#postFormBtn').attr("disabled", true);
                    $('#Post_Image').attr("src", '');
                    $('#showupload_file_bx').hide();
                    $('#fileIconList').show();

                    // Prepending the recent post in the users News Feed
                    $('#showPost_bx').prepend(data);

                    $('#nopost_bx').hide();
                    
                    all_my_newsfeed();

                    $('#post_form_Caption').css("height", "30px");
                    
                    // $('#loader').css("display", "none");
                    $('.loader_2021').css("display", "none");
                }
            });
        });

        $('.rctBtn_frLike').click(function () {

            $(this).hide();

            $(this).next().show();

            let a = $(this).parent().parent().parent().prev().children().children().children().children(".likes_number_info");

            let likes_number = Number(a.html());

            likes_number += 1;

            a.html(likes_number);

            $.ajax({
                url: 'ajax/like_the_post.php',
                type: 'post',
                data: {
                    Post_id: var_post_id,
                    user_id: var_user_id
                },
                beforeSend: function () {

                    // Before Send Loading Loader set Login Process
                    $('.loader_2021').css("display", "inline");
                },
                success: function (data) {
                    if (data == 'success') {
                        // alert(data);
                    }
                    // alert(data);
                    $('.loader_2021').css("display", "none");
                }
            });
        });

        $('.rctBtn_frLiked').click(function () {
            $(this).hide();

            $(this).prev().show();

            let a = $(this).parent().parent().parent().prev().children().children().children().children(".likes_number_info");

            let likes_number = Number(a.html());

            likes_number -= 1;

            a.html(likes_number);

            $.ajax({
                url: 'ajax/like_the_post.php',
                type: 'post',
                data: {
                    Post_id: var_post_id,
                    user_id: var_user_id
                },                
                beforeSend: function () {
    
                    // Before Send Loading Loader set Login Process
                    $('.loader_2021').css("display", "inline");
                },
                success: function (data) {
                    if (data == 'success') {
                        // alert(data);
                    }
                    // alert(data);
                    $('.loader_2021').css("display", "none");
                }
            });

        });

        $('.rctBtn_frComment').click(function () {

            $(this).parent().parent().next().children().children().children(".user_post_comment").focus();

            $(this).parent().parent().next().children().find('.post_btn_cmmnt ').attr("disabled", false);

            $(this).parent().parent().next().children().find('.post_btn_cmmnt ').css("color", "#33b5e5");

            $;

        });

        $('.user_post_comment').on(function () {
            if ($(this).val() == "") {

            } else {
                $(this).parent().next().children('.post_btn_cmmnt').show();
            }
        });

        $('.user_post_comment').focus(function () {
            $(this).parent().next().children('.post_btn_cmmnt').attr("disabled", false);

            $(this).parent().next().children('.post_btn_cmmnt').css("color", "#33b5e5");
        });

        $('.user_post_comment').focusout(function () {

            let post_comment = $(this).val();

            if (post_comment == "") {

                $(this).parent().next().children('.post_btn_cmmnt').attr("disabled", true);

                $(this).parent().next().children('.post_btn_cmmnt').css("color", '#33b5e5a3');

            }
        });

        $('.post_btn_cmmnt').click(function () {
            let post_comment = $(this).parent().prev().children(".user_post_comment").val();

            if (post_comment == "") {
                // $(this).hide();
            } else {

                let a = $(this).parent().parent().parent().parent().find('.commnts_number_info');

                let likes_number = Number(a.html());

                likes_number += 1;

                a.html(likes_number);

                // $(this).parent().parent().parent().next().prepend();


                $(this).parent().prev().children(".user_post_comment").val('');

                $.ajax({
                    url: 'ajax/comment_to_post.php',
                    type: 'post',
                    data: {
                        post_comment_id: post_comment_id,
                        commenter_id: commenter_id,
                        commenter_comment: post_comment,
                    },                    
                    beforeSend: function () {
    
                        // Before Send Loading Loader set Login Process
                        $('.loader_2021').css("display", "inline");
                    },
                    success: function (data) {
                        if (data == 'success') {
                            // alert(data);
                            // window.location.href = "index.php";
                        }
                        // alert(data);
                        location.reload();
                        $('.loader_2021').css("display", "none");
                    }
                });

            }
        });

        $('.reply_btn_cmmnt').click(function () {

            $(this).parent().parent().parent().parent().parent().parent().parent().prev().find('.user_post_comment ').val("");

            $(this).parent().parent().parent().parent().parent().parent().parent().prev().find('.user_post_comment ').val(replied_username + " ");

            $(this).parent().parent().parent().parent().parent().parent().parent().prev().find(".user_post_comment").focus();
        });

        $('.delete_post').click(function () {

            $(this).parent().parent().parent().parent().parent().parent().remove();

            $.ajax({
                url: 'ajax/delete_post.php',
                type: 'post',
                data: {
                    Post_id: idOfPost,
                },                
                beforeSend: function () {
    
                    // Before Send Loading Loader set Login Process
                    $('.loader_2021').css("display", "inline");
                },
                success: function (data) {
                    $('.loader_2021').css("display", "none");
                }
            });

        });

        $('.unfollow_user_post').click(function () {

            $.ajax({
                url: 'ajax/unfollow_user.php',
                type: 'post',
                data: {
                    following_id: id_of_user_to_be_followed,
                },                
                beforeSend: function () {
    
                    // Before Send Loading Loader set Login Process
                },
                success: function (data) {
                    if (data == 'success') {
                        window.location.href = "index.php";
                    }
                    $('.loader_2021').css("display", "none");
                }
            });
        });

        $('.comment_like_btn').click(function () {
            $(this).addClass('inactive');

            $(this).next().removeClass('inactive');

            let a = $(this).parent().next().find('.comment_like_no');

            let likes_number = Number(a.html());

            likes_number += 1;

            // alert(var_commenter_like_id + var_post_id + var_index_of_comment);

            a.html(likes_number);

            $.ajax({
                url: 'ajax/like_comment.php',
                type: 'post',
                data: {
                    user_id: var_commenter_like_id,
                    post_id: var_post_id,
                    index_of_comment: var_index_of_comment
                },
                beforeSend: function () {

                    // Before Send Loading Loader set Login Process
                    $('.loader_2021').css("display", "inline");
                },
                success: function (data) {
                    // alert(data);
                    $('.loader_2021').css("display", "none");
                }
            });
        });

        $('.comment_dislike_btn').click(function () {
            $(this).addClass('inactive');

            $(this).prev().removeClass('inactive');

            let a = $(this).parent().next().find('.comment_like_no');

            let likes_number = Number(a.html());

            likes_number -= 1;

            a.html(likes_number);

            $.ajax({
                url: 'ajax/like_comment.php',
                type: 'post',
                data: {
                    user_id: var_commenter_like_id,
                    post_id: var_post_id,
                    index_of_comment: var_index_of_comment
                },
                beforeSend: function () {

                    // Before Send Loading Loader set Login Process
                    $('.loader_2021').css("display", "inline");
                },
                success: function (data) {
                    // alert(data);
                    $('.loader_2021').css("display", "none");
                }
            });
        });

        $('.delete_btn_cmmnt').click(function () {

            $(this).parent().parent().parent().parent().parent().remove();

            // console.log($(this).parent().parent().parent().parent().parent().parent().parent().parent().parent());

            $.ajax({
                url: 'ajax/delete_comment.php',
                type: 'post',
                data: {
                    post_id: var_post_id,
                    index_of_comment: var_index_of_comment
                },
                beforeSend: function () {

                    // Before Send Loading Loader set Login Process
                    $('.loader_2021').css("display", "inline");
                },
                success: function (data) {
                    location.reload();
                    $('.loader_2021').css("display", "none");
                }
            });
        });

    };

    all_my_newsfeed();

});