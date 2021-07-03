$(document).ready(function () {


    function after_get_followers() {

        $('.follow_user_2').click(function () {

            // $(this).css('display', 'none');
            // $(this).next().css('display', 'inline');

            $.ajax({
                url: 'ajax/follow_user.php',
                type: 'post',
                data: {
                    following_id: id_of_user_to_be_followed,
                },
                success: function (data) {

                    location.reload();

                }
            })
        });


        $('.unfollow_user_2').click(function () {

            // $(this).css('display', 'none');
            // $(this).prev().css('display', 'inline');

            $.ajax({
                url: 'ajax/unfollow_user.php',
                type: 'post',
                data: {
                    following_id: id_of_user_to_be_followed,
                },
                success: function (data) {

                    location.reload();

                }
            });
        });


        $('#followers_request').click(function () {

            $('#exampleModalCenterTitle').text('Followers');

            $('#loader_for_user_info').show();

            // alert('acva');

            let userid = newVar_1;

            $.ajax({
                url: 'ajax/get_followers.php',
                type: 'post',
                data: {
                    id: userid,
                    current_user: newVar_2,
                },
                success: function (data) {
                    $('#ajax_results').html(data);

                    $('#loader_for_user_info').hide();

                    after_get_followers();

                }
            });
        });

        $('#following_request').click(function () {

            $('#exampleModalCenterTitle').text('Following');

            $('#loader_for_user_info').show();

            $('#ajax_results').html('');

            let userid = newVar_3;

            // alert(userid + newVar_2);

            $.ajax({
                url: 'ajax/get_following.php',
                type: 'post',
                data: {
                    id: userid,
                    current_user: newVar_2,
                },
                success: function (data) {
                    $('#loader_for_user_info').hide();

                    $('#ajax_results').html(data);

                    after_get_followers();

                }
            });
        });

        $('.blockUser_in_it').click(function () {

            $.ajax({
                url: 'ajax/block_user.php',
                type: 'post',
                data: {
                    id: current_user_id,
                    sh_be_block: be_block,
                },
                success: function (data) {
                    // $('#error').html(data);
                    location.reload();

                }
            });

        });


        $('.request_follow').click(function () {

            $(this).css('display', 'none');
            $(this).next().css('display', 'inline');

            // alert('acsc');

            $.ajax({
                url: 'ajax/request_follow.php',
                type: 'post',
                data: {
                    requested_id: id_of_user_to_be_followed,
                },
                success: function (data) {
                    alert(data);
                }
            })


        });

        $('.cancel_request_follow').click(function () {

            $(this).css('display', 'none');
            $(this).prev().css('display', 'inline');

            $.ajax({
                url: 'ajax/request_follow.php',
                type: 'post',
                data: {
                    requested_id: id_of_user_to_be_followed,
                },
                success: function (data) {
                    alert(data);

                }
            })


        });

        $('.accept_request').click(function () {

            alert('Acs');

            $.ajax({
                url: 'ajax/request_accept.php',
                type: 'post',
                data: {
                    requested_id: id_of_user_to_be_followed,
                },
                success: function (data) {
                    // location.reload();

                    $('#erroe').html(data);

                    // alert(data);
                }
            })


        });

    }

    after_get_followers();

});