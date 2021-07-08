
$(document).ready(function () {

    $('#show_edit_form').click(function () {
        $('#user_edit_details').hide();

        $('#user_edit_form').show();

    });

    $(document).on('change', '#file_input_for_cover_pic', function () {
        var property = document.getElementById("file_input_for_cover_pic").files[0];

        var imageName = property.name;

        var img_extension = imageName.split('.').pop().toLowerCase();

        if (jQuery.inArray(img_extension, ['gif', 'png', 'jpg', 'jpeg',]) == -1) {
            alert("Invalid File Format");
        } else {

            var form_data = new FormData();

            form_data.append("file", property);

            $.ajax({
                url: 'ajax/uploadImg.php',
                type: 'post',
                data: form_data,
                beforeSend: function () {

                    // Before Send Loading Loader set Login Process
                    $('.loader_2021').css("display", "inline");

                    // console.log(form_data);
                },
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#cover_pic_edit').attr("src", data);
                    $('.loader_2021').css("display", "inline");
                }
            });
        }

    });

    $(document).on('change', '#file_input_for_profile_pic', function () {
        var property = document.getElementById("file_input_for_profile_pic").files[0];

        var imageName = property.name;

        var img_extension = imageName.split('.').pop().toLowerCase();

        if (jQuery.inArray(img_extension, ['gif', 'png', 'jpg', 'jpeg',]) == -1) {
            alert("Invalid File Format");
        } else {

            var form_data = new FormData();

            form_data.append("file", property);

            $.ajax({
                url: 'ajax/uploadImg.php',
                type: 'post',
                data: form_data,
                beforeSend: function () {

                    // Before Send Loading Loader set Login Process
                    $('.loader_2021').css("display", "inline");

                    // console.log(form_data);
                },
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#profile_pic_edit').attr("src", data);
                    $('.loader_2021').css("display", "none");
                }
            });
        }

    });

    // let current_username  = $('#user_edit_username').val();

    $("#user_edit_username").keyup(function () {

        // useraname varible storing the unique username the New User has given
        var username = $('#user_edit_username').val();

        if (username == current_username) {

            $('#loader_f_edit').css("display", "none");
            $('#error').html('');
            $('#user_edit_username').css("color", "black");

        } else {

            let inputVal = $("#user_edit_username").val();

            if (inputVal == '') {
                $('#loader_f_edit').css("display", "none");
                $('#user_edit_username').css("color", "red");
                $("#Submit_user_edit").attr("disabled", true);
                $('#error').html('Enter a Username!');
            } else {

                $.ajax({
                    url: 'ajax/username_check.php',
                    type: 'post',
                    data: {
                        username: username,
                    },
                    beforeSend: function () {

                        // Before Send Loading Loader set Login Process
                        // $('#signIn').attr("disabled", true);

                        $('#loader_f_edit').css("display", "inline");
                    },
                    success: function (response) {

                        // if (response == "u_rght") {
                        //     $("#Submit_user_edit").attr("disabled", false);
                        //     $('#error').html('');
                        //     $('#user_edit_username').css("color", "black");
                        // } else {
                        //     $('#user_edit_username').css("color", "red");
                        //     $("#Submit_user_edit").attr("disabled", true);
                        //     $('#error').html('Username already exists!');
                        // }

                        // $('#loader_f_edit').css("display", "none");

                        if (response == "U_val_wrg") {
                            $('#user_edit_username').css("color", "red");
                            $("#Submit_user_edit").attr("disabled", true);
                            // $('#error').html(`Must start with letter having 3 - 32 characters with Letters and numbers only`);
                            $('#error').html(`This Username is not valid`);
                            $('#error').css('color', 'red');

                        } else {

                            if (response == "u_rght") {
                                $("#Submit_user_edit").attr("disabled", false);
                                $('#error').html('You Choose a nice name for you');
                                $('#error').css('color', 'green');
                                $('#user_edit_username').css("color", "black");
                            } else {
                                $('#user_edit_username').css("color", "red");
                                $("#Submit_user_edit").attr("disabled", true);
                                $('#error').css('color', 'red');
                                $('#error').html('Username already exists!');
                            }

                        }
                        $('#loader_f_edit').css("display", "none");
                    }

                });

            }
        }
    });

    $('#Submit_user_edit').click(function () {

        user_fullname = $('#user_edit_name').val();

        user_username = '@' + $('#user_edit_username').val();

        user_bio = $('#user_edit_bio').val();

        user_email = $('#user_edit_email').val();

        user_location = $('#user_edit_location').val();

        user_privacy_status = $('#user_edit_status').val();

        user_gender = $('#user_edit_gender').val();

        user_birth_date = $('#user_edit_birth_date').val();

        validation_number = 0;

        reg1 = /^\b[A-Z0-9._%()-]+@[A-Z]+\.[A-Z]{2,3}\b$/i;

        if (user_fullname == '') {
            $('#user_edit_name').val();

            $('#user_edit_name').attr("placeholder", "*Enter a Name");

            $('#user_edit_name').addClass("your-text");
        } else {
            validation_number += 1;
            // alert(validation_number);
        }

        if (user_username == '') {
            $('#user_edit_username').val();

            $('#user_edit_username').attr("placeholder", "*Enter a Username");

            $('#user_edit_username').addClass("your-text");
        } else {
            validation_number += 1;
            // alert(validation_number);
        }

        if (user_email == '') {
            $('#user_edit_email').val();

            $('#user_edit_email').attr("placeholder", "*Enter an E-mail");

            $('#user_edit_email').addClass("your-text");
        } else {
            validation_number += 1;

            // alert(validation_number);
        }

        if (reg1.test(user_email)) {

            validation_number += 1;

            // alert(validation_number);
        } else {
            $('#user_edit_email').val('');

            $('#user_edit_email').attr("placeholder", "*Enter an E-mail");

            $('#user_edit_email').addClass("your-text");
        }

        if (user_location == '') {
            $('#user_edit_location').val('');

            $('#user_edit_location').attr("placeholder", "*Enter a Location");

            $('#user_edit_location').addClass("your-text");
        } else {
            validation_number += 1;
        }

        if (user_bio.length >= 120) {
            $('#user_edit_bio').val('');

            $('#user_edit_bio').attr("placeholder", "*Your Bio should have less than 120 charecters");

            $('#user_edit_bio').addClass("your-text");
            // alert('ascascas');
        } else {
            validation_number += 1;
            // alert('llll');
        }

        if (user_birth_date == '') {
            $('#user_edit_birth_date').val();

            $('#user_edit_birth_date').attr("placeholder", "*Enter a valid Birth Date");

            $('#user_edit_birth_date').addClass("your-text");
        } else {
            validation_number += 1;
        }

        if (validation_number == 7) {

            // alert(newVar_id);
            $.ajax({
                url: 'ajax/edit_user_information.php',
                type: 'post',
                data: {
                    user_id: current_user_id,
                    profile_pic: $('#profile_pic_edit').attr("src"),
                    cover_pic: $('#cover_pic_edit').attr("src"),
                    user_fullname: user_fullname,
                    user_username: user_username,
                    user_bio: user_bio,
                    user_email: user_email,
                    user_location: user_location,
                    user_privacy_status: user_privacy_status,
                    user_gender: user_gender,
                    user_birth_date: user_birth_date,
                },
                success: function (response) {
                    if (response == 'success') {
                        window.location.href = "index.php";
                    }
                }

            });
        } else {
            // alert('this is wiotr');
        }

    });

    $('#Cancel_user_edit').click(function () {

        $('#user_edit_details').show();

        $('#user_edit_form').hide();

    });

    $('#showpassward_change_form').click(function () {
        $("#Submit_user_edit").attr("disabled", true);
        $('#edit_psswrd_form').css('display', 'inline');
        $('#update_password_btns').css('display', 'inline');
        $('#showpassward_change_form').hide();
    });


    $('#cancel_password_change_form').click(function () {
        $("#Submit_user_edit").attr("disabled", false);
        $('#edit_psswrd_form').css('display', 'none');
        $('#update_password_btns').css('display', 'none');
        $('#showpassward_change_form').show();
    });

    $('.see_psswrd').click(function () {
        $(this).prev().attr("type", "text");
        $(this).next().show();
        $(this).hide();
    });

    $('.unsee_psswrd').click(function () {
        $(this).prev().prev().attr("type", "password");
        $(this).prev().show();
        $(this).hide();
    });

    $('#Update_passward').click(function () {
        let current_psswrd = $('#current_psswrd').val();
        let new_psswrd = $('#new_psswrd').val();
        let confirm_psswrd = $('#confirm_psswrd').val();

        validate_psswrd = 0;

        if (current_psswrd == '') {
            $('#current_psswrd').val();

            $('#current_psswrd').attr("placeholder", "*Enter your current password");

            $('#current_psswrd').addClass("your-text");
        } else {
            validate_psswrd += 1;
        }


        if (new_psswrd == '') {
            $('#new_psswrd').val();

            $('#new_psswrd').attr("placeholder", "*Enter a password");

            $('#new_psswrd').addClass("your-text");
        } else {
            validate_psswrd += 1;
        }

        if (new_psswrd.length < 6) {
            $('#new_psswrd').val('');

            $('#new_psswrd').attr("placeholder", "*Enter a valid 6 digit password");

            $('#new_psswrd').addClass("your-text");
        } else {
            validate_psswrd += 1;
        }


        if (confirm_psswrd == new_psswrd) {
            validate_psswrd += 1;
        } else {
            $('#confirm_psswrd').val('');

            $('#confirm_psswrd').attr("placeholder", "*Password does not Match");

            $('#confirm_psswrd').addClass("your-text");
        }


        if (validate_psswrd == 4) {
            // alert(confirm_psswrd+new_psswrd+current_psswrd);

            $.ajax({
                url: 'ajax/update_psswrd.php',
                type: 'post',
                data: {
                    user_id: '<?php echo $user_id ?>',
                    old_psswrd: current_psswrd,
                    new_psswrd: new_psswrd,
                },
                success: function (data) {
                    if (data == 'crnt_p') {

                        $('#current_psswrd').val('');

                        $('#current_psswrd').attr("placeholder", "*Wrong current Password");

                        $('#current_psswrd').addClass("your-text");
                    }

                    if (data == 'failed') {
                        alert('Password not changed');
                    }

                    if (data == 'success') {
                        alert('Password Changed');
                        $("#Submit_user_edit").attr("disabled", false);
                        $('#edit_psswrd_form').css('display', 'none');
                        $('#update_password_btns').css('display', 'none');
                        $('#showpassward_change_form').show();
                        $('#new_psswrd').val('');
                        $('#confirm_psswrd').val('');
                        $('#current_psswrd').val('');

                    }
                }
            });
        }

    });

});