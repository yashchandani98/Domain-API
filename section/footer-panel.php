<footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="<?=$MAINBASEURL?>">
                  Domain API
                </a>
              </li>
              <li>
                <a href="<?=$MAINBASEURL?>about">
                  About Us
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="http://yashchandani.tk" target="_blank">Yash Chandani</a> for the better services.
          </div>
        </div>
      </footer>
      <script>
$(window).on('load',function() {
    //$(".loading").modal('hide');
        $('.loading').fadeOut();
});
</script>