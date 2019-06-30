<?php require('lib/console-config.php');
require('lib/session.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
  ::-webkit-scrollbar {
  width: 9px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #2a5699; 
  width: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #5e72e4; 
  width: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #836fff; 
}
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
</style>
<div class="loading"><img src="assets/img/loading.gif" alt="loading-img"></div>
<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="<?=$CONSOLEURL?>">
        <img src="assets/img/logo.jpg" style="height: 100px !important;">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="<?=$CONSOLEURL?>">
                <img src="assets/img/logo.jpg" style="height: 60px !important;">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="pricing" class="nav-link">
              <span class="nav-link-inner--text">Pricing</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="login" class="nav-link">
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="signup" class="nav-link">
              <span class="nav-link-inner--text">Register</span>
            </a>
          </li>
        </ul>
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank" data-toggle="tooltip" data-original-title="Like us on Facebook">
              <i class="fab fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Instagram">
              <i class="fab fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Twitter">
              <i class="fab fa-twitter-square"></i>
              <span class="nav-link-inner--text d-lg-none">Twitter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://github.com/creativetimofficial" target="_blank" data-toggle="tooltip" data-original-title="Star us on Github">
              <i class="fab fa-github"></i>
              <span class="nav-link-inner--text d-lg-none">Github</span>
            </a>
          </li>
          <li class="nav-item d-none d-lg-block ml-lg-4">
            <a href="https://www.creative-tim.com/product/argon-dashboard-pro" target="_blank" class="btn btn-neutral btn-icon">
              <span class="btn-inner--icon">
                <i class="fas fa-shopping-cart mr-2"></i>
              </span>
              <span class="nav-link-inner--text">Purchase now</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>