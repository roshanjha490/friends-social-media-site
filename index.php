<?php

// include contains connect.php file which is connected to our database has
//  Every query related to SQL is in object oriented manner stored in connect.php file
require 'include/connect.php';

session_start();

// If the user is not logged in then this page will get redirected to login.php file
if ($_SESSION['user_key'] == "") {
  header('location:login.php');
} else {
  unset($_SESSION['new_user']);
}

$server_Obj->load_user_session_details($_SESSION['user_key']['id'], $_SESSION['user_key']['password']);

// varible storing the logged in user information stored in session variable as an array
// $user = $_SESSION['user_key'];
// var_dump($user);
clearstatcache();

require 'include/header.php';

?>

<div class="mb_navs w-100">
  <!-- <div class="row"> -->
  <div class="p-0 d-flex justify-content-center align-items-center mb_nav_link active" id="mb_home_link">
    <a href="index.php" class="d-flex justify-content-center align-items-center w-100 h-100">
      <i class="fas fa-home"></i></a>
  </div>
  <div class="p-0 d-flex justify-content-center align-items-center mb_nav_link" id="mb_srch_link">
    <a class="d-flex justify-content-center align-items-center w-100 h-100">
      <i class="fas fa-search"></i></a>
  </div>
  <div class="p-0 d-flex justify-content-center align-items-center mb_nav_link">
    <a href="profile.php?username=<?php echo $_SESSION['user_key']['user_name'] ?>" class="d-flex justify-content-center align-items-center w-100 h-100">
      <i class="fas fa-user-alt"></i></a>
  </div>
  <div class="p-0 d-flex justify-content-center align-items-center mb_nav_link mb_notify_link" id="notify">
    <a class="d-flex justify-content-center align-items-center w-100 h-100">
      <i class="fas fa-bell"></i>
      <span id="new_notifications" class="position-absolute rounded-circle badge badge-danger ml-2">3</span>
    </a>
  </div>
  <div class="p-0 d-flex justify-content-center align-items-center mb_nav_link" id="other_activity">
    <a class="d-flex justify-content-center align-items-center w-100 h-100">
      <i class="fas fa-bars"></i></a>
  </div>
  <!-- </div> -->
</div>


<div id="mb_newfeed" class="w-100" style="margin-top: 10px">
  <div class="row">
    <div class="new_for_user_info col-xl-3 col-lg-3 col-md-0 col-sm-0 col-12 px-2 m-0 w-100 h-auto">
      <div class="userInfo position-sticky w-100">
        <?php include 'include/user_Info.php'; ?>
      </div>
    </div>

    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12 col-12 px-2 m-0 w-100 h-auto">
      <div class="userNewsFeed w-100">
        <?php include 'include/user_newsfeed.php'; ?>
      </div>
    </div>

    <div id="new_for_user_activity" class="new_for_user_activity col-xl-4 col-lg-4 col-md-5 col-sm-0 col-4 px-2 m-0 w-100 h-auto">
      <div class="user_activity position-sticky w-100">
        <?php include 'include/user_activity.php'; ?>
      </div>
    </div>

  </div>
</div>




<div class="px-2 m-0 w-100 h-auto" id="mb_srch">

</div>

<div class="user_activity position-fixed bg-white mb_notification_info overflow-auto" id="mb_notification">

</div>

<div class="px-2 m-0 w-100 h-100 user_activity position-fixed bg-white overflow-auto" id="mb_other_activity">
  <div class="w-100 h-auto">

    <div class="row">

      <a href="profile.php?username=<?php echo $user['user_name']; ?>" class="col-12 mb-3 w-100 h-auto">

        <div class="w-100 mb_activity_hgt">
          <!-- <div class="row"> -->
          <div class="d-inline h-100">
            <img src="<?php echo $user['profile_pic'] ?>" alt="" class="h-100">
          </div>
          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <p class="m-0"> <?php echo $user['full_name'] ?> </p>
          </div>
          <!-- </div> -->
        </div>

      </a>

      <a href="profile.php?username=<?php echo $user['user_name']; ?>&user_edit=true" class="col-12 mb-3 w-100 h-auto">

        <div class="mb_activity_hgt">
          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <i class="fas fa-user-edit"></i>
          </div>

          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <p class="m-0"> Edit Profile</p>
          </div>
        </div>

      </a>

    </div>

    <div class="col-12 w-100 h-auto h_s py-2 px-2">
      <div class="w-100 h-auto">
        <p class="m-0"> <b>Help & Settings</b></p>
      </div>
    </div>

    <div class="row">

      <a class="col-12 mb-3 w-100 h-auto">

        <div class="mb_activity_hgt">
          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <i class="fas fa-language"></i>
          </div>

          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <p class="m-0">Language</p>
          </div>
        </div>

      </a>

      <a class="col-12 mb-3 w-100 h-auto">

        <div class="mb_activity_hgt">
          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <i class="fas fa-question-circle"></i>
          </div>

          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <p class="m-0">Help Center</p>
          </div>
        </div>

      </a>

      <a class="col-12 mb-3 w-100 h-auto">

        <div class="mb_activity_hgt">
          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <i class="fas fa-cog"></i>
          </div>

          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <p class="m-0">Settings</p>
          </div>
        </div>

      </a>

      <a class="col-12 mb-3 w-100 h-auto">

        <div class="mb_activity_hgt">
          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <i class="fas fa-user-secret"></i>
          </div>

          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <p class="m-0">Privacy Shortcuts</p>
          </div>
        </div>

      </a>

      <a class="col-12 mb-3 w-100 h-auto">

        <div class="mb_activity_hgt">
          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <i class="fas fa-bug"></i>
          </div>

          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <p class="m-0">Report a Problem</p>
          </div>
        </div>

      </a>

      <a class="col-12 mb-3 w-100 h-auto">

        <div class="mb_activity_hgt">
          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <i class="fas fa-ankh"></i>
          </div>

          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <p class="m-0">Terms & Policies</p>
          </div>
        </div>

      </a>

      <a href="logout.php" class="col-12 mb-3 w-100 h-auto">

        <div class="mb_activity_hgt">
          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <i class="fas fa-sign-out-alt"></i>
          </div>

          <div class="w-auto h-100 d-inline-flex justify-content-center align-items-center px-2">
            <p class="m-0">Logout</p>
          </div>
        </div>

      </a>

    </div>

  </div>
</div>


<?php

require 'include/footer.php';

?>