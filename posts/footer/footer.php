<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
</div>
<script src="assets/plugins/jquery-3.4.1.min.js"></script>
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../../query_script/loadingoverlay.min.js"></script>
<script src="jquery_ajax/post_ajax.js"></script>
<!-- <script src="../../query_script/tiny.js"></script> -->
<script>
  $("#post_content").blur(function(e) {
    $(this).html($(this).text());
  });
</script>
<script type="text/javascript">
  setTimeout(function() {
    location.reload();
  }, 60 * 1000);
</script>

<script>
  $('.toggle-dropdown').click(function() {
    if ($('.dropdown').hide()) {
      $(this).next('.dropdown').toggle('fast');
      false;
    }

  });
  //Hide dropdown on page click
  $(document).on('click', function(e) {
    if (!$(".toggle-dropdown").is(e.target) && !$(".toggle-dropdown").has(e.target).length) {
      $('.dropdown').slideUp("fast");
    }
  });
</script>
<?php include('update_post/update_modal.php'); ?>
<?php include('update_post/update_home_modal_post.php'); ?>

</body>

</html>