$(document).ready(function () {

    let srch = $('#new_for_user_activity').html();

    let notify = $('#notification_info').html();

    let nv_br_html = $('.nav_bar').html();

    let scrn_wdth = $(window).width();

    let mb_newfeed_html = $('#mb_newfeed').html();

    $(window).resize(function () {
        for_chng_in_scrn_wdth();
    });

    function for_chng_in_scrn_wdth() {

        if ($(window).width() < 767) {

            $(".mb_navs").show();

            $(".nav_bar").hide();

            $('#new_for_user_activity').html(' ');

            $('#notification_info').html(' ');

            $('#mb_notification').html(notify);

            $('#mb_srch').html(srch);

            $('.nav_bar').html(' ');
        }
        else {

            $(".mb_navs").hide();

            $(".nav_bar").show();

            $('#new_for_user_activity').html(srch);

            $('#notification_info').html(notify);

            $('#mb_notification').html(' ');

            $('#mb_srch').html(' ');

            $('.nav_bar').html(nv_br_html);

            $('#mb_newfeed').html(mb_newfeed_html);
        }
    }

    for_chng_in_scrn_wdth();

    $('#mb_srch_link').click(function () {
        $(this).addClass('active');

        $('#mb_home_link').removeClass('active');

        $('.mb_notify_link').removeClass('active');

        $('#other_activity').removeClass('active');

        $('#mb_newfeed').html(" ");

        $('#mb_notification').hide();

        $('#mb_other_activity').hide();

        $('#mb_srch').show();

    });

    $('.mb_notify_link').click(function () {
        $(this).addClass('active');

        $('#mb_srch_link').removeClass('active');

        $('#other_activity').removeClass('active');

        $('#mb_home_link').removeClass('active');

        $('#mb_newfeed').html(" ");

        $('#mb_srch').hide();

        $('#mb_other_activity').hide();

        $('#mb_notification').show();
    });

    $('#other_activity').click(function () {
        $(this).addClass('active');

        $('#mb_srch_link').removeClass('active');

        $('.mb_notify_link').removeClass('active');

        $('#mb_home_link').removeClass('active');

        $('#mb_newfeed').html(" ");

        $('#mb_srch').hide();

        $('#mb_notification').hide();

        $('#mb_other_activity').show();
    });
});