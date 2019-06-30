<?php
require_once('lib/console-config.php');
require_once('lib/session.php');
if(!isset($_SESSION['user_mail']) && !isset($_SESSION['login_user'])){
  header('location:login');
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
.loading {
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: #364760;
    opacity: .99;
}
.loading img {
    width: 40px;
    height: 40px;
    position: absolute;
    left: 50%;
    right: 50%;
    bottom: 50%;
    top: 50%;
    margin: -20px;
}
.fixed-plugin {
    top: 250px !important;
}
</style>
<div class="loading"><img src="assets/img/loading.gif" alt="loading-img"></div>
<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="<?=$CONSOLEURL?>" class="simple-text logo-normal">
          Domain API
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item dashboard">
            <a class="nav-link" href="dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item user-profile">
            <a class="nav-link" href="user">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item apiManager">
            <a class="nav-link" href="apiManager">
              <!-- <i class="material-icons">content_paste</i> -->
              <i class="fa fa-cog fa-2x"> </i>
              <p>API Manager</p>
            </a>
          </li>
          <li class="nav-item api-calls">
            <a class="nav-link" href="ApiLogs">
              <!-- <i class="material-icons">library_books</i> -->
              <i class="material-icons">content_paste</i>
              <p>API calls Log</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?=$DOCSURL?>">
            <i class="material-icons">language</i>
              <p>DOCS</p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="notifications">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li> -->
          <!-- <li class="nav-item ">
            <a class="nav-link" href="./rtl.html">
              <i class="material-icons">language</i>
              <p>RTL Support</p>
            </a>
          </li> -->
          <li class="nav-item active-pro upgrade">
            <a class="nav-link" href="upgrade">
              <i class="material-icons">unarchive</i>
              <p>Plan Activation / Go Pro</p>
            </a>
          </li>
        </ul>
      </div>
    </div>