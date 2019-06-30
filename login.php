<?php session_start();
if(isset($_SESSION['user_mail']) && isset($_SESSION['login_user'])){
  header('location:dashboard');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Domain Api Console Login</title>
  <meta name="keywords" content="domain, domain api, domain availability, domain console">
  <!-- Favicon -->
  <link rel="icon" href="loginAssets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="loginAssets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="loginAssets/vendor/%40fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="loginAssets/css/argon.mine209.css?v=1.0.0" type="text/css">
  <!-- Google Tag Manager -->
  <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NKDMSK6');</script> -->
  <!-- End Google Tag Manager -->
</head>

<body class="bg-default">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <!-- Navbar -->
  <?php include_once("section/nav.php");?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-white">Fill this login form to authenticate yourself and adhere our services by entering Developers Console.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-transparent pb-5">
              <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
              <div class="btn-wrapper text-center">
                <a href="javascript:void(0);" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="loginAssets/img/icons/github.svg"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="javascript:void(0);" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="loginAssets/img/icons/google.svg"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Or sign in with credentials</small>
              </div>
              <form role="form" id="loginForm" method="post" action="php/loginRegister.php?action=login">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" id="email" required autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" id="passwordLogin" required>
                    <div class="input-group-prepend">
                      <span class="input-group-text pwd-section" style="cursor:pointer;" onclick="password_operation()" title="Show Password"><i class="fa fa-eye pwd-visiblity"></i></span>
                    </div>
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id="remember" name="remember" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me on this Computer</span>
                  </label>
                </div>
                <div class="hidden" id="link_verification" style="margin-top:10px;">
                  <a href="javascript:sendVerificationLink()" class="text-muted"><small>Send verification link?</small></a>
                </div>
                <div class="alert alert-danger alert-dismissible alert-error-auth" style="display:none; margin-top:10px;">
                  <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Error!</strong><b id="error"> Authentication Failed.</b>
                </div>
                <div class="alert alert-success alert-dismissible alert-success-link" style="display:none; margin-top:10px;">
                  <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Kudos!</strong><b id="success"> Activation link has been sent to you E-mail Id.</b>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4 loginButton">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="reset" class="text-light"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="signup" class="text-light"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include_once("section/footer.php");?>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="loginAssets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="loginAssets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="loginAssets/vendor/js-cookie/js.cookie.js"></script>
  <script src="loginAssets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="loginAssets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="loginAssets/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
  <!-- Argon JS -->
  <script src="loginAssets/js/argon.mine209.js?v=1.0.0"></script>
  <script src="loginAssets/argon/js/loginregister.js"></script>
</body>
</html>