<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    API MAnager by Domain API
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <style>
    .theme #theme{
      font-size: 20px !important;
    }
    pre, .pre-style {
    font: 14px/20px Roboto Mono,monospace;
    margin: 16px 0;
    overflow-x: auto;
    padding: 8px;
    position: relative;
}
code, pre, .pre-style {
    background: #f7f7f7;
    color: #37474f;
    font: 400 100%/1 Roboto Mono,monospace;
    padding: 1px 4px;
}
    blockquote {
  background: #f9f9f9;
  border-left: 10px solid #ccc;
  margin: 1.5em 10px;
  /* padding: 0.5em 10px; */
  /* quotes: "\201C""\201D""\2018""\2019"; */
}
blockquote:before {
  color: #ccc;
  /* content: open-quote; */
  font-size: 4em;
  line-height: 0.1em;
  margin-right: 0.25em;
  vertical-align: -0.4em;
}
blockquote p {
  display: inline;
}
.prettyprint{
  /* background: url("assets/img/blockquotes-bg.jpg"); */
  background-color:#212121;
  background-position: top left;
  background-repeat: repeat;
  border: none;
  color: #fff;
  /* padding-left: 50px; */
  position: relative;
}
.card-title{
  text-align:center;
}
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <?php include_once('section/sidebar.php');?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include_once('section/nav-panel.php');?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h3 class="card-title">API Manager</h3>
              <p class="card-category">Generate/Delete/Revise your API keys here.
              </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                <h4 class="card-title">Current API Key</h4>
                <?php
                 $userId=$_SESSION['user_id'];
                 $plan_query=mysqli_query($CONN,"SELECT `tbl_user_plans`.*,`tbl_apis`.* FROM `tbl_user_plans` INNER JOIN `tbl_apis` ON `tbl_user_plans`.`current_api_id`=`tbl_apis`.`pk_id` WHERE `tbl_user_plans`.`status`='1' AND `tbl_user_plans`.`fk_id`='$userId'");
                 $op=0;
                 if(mysqli_num_rows($plan_query)>0){
                  $op=1;
                  $plan_rows=mysqli_fetch_assoc($plan_query);
                  $apiKey=$plan_rows['api'];
                  $generatedDate=date('d-m-Y',strtotime($plan_rows['registered_date']));
                  $generatedTime=date('H:i:s',strtotime($plan_rows['registered_date']));
                  $renewalDate=date('d-m-Y',strtotime($plan_rows['renewal_date']));
                  $renewalTime=date('H:i:s',strtotime($plan_rows['renewal_date']));
                  $calls=$plan_rows['no_calls'];
                  $planId=$plan_rows['plan_id'];
                  $yash_query=mysqli_query($CONN,"SELECT * FROM `tbl_plans` WHERE `pk_id`='$planId'");
                  $yash_rows=mysqli_fetch_assoc($yash_query);
                  $planName=$yash_rows['Name'];
                  $planCalls=$yash_rows['Api_calls'];
                 }
                ?>
<pre class="prettyprint"><div class="devsite-code-button-wrapper" style="float:right; margin-top:0px;margin-top:-20px;">
  <span class="devsite-code-button gc-analytics-event material-icons devsite-dark-code-button" style="cursor:pointer;padding-bottom: 5px;" id="theme" data-toggle="tooltip" data-placement="right" title="Light code Theme" onclick="themeChanger()">
  <i class="fa fa-sun-o theme"></i>
</span>
<?php if($op==1){?>
  <span class="devsite-code-button gc-analytics-event material-icons devsite-click-to-copy-button" style="cursor:pointer;" data-toggle="tooltip" data-placement="right" onclick="copy('<?=$apiKey?>')" title="Click to copy!">
<?php } else{?>
  <span class="devsite-code-button gc-analytics-event material-icons devsite-click-to-copy-button" style="cursor:pointer;" data-toggle="tooltip" data-placement="right" onclick="copy(0)" title="Click to copy!">
<?php }?>
  <i class="fa fa-copy theme2"></i>
</span>
</div>
                <span class="pln"><?php if($op==1){?> <?=$apiKey?> <?php } else{?> Currently no API Key generated! <?php }?></span></pre>
                
                </div>
                <div class="col-md-6">
                  <h4 class="card-title">API/Plan Information</h4>
                  <div class="alert alert-info alert-with-icon" data-notify="container">
                    <i class="material-icons" data-notify="icon">info</i>
                    <span data-notify="message"><?php if($op==1){?>Registered Date/Time: <b><?=$generatedDate?>(<?=$generatedTime?>)</b>
                      <br/>Renewal Date/Time: <b><?=$renewalDate?>(<?=$renewalTime?>)</b><br/>
                      Plan Name: <b><?=$planName?></b><br/>
                      API Calls: <b><?=$calls?>/<?=$planCalls?></b>
                    <?php } else{?>
                      No API Generated yet
                      <?php }?></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="places-buttons">
                <div class="row">
                  <div class="col-md-6 ml-auto mr-auto text-center">
                    <h4 class="card-title">
                      API Key Generator
                      <p class="category">Select Plan and generate API Key</p>
                    </h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Plan:</label>
                          <?php 
                          $plan_query=mysqli_query($CONN,"SELECT `tbl_user_plans`.* ,`tbl_plans`.`Name` FROM `tbl_user_plans` INNER JOIN `tbl_plans` ON `tbl_user_plans`.`plan_id`=`tbl_plans`.`pk_id` WHERE `tbl_user_plans`.`status`='1' AND `fk_id`='$userId'");
                          if(mysqli_num_rows($plan_query)>0){
                            $plan_rows=mysqli_fetch_assoc($plan_query);
                            $planName=$plan_rows['Name'];
                            $planId=$plan_rows['plan_id'];
                            $apiId=$plan_rows['current_api_id'];
                            if(!isset($apiId) || trim($apiId) === ''){
                              $api_is_null=1;
                            }
                            else{
                              $api_is_null=0;
                            }
                            ?>
                            <input type="text" class="form-control" value="<?=$planName?>" id="planName" disabled>
                            <input type="hidden" value="<?=$planId?>" id="planId">
                            <?php
                          } else{
                            ?>
                            <input type="text" class="form-control" value="No Plan Activated, Go to plan Activation section and activate any plan" id="planName" disabled>
                            <input type="hidden" value="0" id="planId">
                            <?php
                          }
                          ?>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <?php 
                        if(mysqli_num_rows($plan_query)>0){
                          if($api_is_null==1){
                        ?>
                        <button class="btn btn-primary btn-block" onclick="generateApi()"><i class="material-icons">settings</i> Generate Key</button>
                        <?php } else{
                          ?>
                          <button class="btn btn-primary btn-block" style="cursor:not-allowed;" onclick="generateApi()" disabled><i class="material-icons">settings</i> Generate Key</button>
                          <?php
                        } } else{?>
                          <a href="upgrade" class="btn btn-primary btn-block">Go to Activation Panel</button>
                        <?php }?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                    <div class="row">
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include_once('section/footer-panel.php');?>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    function generateApi(){
      $.post("php/operation.php",{planId:$("#planId").val(),operation:"generateApi"},function(data){
        if(data=="##1"){
          md.showNotification('top','right','API Key generated!',3);    
          setTimeout(() => {
            location.reload();
          }, 3000);
        }
        else{
          md.showNotification('top','right','Something went Wrong!',2);
        }
      });
    }
    function copy(a){
      if(a==0){
        return false;
      }
      $(".prettyprint").append("<input type='text' value='"+a+"' id='copyText'/>");
      var copyText = document.getElementById("copyText");
      copyText.select();
      document.execCommand("copy");
      $("#copyText").remove();
      md.showNotification('top','right','Copied to clipboard!',3); // 0 None 1 Info 2 Danger 3 Success 4 warning 5 rose 6 primary
    }
    function themeChanger(){
      if($(".theme").hasClass("fa-moon-o")){
        $(".theme").removeClass('fa-moon-o').addClass('fa-sun-o');
         $(".prettyprint").css('background-color','#212121');
         $(".pln").css('color','#f7f7f7');
         $(".theme,.theme2").css('color','#f7f7f7');
         $("#theme").attr('title','Light code Theme');
         $("#theme").attr('data-original-title','Light code Theme');
      }
      else{
        $(".theme").removeClass('fa-sun-o').addClass('fa-moon-o');
        $(".prettyprint").css('background-color','#f7f7f7');
        $(".pln").css('color','#212121');
        $(".theme,.theme2").css('color','#212121');
        $("#theme").attr('title','Dark code Theme');
        $("#theme").attr('data-original-title','Dark code Theme');
      }
      $('[data-toggle="tooltip"]').tooltip();
    }
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
      $(".apiManager").addClass('active');
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      //init DateTimePickers
      md.initFormExtendedDatetimepickers();
    });
  </script>
</body>

</html>
