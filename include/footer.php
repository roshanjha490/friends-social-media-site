<!-- jQuery -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Variables by php codes -->
<script type="text/javascript">
    let current_user_id = '<?php echo $_SESSION['user_key']['id'] ?>';

    let newVar_2 = '<?php echo $_SESSION['user_key']['id'] ?>';

    <?php

    if (@$_GET['username']) {
        if ($_GET['username'] == $_SESSION['user_key']['user_name']) {

            $GLOBALS['otherUser'] = $server_Obj->load_profile_info($_GET['username']);
    ?>

            let newVar_1 = <?php echo $otherUser['id'] ?>;


            let newVar_3 = <?php echo $otherUser['id'] ?>;

            let current_username = '<?php echo ltrim($otherUser['user_name'], '@') ?>';

        <?php
            // header('location:profile.php');
        } else {
            $GLOBALS['otherUser'] = $server_Obj->load_profile_info($_GET['username']);

        ?>
            let newVar_1 = <?php echo $otherUser['id'] ?>;


            let newVar_3 = <?php echo $otherUser['id'] ?>;
    <?php
        }
    }

    ?>

    //Ajax method that gets started when an file is choosen
    $(document).ready(function() {

        $(".unfollow_user").hover(function() {
            $(this).html('Unfollow');
        }, function() {
            $(this).html('Following');
        });

        $(".unfollow_user_2").hover(function() {
            $(this).html('Unfollow');
        }, function() {
            $(this).html('Following');
        });
    });
</script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript" src="js-new/main.js"></script>
<script type="text/javascript" src="js-new/mb_navs.js"></script>
<script type="text/javascript" src="js-new/navbar.js"></script>
<script type="text/javascript" src="js-new/user_edit_details.js"></script>
<script type="text/javascript" src="js-new/user_newsfeed.js"></script>
<script type="text/javascript" src="js-new/user-activity.js"></script>
<script type="text/javascript" src="js-new/other_user.js"></script>
<script type="text/javascript" src="js-new/post.js"></script>

</body>

</html>