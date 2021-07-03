
$(document).ready(function () {

    $.ajax({
        url: 'ajax/new_notifications.php',
        type: 'post',
        data: {
            user_id: current_user_id
        },
        success: function (response) {
            if (response == 0) {
                // alert(response);
                $('#new_notifications').hide();
            } else {
                $('#new_notifications').show();
                $('#new_notifications').html(response);
            }
        }

    });

    function all_navbar_functions() {

        $('.follow_notifications').click(function () {

            $.ajax({
                url: 'ajax/loadaction.php',
                type: 'post',
                data: {
                    action_status: notify_array_status,
                    array_id: notify_array_id,
                    action_type: notify_type
                },
                success: function (response) {
                    // alert(response);
                    window.location.href = response;
                }

            });

        });

    }

    all_navbar_functions();

    $('#notify').click(function () {

        showNotify = !showNotify;

        if (showNotify == true) {
            $('#notification_info').show();
            $('#black_bx').show();
        } else {
            $('#notification_info').hide();
            $('#black_bx').hide();
        }

        $.ajax({
            url: 'ajax/loadNotifications.php',
            type: 'post',
            data: {
                user_id: current_user_id
            },
            beforeSend: function () {
                $('#ajax_loaded_notifications').html('');
                $('#ajax_loaded_notifications').html(`<div class="w-100 h-100 p-4 d-flex justify-content-center align-items-center" id="loader">
                        <img src="img/loader.gif" alt="">
                      </div>`);
            },
            success: function (response) {
                if (response == "") {

                } else {
                    $('#ajax_loaded_notifications').html('');

                    $('#ajax_loaded_notifications').html(response);

                    $('#new_notifications').hide();
                }

                all_navbar_functions();
            }

        });

    });

    $('#black_bx').click(function () {

        showNotify = !showNotify;

        if (showNotify == true) {
            $('#notification_info').show();
            $('#black_bx').show();
        } else {
            $('#notification_info').hide();
            $('#black_bx').hide();
        }

    });

    // window.setInterval(function() {
    //   /// call your function here
    //   $.ajax({
    //     url: 'ajax/new_notifications.php',
    //     type: 'post',
    //     data: {
    //       user_id: current_user_id
    //     },
    //     success: function(response) {
    //       if (response == 0) {
    //         // alert(response);
    //         $('#new_notifications').hide();
    //       } else {
    //         $('#new_notifications').show();
    //         $('#new_notifications').html(response);
    //       }
    //       all_navbar_functions();
    //     }

    //   });

    // }, 10000);

});