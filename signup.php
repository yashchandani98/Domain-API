<?php
if(isset($_SESSION['user_mail']) && isset($_SESSION['login_user'])){
  header('location:dashboard');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
        <meta name="author" content="Creative Tim">
        <title>Domain Api Console Register Page</title>
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
      </head>
    <body class="bg-default">
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        
        <div class="main-content">
            <?php include_once("section/nav.php");?>
            <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <h1 class="text-white">Welcome to Domain API Services.</h1>
                    <!-- <h2 class="text-white">
                        Kickstart your Laravel web app like a PRO
                    </h2> -->

                    <p class="text-lead text-light mt-3 mb-0">
                        Sign Up and enjoy our domain services.
                                            </p>
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
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-4"><small>Sign up with</small></div>
                        <div class="text-center">
                            <a href="#" class="btn btn-neutral btn-icon mr-4">
                                <span class="btn-inner--icon"><img src="loginAssets/img/icons/github.svg"></span>
                                <span class="btn-inner--text">Github</span>
                            </a>
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="loginAssets/img/icons/google.svg"></span>
                                <span class="btn-inner--text">Google</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Or sign up with credentials</small>
                        </div>
                        <form role="form" method="POST" id="signupForm" action="php/loginRegister.php?action=signup">
                            <input type="hidden" name="_token" value="U7v3r13NjRU29jjczgMcwxEGm9G1D6XdiDW0DF0X">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Name" type="text" name="name" id="name" required autofocus>
                                </div>
                                                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Email" type="email" name="email" id="email" required>
                                </div>
                                                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                    </div>
                                    <select class="form-control" id="user_type" name="user_type">
                                        <option value="0" selected>Select Profession</option>
                                        <option value="1" >Personal</option>
                                        <option value="2" >Organisation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="alert alert-danger alert-dismissible alert-error-org" style="display:none;">
                                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Blunder!</strong> Please Select your Profession.
                            </div>
                            <div class="form-group" id="org_name_section" style="display:none;">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-building"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Organisation Name" type="text" id="org_name" name="org_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <!-- <i class="ni ni-square-pin"></i> -->
                                            <i class="ni ni-shop"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" placeholder="Address" type="text" id="address" name="address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="ni ni-square-pin"></i>
                                            <!-- <i class="ni ni-shop"></i> -->
                                        </span>
                                    </div>
                                    <input class="form-control" placeholder="City" type="text" id="city" name="city" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="ni ni-planet"></i>
                                            <!-- <i class="ni ni-shop"></i> -->
                                        </span>
                                    </div>
                                    <input class="form-control" placeholder="Country" type="text" id="country" name="country" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="ni ni-pin-3"></i>
                                            <!-- <i class="ni ni-shop"></i> -->
                                        </span>
                                    </div>
                                    <input class="form-control" placeholder="Postal Code" type="number" id="postal" name="postal" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Password" type="password" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Confirm Password" type="password" id="password_confirmation" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="text-muted font-italic password-strength hidden">
                                <small>password strength: <span class="text-success font-weight-700 pwd-alert">strong</span></small>
                            </div>
                            <div class="text-muted font-italic password-confirm hidden">
                                <small><span class="text-success font-weight-700 pwd-alert-confirm"></span></small>
                            </div>
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-muted">I agree with the <a href="javascript:void(0);">Privacy Policy</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-success alert-dismissible alert-success-signup" style="display:none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Kudos!</strong> Confirmation link has been sent to your E-mail Id.
                            </div>
                            <div class="alert alert-danger alert-dismissible alert-error" style="display:none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Blunder!</strong> Please Agree to our privacy policy.
                            </div>
                            <div class="alert alert-danger alert-dismissible alert-error-signup-submit" style="display:none;">
                                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>OOPS!</strong> Something went wrong.
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4 signupButton">Create account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
        <?php include('section/footer.php');?>
        <script src="loginAssets/argon/vendor/jquery/dist/jquery.min.js"></script>
        <script src="loginAssets/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="loginAssets/argon/vendor/js-cookie/js.cookie.js"></script>
        <script src="loginAssets/argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="loginAssets/argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <script src="loginAssets/argon/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
        <!-- Optional JS -->
        <script src="loginAssets/argon/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="loginAssets/argon/vendor/chart.js/dist/Chart.extension.js"></script>

        
        <!-- Argon JS -->
        <script src="loginAssets/argon/js/argone209.js?v=1.0.0"></script>
        <script src="loginAssets/argon/js/loginregister.js"></script>
    <script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","licenseKey":"e436701188","applicationID":"243106736","transactionName":"YlNTZBMEWkMDVRAPDFsZcFMVDFteTUQBAQpGQlRC","queueTime":4,"applicationTime":111,"atts":"ThRQElseSU0=","errorBeacon":"bam.nr-data.net","agent":""}</script></body>
</html>