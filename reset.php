<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
                <meta name="author" content="Creative Tim">
                <title>Domain Api Console Reset Password Page</title>
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
        <!-- End Google Tag Manager (noscript) -->
        
        <div class="main-content">
            <!-- Navbar items -->
            <?php include_once('section/nav.php');?>
<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-9">
                    <h1 class="text-white">Welcome!</h1>
                    <h2 class="text-white">
                        Enter your Regitered E-mail Id
                    </h2>

                    <p class="text-lead text-light mt-3 mb-0">
                        We will send you reset password link through which you could set your new password.
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
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Reset password</small>
                        </div>

                        
                        <form role="form" method="POST" action="php/loginRegister.php?action=resetPwd" id="resetPwdForm">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Email" type="email" name="email" required autofocus>
                                </div>
                            </div>
                            <div class="alert alert-danger alert-dismissible alert-error-auth" style="display:none;">
                                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Error!</strong> Something went wrong.
                            </div>
                            <div class="alert alert-success alert-dismissible alert-success-auth" style="display:none;">
                                <a href="javascript:void(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Kudos!</strong> Password Reset Link has been sent to your Email-Id.
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4 pwdResetBtn">Send Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
                        </div>

        <?php include_once('section/footer.php');?>
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
        <script src="loginAssets/argon/js/demo.min.js"></script>
        <script src="loginAssets/argon/js/loginregister.js"></script>
    <script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","licenseKey":"e436701188","applicationID":"243106736","transactionName":"YlNTZBMEWkMDVRAPDFsZcFMVDFteTUYFFRBCWUNUTxdRQRdTFxI=","queueTime":4,"applicationTime":78,"atts":"ThRQElseSU0=","errorBeacon":"bam.nr-data.net","agent":""}</script>
</body>    
</html>