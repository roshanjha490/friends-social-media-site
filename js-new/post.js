
$(document).ready(function () {

    function after_post_likers() {


        $('.follow_user_in_modal').click(function () {

            $(this).css('display', 'none');
            $(this).next().css('display', 'inline');

            $.ajax({
                url: 'ajax/follow_user.php',
                type: 'post',
                data: {
                    following_id: id_of_user_to_be_followed,
                },
                success: function (data) {

                    // $('.showerror').html(data);
                }
            })
        });


        $('.unfollow_user_in_modal').click(function () {

            $(this).css('display', 'none');
            $(this).prev().css('display', 'inline');

            $.ajax({
                url: 'ajax/unfollow_user.php',
                type: 'post',
                data: {
                    following_id: id_of_user_to_be_followed,
                },
                success: function (data) {

                    // $('.showerror').html(data);
                }
            });
        });


        $('.new_rct_like_info').click(function () {

            $('#exampleModalCenterTitle').text('Post Likes');

            $('#loader_for_user_info').show();

            $.ajax({
                url: 'ajax/get_post_likes.php',
                type: 'post',
                data: {
                    post_id_f_ajax: new_post_id,
                },
                success: function (data) {

                    $('#ajax_results').html(data);

                    $('#loader_for_user_info').hide();

                    after_post_likers()
                }
            });
        });

    }

    after_post_likers();

});