<footer class="py-5">
    <div class="container">
        <div class="row align-items-center justify-content-lg-between">
    <div class="col-xl-6">
        <div class="copyright text-center text-lg-left text-muted">
            &copy; <?=date('Y')?> <a href="<?=$MAINBASEURL?>" class="font-weight-bold ml-1" target="_blank">DomainAPI</a> All Rights Reserved
        </div>
    </div>
    <div class="col-xl-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
                <a href="<?=$MAINBASEURL?>" class="nav-link" target="_blank">DomainAPI</a>
            </li>
            <li class="nav-item">
                <a href="<?=$MAINBASEURL?>" class="nav-link" target="_blank">About Us</a>
            </li>
        </ul>
    </div>
</div>    </div>
</footer>
<script>
$(window).on('load',function() {
    //$(".loading").modal('hide');
        $('.loading').fadeOut();
});
</script>