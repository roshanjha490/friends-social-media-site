
$(document).ready(function () {


    let a = $('#srch_results').html();

    function srch_in_ajax() {

        $('.follow_user').click(function () {

            $(this).css('display', 'none');
            $(this).next().css('display', 'inline');

            $.ajax({
                url: 'ajax/follow_user.php',
                type: 'post',
                data: {
                    following_id: id_of_user_to_be_followed,
                },
                beforeSend: function () {

                    // Before Send Loading Loader set Login Process
                    $('.loader_2021').css("display", "inline");
                },
                success: function (data) {
                    $('.loader_2021').css("display", "none");
                    
                    // $('.showerror').html(data);
                }
            })
        });


        $('.unfollow_user').click(function () {

            $(this).css('display', 'none');
            $(this).prev().css('display', 'inline');

            $.ajax({
                url: 'ajax/unfollow_user.php',
                type: 'post',
                data: {
                    following_id: id_of_user_to_be_followed,
                },
                beforeSend: function () {

                    // Before Send Loading Loader set Login Process
                    $('.loader_2021').css("display", "inline");
                },
                success: function (data) {
                    
                    // $('.showerror').html(data);
                    $('.loader_2021').css("display", "none");
                }
            });
        });

        $('#searchForAccounts').keyup(function () {

            searchterm = $(this).val();

            if (searchterm == "" || searchterm == " ") {
                $('#top_accounts').hide();
                $('#suggestion').show();
                $('#srch_results').show();
                $('#srch_results').html(a);
                $('#loader_on_search').hide();
            } else {

                $.ajax({
                    url: 'ajax/search_user.php',
                    type: 'post',
                    data: {
                        searchVal: searchterm
                    },
                    beforeSend: function () {
                        $('#top_accounts').hide();
                        $('#suggestion').hide();
                        $('#srch_results').hide();
                        $('#loader_on_search').show();
                    },
                    success: function (data) {
                        if (data == "No Results") {
                            $('#top_accounts').hide();
                        }
                        $('#srch_results').html(" ");
                        $('#srch_results').show();
                        $('#srch_results').html(data);
                        $('#top_accounts').show();
                        $('#loader_on_search').hide();
                        srch_in_ajax();
                    }
                });
            }
        });

    }

    srch_in_ajax();

});