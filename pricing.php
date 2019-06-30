<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"><script type="text/javascript">window.NREUM||(NREUM={}),__nr_require=function(e,n,t){function r(t){if(!n[t]){var o=n[t]={exports:{}};e[t][0].call(o.exports,function(n){var o=e[t][1][n];return r(o||n)},o,o.exports)}return n[t].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<t.length;o++)r(t[o]);return r}({1:[function(e,n,t){function r(){}function o(e,n,t){return function(){return i(e,[c.now()].concat(u(arguments)),n?null:this,t),n?void 0:this}}var i=e("handle"),a=e(3),u=e(4),f=e("ee").get("tracer"),c=e("loader"),s=NREUM;"undefined"==typeof window.newrelic&&(newrelic=s);var p=["setPageViewName","setCustomAttribute","setErrorHandler","finished","addToTrace","inlineHit","addRelease"],d="api-",l=d+"ixn-";a(p,function(e,n){s[n]=o(d+n,!0,"api")}),s.addPageAction=o(d+"addPageAction",!0),s.setCurrentRouteName=o(d+"routeName",!0),n.exports=newrelic,s.interaction=function(){return(new r).get()};var m=r.prototype={createTracer:function(e,n){var t={},r=this,o="function"==typeof n;return i(l+"tracer",[c.now(),e,t],r),function(){if(f.emit((o?"":"no-")+"fn-start",[c.now(),r,o],t),o)try{return n.apply(this,arguments)}catch(e){throw f.emit("fn-err",[arguments,this,e],t),e}finally{f.emit("fn-end",[c.now()],t)}}}};a("actionText,setName,setAttribute,save,ignore,onEnd,getContext,end,get".split(","),function(e,n){m[n]=o(l+n)}),newrelic.noticeError=function(e,n){"string"==typeof e&&(e=new Error(e)),i("err",[e,c.now(),!1,n])}},{}],2:[function(e,n,t){function r(e,n){if(!o)return!1;if(e!==o)return!1;if(!n)return!0;if(!i)return!1;for(var t=i.split("."),r=n.split("."),a=0;a<r.length;a++)if(r[a]!==t[a])return!1;return!0}var o=null,i=null,a=/Version\/(\S+)\s+Safari/;if(navigator.userAgent){var u=navigator.userAgent,f=u.match(a);f&&u.indexOf("Chrome")===-1&&u.indexOf("Chromium")===-1&&(o="Safari",i=f[1])}n.exports={agent:o,version:i,match:r}},{}],3:[function(e,n,t){function r(e,n){var t=[],r="",i=0;for(r in e)o.call(e,r)&&(t[i]=n(r,e[r]),i+=1);return t}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],4:[function(e,n,t){function r(e,n,t){n||(n=0),"undefined"==typeof t&&(t=e?e.length:0);for(var r=-1,o=t-n||0,i=Array(o<0?0:o);++r<o;)i[r]=e[n+r];return i}n.exports=r},{}],5:[function(e,n,t){n.exports={exists:"undefined"!=typeof window.performance&&window.performance.timing&&"undefined"!=typeof window.performance.timing.navigationStart}},{}],ee:[function(e,n,t){function r(){}function o(e){function n(e){return e&&e instanceof r?e:e?f(e,u,i):i()}function t(t,r,o,i){if(!d.aborted||i){e&&e(t,r,o);for(var a=n(o),u=v(t),f=u.length,c=0;c<f;c++)u[c].apply(a,r);var p=s[y[t]];return p&&p.push([b,t,r,a]),a}}function l(e,n){h[e]=v(e).concat(n)}function m(e,n){var t=h[e];if(t)for(var r=0;r<t.length;r++)t[r]===n&&t.splice(r,1)}function v(e){return h[e]||[]}function g(e){return p[e]=p[e]||o(t)}function w(e,n){c(e,function(e,t){n=n||"feature",y[t]=n,n in s||(s[n]=[])})}var h={},y={},b={on:l,addEventListener:l,removeEventListener:m,emit:t,get:g,listeners:v,context:n,buffer:w,abort:a,aborted:!1};return b}function i(){return new r}function a(){(s.api||s.feature)&&(d.aborted=!0,s=d.backlog={})}var u="nr@context",f=e("gos"),c=e(3),s={},p={},d=n.exports=o();d.backlog=s},{}],gos:[function(e,n,t){function r(e,n,t){if(o.call(e,n))return e[n];var r=t();if(Object.defineProperty&&Object.keys)try{return Object.defineProperty(e,n,{value:r,writable:!0,enumerable:!1}),r}catch(i){}return e[n]=r,r}var o=Object.prototype.hasOwnProperty;n.exports=r},{}],handle:[function(e,n,t){function r(e,n,t,r){o.buffer([e],r),o.emit(e,n,t)}var o=e("ee").get("handle");n.exports=r,r.ee=o},{}],id:[function(e,n,t){function r(e){var n=typeof e;return!e||"object"!==n&&"function"!==n?-1:e===window?0:a(e,i,function(){return o++})}var o=1,i="nr@id",a=e("gos");n.exports=r},{}],loader:[function(e,n,t){function r(){if(!E++){var e=x.info=NREUM.info,n=l.getElementsByTagName("script")[0];if(setTimeout(s.abort,3e4),!(e&&e.licenseKey&&e.applicationID&&n))return s.abort();c(y,function(n,t){e[n]||(e[n]=t)}),f("mark",["onload",a()+x.offset],null,"api");var t=l.createElement("script");t.src="https://"+e.agent,n.parentNode.insertBefore(t,n)}}function o(){"complete"===l.readyState&&i()}function i(){f("mark",["domContent",a()+x.offset],null,"api")}function a(){return O.exists&&performance.now?Math.round(performance.now()):(u=Math.max((new Date).getTime(),u))-x.offset}var u=(new Date).getTime(),f=e("handle"),c=e(3),s=e("ee"),p=e(2),d=window,l=d.document,m="addEventListener",v="attachEvent",g=d.XMLHttpRequest,w=g&&g.prototype;NREUM.o={ST:setTimeout,SI:d.setImmediate,CT:clearTimeout,XHR:g,REQ:d.Request,EV:d.Event,PR:d.Promise,MO:d.MutationObserver};var h=""+location,y={beacon:"bam.nr-data.net",errorBeacon:"bam.nr-data.net",agent:"js-agent.newrelic.com/nr-1118.min.js"},b=g&&w&&w[m]&&!/CriOS/.test(navigator.userAgent),x=n.exports={offset:u,now:a,origin:h,features:{},xhrWrappable:b,userAgent:p};e(1),l[m]?(l[m]("DOMContentLoaded",i,!1),d[m]("load",r,!1)):(l[v]("onreadystatechange",o),d[v]("onload",r)),f("mark",["firstbyte",u],null,"api");var E=0,O=e(5)},{}]},{},["loader"]);</script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Domain Api Pricing</title>

        <!-- Canonical SEO -->
        <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" />

        <!--  Social tags      -->
        <!-- <meta name="keywords" content="creative tim, updivision, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, laravel dashboard, bootstrap 4, laravel, css3 dashboard, bootstrap 4 admin, argon laravel dashboard, bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, argon laravel design, argon laravel dashboard bootstrap">
        <meta name="description" content="Argon Laravel Dashboard PRO is a beautiful Bootstrap 4 & Laravel admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you."> -->
        
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
            <?php include_once("section/nav.php"); ?>
            <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Choose the best plan for your business</h1>
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
            <div class="col-lg-10">
                <div class="pricing card-group flex-column flex-md-row mb-3">
                    <div class="card card-pricing border-0 text-center mb-4">
                        <div class="card-header bg-transparent">
                            <h4 class="text-uppercase ls-1 text-primary py-3 mb-0">Bravo pack</h4>
                        </div>
                        <div class="card-body px-lg-7">
                            <div class="display-2">$49</div>
                            <span class="text-muted">per application</span>
                            <ul class="list-unstyled my-4">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                                <i class="fas fa-terminal"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">Complete documentation</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                                <i class="fas fa-pen-fancy"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">Working materials in Sketch</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                                <i class="fas fa-hdd"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">2GB cloud storage</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-primary mb-3">Start free trial</button>
                        </div>
                        <div class="card-footer">
                            <a href="#!" class="text-light">Request a demo</a>
                        </div>
                    </div>
                    <div class="card card-pricing bg-gradient-success zoom-in shadow-lg rounded border-0 text-center mb-4">
                        <div class="card-header bg-transparent">
                            <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Alpha pack</h4>
                        </div>
                        <div class="card-body px-lg-7">
                            <div class="display-1 text-white">$199</div>
                            <span class="text-white">per application</span>
                            <ul class="list-unstyled my-4">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape bg-white shadow rounded-circle text-muted">
                                                <i class="fas fa-terminal"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2 text-white">Complete documentation</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape bg-white shadow rounded-circle text-muted">
                                                <i class="fas fa-pen-fancy"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2 text-white">Working materials in Sketch</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape bg-white shadow rounded-circle text-muted">
                                                <i class="fas fa-hdd"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2 text-white">2GB cloud storage</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-secondary mb-3">Start free trial</button>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="#!" class="text-white">Contact sales</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-lg-center px-3 mt-5">
            <div>
                <div class="icon icon-shape bg-gradient-white shadow rounded-circle text-primary">
                    <i class="ni ni-building text-primary"></i>
                </div>
            </div>
            <div class="col-lg-6">
                <p class="text-white"><strong>The Arctic Ocean</strong> freezes every winter and much of the sea-ice then thaws every summer, and that
                    process will continue whatever.</p>
            </div>
        </div>
        <div class="row row-grid justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive">
                    <table class="table table-dark mt-5">
                        <thead>
                            <tr>
                                <th class="px-0 bg-transparent" scope="col">
                                    <span class="text-light font-weight-700">Features</span>
                                </th>
                                <th class="text-center bg-transparent" scope="col">Bravo Pack</th>
                                <th class="text-center bg-transparent" scope="col">Alpha Pack</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-0">IMAP/POP Support</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-0">Email Forwarding</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-0">Active Sync</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-0">Multiple domain hosting</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center">
                                    <span class="text-sm text-light">Limited to 1 domain only</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-0">Additional storage upgrade</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-0">30MB Attachment Limit</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center">-</td>
                            </tr>
                            <tr>
                                <td class="px-0">Password protected / Expiry links</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center">-</td>
                            </tr>
                            <tr>
                                <td class="px-0">Unlimited Custom Apps</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center">-</td>
                            </tr>
                        </tbody>
                    </table>
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
        <script src="loginAssets/argon/js/demo.min.js"></script>
    <script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","licenseKey":"e436701188","applicationID":"243106736","transactionName":"YlNTZBMEWkMDVRAPDFsZcFMVDFteTUYFAQYbRkNZAgxaVw==","queueTime":6,"applicationTime":65,"atts":"ThRQElseSU0=","errorBeacon":"bam.nr-data.net","agent":""}</script></body>
</html>